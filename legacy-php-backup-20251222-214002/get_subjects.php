<?php
header('Content-Type: text/html; charset=UTF-8');
require_once __DIR__ . '/db.php';

$rows = [];
if (isset($pdo) && $pdo instanceof PDO) {
    $sql = "SELECT sno, department, subject FROM subjects ORDER BY TRIM(LOWER(department)), TRIM(LOWER(subject))";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
} else {
    $con = mysqli_connect('localhost','root','','bit');
    $query = "SELECT sno, department, subject FROM subjects ORDER BY TRIM(LOWER(department)), TRIM(LOWER(subject))";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) { $rows[] = $row; }
    mysqli_close($con);
}

$output = '';
foreach ($rows as $row) {
    $dept = htmlspecialchars($row['department'], ENT_QUOTES, 'UTF-8');
    $subj = htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8');
    $sno  = (int)$row['sno'];
    $deptJs = json_encode($row['department']);
    $subjJs = json_encode($row['subject']);

    $output .= '<tr>
        <td>'.$dept.'</td>
        <td>'.$subj.'</td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="editSubject('.$sno.', '.$deptJs.', '.$subjJs.')">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteSubject('.$sno.')">Delete</button>
        </td>
    </tr>';
}

echo $output;
?>