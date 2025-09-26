<?php
$con = mysqli_connect('localhost','root','','bit');
$query = "SHOW TABLES";
$result = mysqli_query($con, $query);

$output = '<option value="Select">Select Department</option>';
while ($row = mysqli_fetch_array($result)) {
    $tableName = $row[0];
    // Skip the 'subjects' table and other system tables
    if ($tableName != 'subjects' && $tableName != 'migrations' && $tableName != 'password_resets' && $tableName != 'users') {
        $output .= '<option value="'.$tableName.'">'.$tableName.'</option>';
    }
}

echo $output;
mysqli_close($con);
?>