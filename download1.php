<?php
//  if ($_SERVER["REQUEST_METHOD"] == "POST") {


// $tt=$_POST['tabb'];
// $tabl=$_POST['tab1'];
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$exam_type=$_POST['exam_type'];
$subject=$_POST['subject'];
$mt=$_POST['mt'];
$mm=$_POST['mm'];
require('WriteHtml.php');
if($exam_type=='CT-1'){
    $ct1=array();
    $ct1=$_POST['ct1'];
    foreach($_POST['ct1'] as $value)
    {
        $ct1[]=$value;
    }
    $pdf=new PDF_HTML();
$pdf->AddPage();

$pdf->SetFont("Arial","",15);
$pdf->Cell(0,10,"BHILAI INSTITUTE OF TECHNOLOGY, DURG(CG)",1,1,'C');
$pdf->Cell(0,10,$dept."   ".$sem ."   " .$exam_type,0,1,"C");
$pdf->Cell(0,10,$subject,0,1,'C');
$pdf->Cell(50,10,"Maximum Time- ".$mt,0,0,'L');
$pdf->Cell(0,10,"Maximum Marks- ".$mm,0,1,'R');
$pdf->Cell(20,10,'Q.no',1,0,'C');
$pdf->Cell(150,10,'Questions',1,0,'C');
$pdf->Cell(0,10,'Marks',1,1,'C');

$pdf->Cell(20,10,'1 (a)',1,0,'C');
$pdf->Cell(150,10,$ct1[0],1,0,'C');
$pdf->Cell(0,10,'4',1,1,'C');

$pdf->Cell(20,10,'   (b)',1,0,'C');
$pdf->Cell(150,10,$ct1[1],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (c)',1,0,'C');
$pdf->Cell(150,10,$ct1[2],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (d)',1,0,'C');
$pdf->Cell(150,10,$ct1[3],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'2 (a)',1,0,'C');
$pdf->Cell(150,10,$ct1[4],1,0,'C');
$pdf->Cell(0,10,'4',1,1,'C');

$pdf->Cell(20,10,'   (b)',1,0,'C');
$pdf->Cell(150,10,$ct1[5],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (c)',1,0,'C');
$pdf->Cell(150,10,$ct1[6],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (d)',1,0,'C');
$pdf->Cell(150,10,$ct1[7],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->output();

}

else if($exam_type=='CT-2'){
    $ct2=array();
    $ct2=$_POST['ct2'];
    foreach($_POST['ct2'] as $value)
    {
        $ct2[]=$value;
    }
    $pdf=new PDF_HTML();
$pdf->AddPage();

$pdf->SetFont("Arial","",15);
$pdf->Cell(0,10,"BHILAI INSTITUTE OF TECHNOLOGY, DURG(CG)",1,1,'C');
$pdf->Cell(0,10,$dept."   ".$sem ."   " .$exam_type,0,1,"C");
$pdf->Cell(0,10,$subject,0,1,'C');
$pdf->Cell(50,10,"Maximum Time- ".$mt,0,0,'L');
$pdf->Cell(0,10,"Maximum Marks- ".$mm,0,1,'R');
$pdf->Cell(20,10,'Q.no',1,0,'C');
$pdf->Cell(150,10,'Questions',1,0,'C');
$pdf->Cell(0,10,'Marks',1,1,'C');

$pdf->Cell(20,10,'1 (a)',1,0,'C');
$pdf->Cell(150,10,$ct2[0],1,0,'C');
$pdf->Cell(0,10,'4',1,1,'C');

$pdf->Cell(20,10,'   (b)',1,0,'C');
$pdf->Cell(150,10,$ct2[1],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (c)',1,0,'C');
$pdf->Cell(150,10,$ct2[2],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (d)',1,0,'C');
$pdf->Cell(150,10,$ct2[3],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'2 (a)',1,0,'C');
$pdf->Cell(150,10,$ct2[4],1,0,'C');
$pdf->Cell(0,10,'4',1,1,'C');

$pdf->Cell(20,10,'   (b)',1,0,'C');
$pdf->Cell(150,10,$ct2[5],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (c)',1,0,'C');
$pdf->Cell(150,10,$ct2[6],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (d)',1,0,'C');
$pdf->Cell(150,10,$ct2[7],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'3 (a)',1,0,'C');
$pdf->Cell(150,10,$ct2[8],1,0,'C');
$pdf->Cell(0,10,'4',1,1,'C');

$pdf->Cell(20,10,'   (b)',1,0,'C');
$pdf->Cell(150,10,$ct2[9],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (c)',1,0,'C');
$pdf->Cell(150,10,$ct2[10],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->Cell(20,10,'   (d)',1,0,'C');
$pdf->Cell(150,10,$ct2[11],1,0,'C');
$pdf->Cell(0,10,'8',1,1,'C');

$pdf->output();

}





//  }


?>