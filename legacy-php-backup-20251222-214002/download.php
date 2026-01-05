<?php
error_reporting(0);
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$exam_type=$_POST['exam_type'];
$subject=$_POST['subject'];
$mt=$_POST['mt'];
$mm=$_POST['mm'];
$dateofexam=$_POST['dateofexam'];
$tabl="";
if($sem=='Sem-1')
{
  $sem='Semester-I';
}
else if($sem=='Sem-2')
{
  $sem='Semester-II';
}
else if($sem=='Sem-3')
{
  $sem='Semester-III';
}
else if($sem=='Sem-4')
{
  $sem='Semester-IV';
}


if($dept=='mca'){
  $dept='Masters Of Computer Application(MCA)';
}
else if($dept='mba'){
  $dept='Masters of Buisness Application(MBA)';
}
if($exam_type=='CT-1'){
    $ct1=array();
    $ct1=$_POST['ct1'];
    foreach($_POST['ct1'] as $value)
    {
        $ct1[]=$value;
    }
$tabl="
<div id='message'>
  <b><center>Class Test-I<br>
             Date of Examination:$dateofexam<br>
            $dept<br>
            $sem<br>
            Subject:$subject
  
  </center>
  
<center>
<b>
<table>

<tr>
<td><p>Max Time:$mt</p></td>
<td align ='right'><p>Max Marks:$mm</p></td>

</tr>
</table>
</b>
<hr>
  <br>
  <p><i>Note:Attempt all questions. Attempt any two parts from(a), (b) and (c) carrying 8 marks each</i></p>
  <br>

  </div>
<table border=1 class='display' id='ct1tbl'
data-paging='false'
data-searching='false'
data-ordering='false'
>
<thead>
<tr>
    <th text-center>Q.No</th>
    <th>   </th>
    <th>Questions</th>
    <th>Marks</th>

</tr>
</thead>
<tbody>
<tr>
<td  class='text-center' width='5%'>1.
</td>
<td width='5%'>(a)</td>
<td>  $ct1[0]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td> $ct1[1]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td> $ct1[2]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct1[3]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td   class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td> $ct1[4]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct1[5]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct1[6]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct1[7]</td>
<td width='5%'>08</td>
</tr>
</tbody>
</table>
</center>
<center>****000****</center>
";

}

else if($exam_type=='CT-2'){
    $ct2=array();
    $ct2=$_POST['ct2'];
    foreach($_POST['ct2'] as $value)
    {
        $ct2[]=$value;
    }
$tabl="
<div id='message'>
  <b><center>Class Test-II<br>
  Date of Examination:$dateofexam<br>
 $dept<br>
 $sem<br>
 Subject:$subject

</center>
<b>
<table>
<tr>
<td>Max Time:$mt</td>
<td align ='right'>Max Marks:$mm</td>
</tr>
</table>
</b>
<hr>
<br>
<p><i>Note:Attempt all questions. Attempt any two parts from(a), (b) and (c) carrying 8 marks each</i></p>
</div>
<table border=1 class='display' id='ct2tbl'
data-paging='false'
data-searching='false'
data-ordering='false'
>
<thead>
<tr>
<th text-center>Q.No</th>
<th>   </th>
<th>Questions</th>
<th>Marks</th>

</tr>
</thead>
<tbody>
<tr>
<td  class='text-center' width='5%'>1.
</td>
<td width='5%'>(a)</td>
<td>  $ct2[0]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td> $ct2[1]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td> $ct2[2]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[3]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td  class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td> $ct2[4]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct2[5]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct2[6]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[7]</td>
<td width='5%'>08</td>
</tr>

<tr>
<td  class='text-center'>3.</td>
<td width='5%'>(a)</td>
<td> $ct2[8]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct2[9]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct2[10]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[11]</td>
<td width='5%'>08</td>
</tr>
</table>
<center>****000****</center>
";

}

else if($exam_type=='End Sem Exam'){
    $ct1=array();
    $ct1=$_POST['ct1'];
    foreach($_POST['ct1'] as $value)
    {
        $ct1[]=$value;
    }
    $ct2=array();
    $ct2=$_POST['ct2'];
    foreach($_POST['ct2'] as $value)
    {
        $ct2[]=$value;
    }
$tabl="
<div id='message'>
  <b><center>End Semester Exam<br>
  Date of Examination:$dateofexam<br>
 $dept<br>
 $sem<br>
 Subject:$subject

</center>
<b>
<table>
<tr>
<td>Max Time:$mt</td>
<td align ='right'>Max Marks:$mm</td>
</tr>
</table>
</b>
<hr>
<br>
<p><i>Note:Attempt all questions. Attempt any two parts from(b), (c) and (d) carrying 8 marks each</i></p>
</div>

<table border=1 class='display' id='esetbl'
data-paging='false'
data-searching='false'
data-ordering='false'
>
<thead>
<tr>
<th text-center>Q.No</th>
<th>   </th>
<th>Questions</th>
<th>Marks</th>

</tr>
</thead>
<tbody>
<tr>
<td  class='text-center' width='5%'>1.
</td>
<td width='5%'>(a)</td>
<td>  $ct1[0]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td> $ct1[1]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td> $ct1[2]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct1[3]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td  class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td> $ct1[4]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct1[5]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct1[6]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct1[7]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td  class='text-center' width='5%'>3.
</td>
<td width='5%'>(a)</td>
<td>  $ct2[0]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td> $ct2[1]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td> $ct2[2]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[3]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td  class='text-center'>4.</td>
<td width='5%'>(a)</td>
<td> $ct2[4]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct2[5]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct2[6]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[7]</td>
<td width='5%'>08</td>
</tr>

<tr>
<td  class='text-center'>5.</td>
<td width='5%'>(a)</td>
<td> $ct2[8]</td>
<td width='5%'>04</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(b)</td>
<td>  $ct2[9]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(c)</td>
<td>  $ct2[10]</td>
<td width='5%'>08</td>
</tr>
<tr>
<td>  </td>
<td width='5%'>(d)</td>
<td>  $ct2[11]</td>
<td width='5%'>08</td>
</tr>
</tbody>
</table>
<center>****000****</center>
";

}


echo"$tabl";

?>