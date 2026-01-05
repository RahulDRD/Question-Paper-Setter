<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

header('Content-Type: text/html; charset=UTF-8');
ob_clean();

$output = '<option value="Select">Select Department</option>';

require_once __DIR__ . '/db.php';
if (isset($pdo) && $pdo instanceof PDO) {
    try {
        $sql = "SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'";
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            $tableName = $row['tablename'];
            if (!in_array($tableName, ['subjects', 'migrations', 'password_resets', 'users'])) {
                $safe = htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8');
                $output .= '<option value="'.$safe.'">'.$safe.'</option>';
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
            $output .= '<option value="'.htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8').'</option>';
        }
    }
    mysqli_close($con);
}

echo $output;
?>