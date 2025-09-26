<?php
$con = mysqli_connect('localhost','root','','bit');
$query = "SHOW TABLES";
$result = mysqli_query($con, $query);

$output = '';
while ($row = mysqli_fetch_array($result)) {
    $tableName = $row[0];
    // Skip the 'subjects' table
    if ($tableName != 'subjects' && $tableName != 'migrations' && $tableName != 'password_resets' && $tableName != 'users') {
        $output .= '<tr>
            <td>'.$tableName.'</td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="editDepartment(\''.$tableName.'\')">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteDepartment(\''.$tableName.'\')">Delete</button>
            </td>
        </tr>';
    }
}

echo $output;
mysqli_close($con);
?>