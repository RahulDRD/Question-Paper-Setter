<?php
header('Content-Type: application/json');

$con = mysqli_connect('localhost', 'root', '', 'bit');
if (!$con) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]));
}

$action = $_POST['action'];
$response = ['success' => false, 'message' => ''];

try {
    if ($action == 'add') {
        $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
        // Create new department table
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
            $response['success'] = true;
            $response['message'] = 'Department created successfully!';
        } else {
            $response['message'] = 'Error creating department: ' . mysqli_error($con);
        }
    } elseif ($action == 'edit') {
        $oldDeptName = mysqli_real_escape_string($con, $_POST['oldDeptName']);
        $newDeptName = mysqli_real_escape_string($con, $_POST['newDeptName']);
        
        // Check if new department name already exists
        $checkQuery = "SHOW TABLES LIKE '$newDeptName'";
        if (mysqli_num_rows(mysqli_query($con, $checkQuery)) > 0) {
            $response['message'] = 'Error: Department name already exists!';
        } else {
            // Rename the department table
            $renameQuery = "RENAME TABLE `$oldDeptName` TO `$newDeptName`";
            if (mysqli_query($con, $renameQuery)) {
                // Update related subjects in the subjects table
                $updateSubjects = "UPDATE subjects SET department = '$newDeptName' WHERE department = '$oldDeptName'";
                if (mysqli_query($con, $updateSubjects)) {
                    $response['success'] = true;
                    $response['message'] = 'Department updated successfully!';
                } else {
                    $response['message'] = 'Error updating subjects: ' . mysqli_error($con);
                }
            } else {
                $response['message'] = 'Error renaming department: ' . mysqli_error($con);
            }
        }
    } elseif ($action == 'delete') {
        $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
        $query = "DROP TABLE `$deptName`";
        if (mysqli_query($con, $query)) {
            // Also delete related subjects
            $deleteSubjects = "DELETE FROM subjects WHERE department = '$deptName'";
            mysqli_query($con, $deleteSubjects);
            
            $response['success'] = true;
            $response['message'] = 'Department deleted successfully!';
        } else {
            $response['message'] = 'Error deleting department: ' . mysqli_error($con);
        }
    }
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

mysqli_close($con);
echo json_encode($response);
?>