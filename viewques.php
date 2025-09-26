<?php
// ini_set('display_errors', 0);

  $con=mysqli_connect('localhost','root','','bit');
  $dep=$_POST['dept'];
  $sem=$_POST['sem'];
  $q_allQues="select * from $dep where semester='$sem'";
  $ch_allQues=mysqli_query($con,$q_allQues);
  
  echo"
  <table class='table mt-4' id='subeditt'>
  <thead>
  <tr>
  <th>Subject</th>
  <th>Unit</th>
  <th>Question</th>
  <th>Marks</th>
  <th>Edit</th>
  <th>Delete</th>
  <th class='d-none'>Sno</th>
  </tr>
</thead>
<tbody>
 
    ";
  while($row = mysqli_fetch_array($ch_allQues))
  {
    echo"
    <tr>
    <td>$row[subject]</td>
    <td>$row[unit]</td>
    <td class='ques'>$row[question]</td>
    <td>$row[marks]</td>
    <td><button class='editq btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button></td>
    <td><button class='delq btn btn-danger'>Delete</button></td>
    <td class='sno d-none'>$row[sno]</td>
    </tr>
    ";
  }
  echo"  
  </tbody>
  </table>";

?>