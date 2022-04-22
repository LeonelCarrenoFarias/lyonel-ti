<?php
include '../../connect/Connect.php';
include "barcode.inc.php";
include "../../../FPDF/fpdf.php";

$code=$_GET['code'];


$llenar='00000'.$code;
new barCodeGenrator($llenar,1,'test.gif', $code, 190, 130, 1);

$pdf = new FPDF ('L','cm',array(9,6));
$pdf -> AddPage();

$pdf->Image('test.gif', 0.5,0.5,780,5);
$pdf->SetFont('Arial', 'B', 10);
$pdf -> Output();



