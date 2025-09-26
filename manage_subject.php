<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

$con = new mysqli('localhost', 'root', '', 'bit');

if ($con->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$action = $_POST['action'] ?? '';
$department = trim($_POST['department'] ?? '');
$sem = intval($_POST['sem'] ?? 0);
$subject = trim($_POST['subject'] ?? '');
$sno = intval($_POST['sno'] ?? 0);

try {
    if ($action === 'add') {
        $stmt = $con->prepare("INSERT INTO subjects (department, sem, subject) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $department, $sem, $subject);

        if ($stmt->execute()) {
            $response = ['success' => true, 'message' => 'Subject added successfully!'];
        } else {
            $response['message'] = 'Error adding subject.';
        }
        $stmt->close();

    } elseif ($action === 'edit' && $sno > 0) {
        $stmt = $con->prepare("UPDATE subjects SET department = ?, sem = ?, subject = ? WHERE sno = ?");
        $stmt->bind_param("sisi", $department, $sem, $subject, $sno);

        if ($stmt->execute()) {
            $response = ['success' => true, 'message' => 'Subject updated successfully!'];
        } else {
            $response['message'] = 'Error updating subject.';
        }
        $stmt->close();

    } elseif ($action === 'delete' && $sno > 0) {
        $stmt = $con->prepare("DELETE FROM subjects WHERE sno = ?");
        $stmt->bind_param("i", $sno);

        if ($stmt->execute()) {
            $response = ['success' => true, 'message' => 'Subject deleted successfully!'];
        } else {
            $response['message'] = 'Error deleting subject.';
        }
        $stmt->close();

    } else {
        http_response_code(400); // Bad request
        $response['message'] = 'Invalid action or missing parameters';
    }

} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    $response['message'] = 'Exception: ' . $e->getMessage();
}

$con->close();
echo json_encode($response);
?>
