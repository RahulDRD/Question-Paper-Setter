<?php
$con = mysqli_connect('localhost','root','','bit');
$query = "SELECT * FROM subjects";
$result = mysqli_query($con, $query);

$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '<tr>
        <td>'.$row['department'].'</td>
        <td>'.$row['sem'].'</td>
        <td>'.$row['subject'].'</td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="editSubject('.$row['sno'].', \''.$row['department'].'\', '.$row['sem'].', \''.$row['subject'].'\')">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteSubject('.$row['sno'].')">Delete</button>
        </td>
    </tr>';
}

echo $output;
mysqli_close($con);
?>