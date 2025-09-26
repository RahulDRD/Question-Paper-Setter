<?php
$con=mysqli_connect('localhost','root','','bit');
$id=$_POST['sno'];
$dept=$_POST['dept'];
$q_delete="delete from $dept where sno=$id";
$ch=mysqli_query($con,$q_delete);
echo"Deleted";
?>