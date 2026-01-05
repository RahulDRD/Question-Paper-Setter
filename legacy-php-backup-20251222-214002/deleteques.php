<?php
require_once __DIR__ . '/db.php';
$id = isset($_POST['sno']) ? (int)$_POST['sno'] : 0;
$dept = isset($_POST['dept']) ? preg_replace('/[^A-Za-z0-9_]/', '', $_POST['dept']) : '';
if ($id <= 0 || $dept === '') { echo 'Error'; exit; }

if (isset($pdo) && $pdo instanceof PDO) {
	$sql = "DELETE FROM \"$dept\" WHERE sno = :sno";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':sno' => $id]);
	echo 'Deleted';
	exit;
}

$con = mysqli_connect('localhost','root','','bit');
$q_delete = "DELETE FROM `".$dept."` WHERE sno=".$id;
$ch = mysqli_query($con,$q_delete);
echo $ch ? 'Deleted' : 'Error';
?>