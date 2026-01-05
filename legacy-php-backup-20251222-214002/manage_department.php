<?php
header('Content-Type: application/json');

require_once __DIR__ . '/db.php';

$action = $_POST['action'] ?? '';
$response = ['success' => false, 'message' => ''];

// basic whitelist for identifiers (table names)
function is_valid_identifier($name) {
    return (bool)preg_match('/^[A-Za-z0-9_]+$/', $name);
}

if (isset($pdo) && $pdo instanceof PDO) {
    try {
        if ($action === 'add') {
            $deptName = $_POST['deptName'] ?? '';
            if (!is_valid_identifier($deptName)) {
                throw new Exception('Invalid department name');
            }
            $sql = 'CREATE TABLE "'.$deptName.'" (
                sno SERIAL PRIMARY KEY,
                semester INTEGER NOT NULL,
                subject TEXT NOT NULL,
                unit INTEGER NOT NULL,
                question TEXT NOT NULL,
                marks INTEGER NOT NULL
            )';
            $pdo->exec($sql);
            $response = ['success' => true, 'message' => 'Department created successfully!'];
        } elseif ($action === 'edit') {
            $oldDeptName = $_POST['oldDeptName'] ?? '';
            $newDeptName = $_POST['newDeptName'] ?? '';
            if (!is_valid_identifier($oldDeptName) || !is_valid_identifier($newDeptName)) {
                throw new Exception('Invalid department name');
            }
            // check existence of target
            $check = $pdo->prepare("SELECT 1 FROM pg_catalog.pg_tables WHERE schemaname='public' AND tablename = :t");
            $check->execute([':t' => strtolower($newDeptName)]);
            if ($check->fetch()) {
                $response['message'] = 'Error: Department name already exists!';
            } else {
                $pdo->exec('ALTER TABLE "'.$oldDeptName.'" RENAME TO "'.$newDeptName.'"');
                // Try updating subjects table if it exists with a department column
                try {
                    $pdo->exec("UPDATE subjects SET department = '".str_replace("'","''",$newDeptName)."' WHERE department = '".str_replace("'","''",$oldDeptName)."'");
                } catch (Throwable $e) {
                    // ignore if schema differs
                }
                $response = ['success' => true, 'message' => 'Department updated successfully!'];
            }
        } elseif ($action === 'delete') {
            $deptName = $_POST['deptName'] ?? '';
            if (!is_valid_identifier($deptName)) {
                throw new Exception('Invalid department name');
            }
            $pdo->exec('DROP TABLE "'.$deptName.'"');
            try {
                $pdo->exec("DELETE FROM subjects WHERE department = '".str_replace("'","''",$deptName)."'");
            } catch (Throwable $e) {
                // ignore if schema differs
            }
            $response = ['success' => true, 'message' => 'Department deleted successfully!'];
        } else {
            http_response_code(400);
            $response['message'] = 'Invalid action';
        }
    } catch (Throwable $e) {
        http_response_code(500);
        $response['message'] = 'Error: '.$e->getMessage();
    }
    echo json_encode($response);
    exit;
}

// MySQL fallback path
$con = mysqli_connect('localhost', 'root', '', 'bit');
if (!$con) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]));
}

try {
    if ($action == 'add') {
        $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
        if (!is_valid_identifier($deptName)) {
            throw new Exception('Invalid department name');
        }
        $query = "CREATE TABLE `$deptName` (
            `sno` int(11) NOT NULL AUTO_INCREMENT,
            `semester` int(10) NOT NULL,
            `subject` varchar(300) NOT NULL,
            `unit` int(10) NOT NULL,
            `question` text NOT NULL,
            `marks` int(11) NOT NULL,
            PRIMARY KEY (`sno`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        if (mysqli_query($con, $query)) {
            $response = ['success' => true, 'message' => 'Department created successfully!'];
        } else {
            $response['message'] = 'Error creating department: ' . mysqli_error($con);
        }
    } elseif ($action == 'edit') {
        $oldDeptName = mysqli_real_escape_string($con, $_POST['oldDeptName']);
        $newDeptName = mysqli_real_escape_string($con, $_POST['newDeptName']);
        if (!is_valid_identifier($oldDeptName) || !is_valid_identifier($newDeptName)) {
            throw new Exception('Invalid department name');
        }
        $checkQuery = "SHOW TABLES LIKE '$newDeptName'";
        if (mysqli_num_rows(mysqli_query($con, $checkQuery)) > 0) {
            $response['message'] = 'Error: Department name already exists!';
        } else {
            $renameQuery = "RENAME TABLE `$oldDeptName` TO `$newDeptName`";
            if (mysqli_query($con, $renameQuery)) {
                $updateSubjects = "UPDATE subjects SET department = '$newDeptName' WHERE department = '$oldDeptName'";
                if (mysqli_query($con, $updateSubjects)) {
                    $response = ['success' => true, 'message' => 'Department updated successfully!'];
                } else {
                    $response['message'] = 'Error updating subjects: ' . mysqli_error($con);
                }
            } else {
                $response['message'] = 'Error renaming department: ' . mysqli_error($con);
            }
        }
    } elseif ($action == 'delete') {
        $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
        if (!is_valid_identifier($deptName)) {
            throw new Exception('Invalid department name');
        }
        $query = "DROP TABLE `$deptName`";
        if (mysqli_query($con, $query)) {
            $deleteSubjects = "DELETE FROM subjects WHERE department = '$deptName'";
            mysqli_query($con, $deleteSubjects);
            $response = ['success' => true, 'message' => 'Department deleted successfully!'];
        } else {
            $response['message'] = 'Error deleting department: ' . mysqli_error($con);
        }
    } else {
        http_response_code(400);
        $response['message'] = 'Invalid action';
    }
} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = 'Error: ' . $e->getMessage();
}

mysqli_close($con);
echo json_encode($response);
?>