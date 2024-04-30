<?php
include_once "./config.php";
require('fpdf/fpdf.php');
$full_name = "";
$qr_code = "";

if(!isset($_GET['inv'])){
    header("Location: profile_invoices.php");
}
else{
    $sql="SELECT * from user_payment";
      $result=$conn-> query($sql);
      if ($result-> num_rows == 0){
        header("Location: profile_invoices.php");
      }
      else{
        $row=$result-> fetch_assoc();
        $full_name = $row['full_name'];
        $qr_code = $row['qr_code'];
      }
}
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 26);
$pdf->Cell(0, 5, 'Invoice', 0, 1,'C');


$pdf->SetFont('Arial', 'B', 16);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0, 10, 'Full Name: ', 0, 0,'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 10, "$full_name", 0, 1,'C');

$pdf->Ln();
$pdf->Cell(66, 10, "", 0, 0);
$pdf->Image("./uploads/qr_codes/$qr_code");




$pdf->Output();

?>