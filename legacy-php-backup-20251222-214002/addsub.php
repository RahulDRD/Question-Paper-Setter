<?php
require_once __DIR__ . '/db.php';

$dep = isset($_POST['dep']) ? trim($_POST['dep']) : '';
$sub = isset($_POST['sub']) ? trim($_POST['sub']) : '';
$sem = isset($_POST['sem']) ? (int)$_POST['sem'] : 0; // semester optional; default 0

if ($dep === '' || $sub === '') { echo '0'; exit; }

if (isset($pdo) && $pdo instanceof PDO) {
	// Postgres path
	try {
		$chk = $pdo->prepare("SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(:dep)) AND TRIM(LOWER(subject)) = TRIM(LOWER(:sub)) LIMIT 1");
		$chk->execute([':dep' => $dep, ':sub' => $sub]);
		if ($chk->fetch()) { echo 'DUPLICATE'; exit; }

		$ins = $pdo->prepare("INSERT INTO subjects (department, sem, subject) VALUES (:dep, :sem, :sub)");
		$ok = $ins->execute([':dep' => $dep, ':sem' => $sem, ':sub' => $sub]);
		echo $ok ? '1' : '0';
		exit;
	} catch (Throwable $e) {
		echo '0';
		exit;
	}
}

// MySQL fallback
$con = mysqli_connect('localhost','root','','bit');
if (!$con) { echo '0'; exit; }

// Prevent duplicates per department (case-insensitive)
$chkSql = "SELECT 1 FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER(?)) AND TRIM(LOWER(subject)) = TRIM(LOWER(?)) LIMIT 1";
if ($stmt = mysqli_prepare($con, $chkSql)) {
	mysqli_stmt_bind_param($stmt, 'ss', $dep, $sub);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	if (mysqli_stmt_num_rows($stmt) > 0) {
		echo 'DUPLICATE';
		mysqli_stmt_close($stmt);
		exit;
	}
	mysqli_stmt_close($stmt);
}

$insSql = "INSERT INTO subjects (department, sem, subject) VALUES (?, ?, ?)";
if ($stmt = mysqli_prepare($con, $insSql)) {
	mysqli_stmt_bind_param($stmt, 'sis', $dep, $sem, $sub);
	$ok = mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	echo $ok ? '1' : '0';
} else {
	echo '0';
}
?>