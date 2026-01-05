<?php
require_once __DIR__ . '/db.php';
$id = isset($_POST['sno']) ? (int)$_POST['sno'] : 0;
$dept = isset($_POST['dept']) ? preg_replace('/[^A-Za-z0-9_]/', '', $_POST['dept']) : '';
$ques = isset($_POST['ques']) ? trim($_POST['ques']) : '';
if ($id <= 0 || $dept === '' || $ques === '') { echo 'Error'; exit; }

if (isset($pdo) && $pdo instanceof PDO) {
	$sql = "UPDATE \"$dept\" SET question = :q WHERE sno = :sno";
	$stmt = $pdo->prepare($sql);
	$ok = $stmt->execute([':q' => $ques, ':sno' => $id]);
	echo $ok ? 'Updated' : 'Error';
	exit;
}

$con = mysqli_connect('localhost','root','','bit');
$quesEsc = mysqli_real_escape_string($con, $ques);
$q_update = "UPDATE `".$dept."` SET question='".$quesEsc."' WHERE sno=".$id;
$ch = mysqli_query($con,$q_update);
echo $ch ? 'Updated' : 'Error';
?>