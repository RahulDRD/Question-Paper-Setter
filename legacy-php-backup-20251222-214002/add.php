<?php
// Add a question to the selected department table
require_once __DIR__ . '/db.php';

// Sanitize inputs
$dep = isset($_POST['dep']) ? preg_replace('/[^A-Za-z0-9_]/', '', $_POST['dep']) : '';
$sem = isset($_POST['sem']) ? (int)$_POST['sem'] : 0; // default to 0 when not provided
$uni = isset($_POST['uni']) ? (int)$_POST['uni'] : 0;
$marks = isset($_POST['marks']) ? (int)$_POST['marks'] : 0;
$sub = isset($_POST['sub']) ? trim($_POST['sub']) : '';
$que = isset($_POST['que']) ? trim($_POST['que']) : '';

if ($dep === '' || $sub === '' || $que === '' || $uni === 0 || $marks === 0) {
	echo '0';
	exit;
}

if (isset($pdo) && $pdo instanceof PDO) {
	// Postgres path
	try {
		// Quote identifier safely by enclosing in double quotes after validation
		$table = $dep; // already validated to [A-Za-z0-9_]
		$sql = "INSERT INTO \"$table\" (semester, subject, unit, question, marks) VALUES (:sem, :sub, :uni, :que, :marks)";
		$stmt = $pdo->prepare($sql);
		$ok = $stmt->execute([
			':sem' => $sem,
			':sub' => $sub,
			':uni' => $uni,
			':que' => $que,
			':marks' => $marks,
		]);
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
$subEsc = mysqli_real_escape_string($con, $sub);
$queEsc = mysqli_real_escape_string($con, $que);
$q1 = "INSERT INTO `".$dep."` (semester, subject, unit, question, marks) VALUES (".$sem.",'".$subEsc."',".$uni.",'".$queEsc."',".$marks.")";
$ch = mysqli_query($con, $q1);
echo $ch ? '1' : '0';
?>