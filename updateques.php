<?php
$con=mysqli_connect('localhost','root','','bit');
$id=$_POST['sno'];
$dept=$_POST['dept'];
$ques=$_POST['ques'];
$q_update="update $dept set question='$ques' where sno=$id";
$ch=mysqli_query($con,$q_update);
echo"Updated";
?>