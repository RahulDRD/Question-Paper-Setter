<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

require_once __DIR__ . '/db.php';

$action = $_POST['action'] ?? '';
$department = trim($_POST['department'] ?? '');
$sem = intval($_POST['sem'] ?? 0); // optional, not used in CRUD here
$subject = trim($_POST['subject'] ?? '');
$normDepartment = $department;
$normSubject = $subject;
$sno = intval($_POST['sno'] ?? 0);

try {
    if (isset($pdo) && $pdo instanceof PDO) {
        // Postgres path
        if ($action === 'add') {
            $chk = $pdo->prepare("SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(:dep)) AND TRIM(LOWER(subject)) = TRIM(LOWER(:sub)) LIMIT 1");
            $chk->execute([':dep' => $normDepartment, ':sub' => $normSubject]);
            if ($chk->fetch()) {
                $response = ['success' => false, 'message' => 'Subject already exists for this department'];
            } else {
                $stmt = $pdo->prepare("INSERT INTO subjects (department, subject) VALUES (:dep, :sub)");
                $ok = $stmt->execute([':dep' => $normDepartment, ':sub' => $normSubject]);
                $response = $ok ? ['success' => true, 'message' => 'Subject added successfully!'] : ['success' => false, 'message' => 'Error adding subject.'];
            }

        } elseif ($action === 'edit' && $sno > 0) {
            $chk = $pdo->prepare("SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(:dep)) AND TRIM(LOWER(subject)) = TRIM(LOWER(:sub)) AND sno <> :sno LIMIT 1");
            $chk->execute([':dep' => $normDepartment, ':sub' => $normSubject, ':sno' => $sno]);
            if ($chk->fetch()) {
                $response = ['success' => false, 'message' => 'Another subject with same name exists in this department'];
            } else {
                $stmt = $pdo->prepare("UPDATE subjects SET department = :dep, subject = :sub WHERE sno = :sno");
                $ok = $stmt->execute([':dep' => $normDepartment, ':sub' => $normSubject, ':sno' => $sno]);
                $response = $ok ? ['success' => true, 'message' => 'Subject updated successfully!'] : ['success' => false, 'message' => 'Error updating subject.'];
            }

        } elseif ($action === 'delete' && $sno > 0) {
            $stmt = $pdo->prepare("DELETE FROM subjects WHERE sno = :sno");
            $ok = $stmt->execute([':sno' => $sno]);
            $response = $ok ? ['success' => true, 'message' => 'Subject deleted successfully!'] : ['success' => false, 'message' => 'Error deleting subject.'];

        } else {
            http_response_code(400);
            $response['message'] = 'Invalid action or missing parameters';
        }

        echo json_encode($response);
        exit;
    }

    // MySQL fallback
    $con = new mysqli('localhost', 'root', '', 'bit');
    if ($con->connect_error) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit;
    }

    if ($action === 'add') {
        $chk = $con->prepare("SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(?)) AND TRIM(LOWER(subject)) = TRIM(LOWER(?)) LIMIT 1");
        $chk->bind_param("ss", $normDepartment, $normSubject);
        $chk->execute();
        $chk->store_result();
        if ($chk->num_rows > 0) {
            $response = ['success' => false, 'message' => 'Subject already exists for this department'];
            $chk->close();
        } else {
            $chk->close();
            $stmt = $con->prepare("INSERT INTO subjects (department, subject) VALUES (?, ?)");
            $stmt->bind_param("ss", $normDepartment, $normSubject);
            $response = $stmt->execute() ? ['success' => true, 'message' => 'Subject added successfully!'] : ['success' => false, 'message' => 'Error adding subject.'];
            $stmt->close();
        }
    } elseif ($action === 'edit' && $sno > 0) {
        $chk = $con->prepare("SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(?)) AND TRIM(LOWER(subject)) = TRIM(LOWER(?)) AND sno <> ? LIMIT 1");
        $chk->bind_param("ssi", $normDepartment, $normSubject, $sno);
        $chk->execute();
        $chk->store_result();
        if ($chk->num_rows > 0) {
            $response = ['success' => false, 'message' => 'Another subject with same name exists in this department'];
            $chk->close();
        } else {
            $chk->close();
            $stmt = $con->prepare("UPDATE subjects SET department = ?, subject = ? WHERE sno = ?");
            $stmt->bind_param("ssi", $normDepartment, $normSubject, $sno);
            $response = $stmt->execute() ? ['success' => true, 'message' => 'Subject updated successfully!'] : ['success' => false, 'message' => 'Error updating subject.'];
            $stmt->close();
        }
    } elseif ($action === 'delete' && $sno > 0) {
        $stmt = $con->prepare("DELETE FROM subjects WHERE sno = ?");
        $stmt->bind_param("i", $sno);
        $response = $stmt->execute() ? ['success' => true, 'message' => 'Subject deleted successfully!'] : ['success' => false, 'message' => 'Error deleting subject.'];
        $stmt->close();
    } else {
        http_response_code(400);
        $response['message'] = 'Invalid action or missing parameters';
    }

    $con->close();
    echo json_encode($response);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Exception: '.$e->getMessage()]);
}
?>
