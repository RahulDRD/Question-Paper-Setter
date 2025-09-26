<?php
$dep=$_POST['dep'];
$sem=$_POST['sem'];
$sub=$_POST['sub'];
$con=mysqli_connect('localhost','root','','bit');
$q1="insert into subjects values('','$dep',$sem,'$sub')";
$ch=mysqli_query($con,$q1);
echo"
$q1
<br>
$ch

"

?>