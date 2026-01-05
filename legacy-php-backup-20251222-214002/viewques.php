<?php
  require_once __DIR__ . '/db.php';
  $dept_raw = $_POST['dept'] ?? $_POST['department'] ?? $_GET['department'] ?? '';
  $dep = preg_replace('/[^A-Za-z0-9_]/', '', $dept_raw);
  if ($dep === '') { die('Invalid department'); }

  if (isset($pdo) && $pdo instanceof PDO) {
    $sql = "SELECT * FROM \"$dep\" ORDER BY sno DESC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
  } else {
    $con = mysqli_connect('localhost','root','','bit');
    $q_allQues = "SELECT * FROM `".$dep."` ORDER BY sno DESC";
    $ch_allQues = mysqli_query($con,$q_allQues);
    $rows = [];
    while($row = mysqli_fetch_assoc($ch_allQues)) { $rows[] = $row; }
  }
  
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
  foreach($rows as $row)
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