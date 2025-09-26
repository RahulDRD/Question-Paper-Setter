<?php
$dep=$_POST['dep'];
$sem=$_POST['sem'];
$con=mysqli_connect('localhost','root','','bit');
$q1="select * from subjects where department='$dep' AND sem=$sem";
$ch=mysqli_query($con,$q1);
echo"<option value='Select'>Select Subject Code</option>";
         while($row = mysqli_fetch_array($ch))
         {


 echo" <option value='$row[subject]'>$row[subject]</option>";  


         }

?>