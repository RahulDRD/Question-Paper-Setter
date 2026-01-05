<?php
$dep = $_POST['dep'] ?? $_POST['department'] ?? '';
require_once __DIR__ . '/db.php';

echo "<option value='Select'>Select Subject Code</option>";

if (isset($pdo) && $pdo instanceof PDO) {
        // Postgres path
        $stmt = $pdo->prepare("SELECT subject FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(:dep)) ORDER BY subject");
        $stmt->execute([':dep' => $dep]);
        foreach ($stmt->fetchAll() as $row) {
                echo " <option value='".htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8')."'>".htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8')."</option>";
        }
        return;
}

// MySQL fallback
$con = mysqli_connect('localhost','root','','bit');
if (!$con) { exit; }
$depEsc = mysqli_real_escape_string($con, $dep);
$q1 = "SELECT subject FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER('$depEsc')) ORDER BY subject";
$ch = mysqli_query($con,$q1);
while($row = mysqli_fetch_array($ch)) {
        echo " <option value='".htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8')."'>".htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8')."</option>";
}
?>