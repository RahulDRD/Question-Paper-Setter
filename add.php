<?php
$dep=$_POST['dep'];
$sem=$_POST['sem'];
$uni=$_POST['uni'];
$sub=$_POST['sub'];
$que=$_POST['que'];
$marks=$_POST['marks'];
$con=mysqli_connect('localhost','root','','bit');
$q1="insert into $dep values('',$sem,'$sub',$uni,'$que',$marks)";
$ch=mysqli_query($con,$q1);
echo"
$q1
<br>
$ch

"

?>