<?php
header('Content-Type: text/html; charset=UTF-8');
$output = '';

require_once __DIR__ . '/db.php';
if (isset($pdo) && $pdo instanceof PDO) {
    try {
        $sql = "SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            $tableName = $row['tablename'];
            if (!in_array($tableName, ['subjects', 'migrations', 'password_resets', 'users'])) {
                $safe = htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8');
                $nameJs = json_encode($tableName);
                $output .= '<tr>
                    <td>'.$safe.'</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editDepartment('.$nameJs.')">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteDepartment('.$nameJs.')">Delete</button>
                    </td>
                </tr>';
            }
        }
        echo $output;
        exit;
    } catch (Throwable $e) {
        // fall through to MySQL
    }
}

// MySQL fallback
$con = mysqli_connect('localhost','root','','bit');
if ($con) {
    $query = "SHOW TABLES";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $tableName = $row[0];
        if ($tableName != 'subjects' && $tableName != 'migrations' && $tableName != 'password_resets' && $tableName != 'users') {
            $safe = htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8');
            $nameJs = json_encode($tableName);
            $output .= '<tr>
                <td>'.$safe.'</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editDepartment('.$nameJs.')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteDepartment('.$nameJs.')">Delete</button>
                </td>
            </tr>';
        }
    }
    mysqli_close($con);
}

echo $output;
?>