<?php
include '../Phps/connect/Connect.php';
include "fpdf.php";

$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];


$c1="SELECT `Code`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`, `documento_asoc`, `Estado` FROM `det_material` WHERE `Fecha_Ingreso` BETWEEN '$fecha1' AND '$fecha2' ";



class PDF1 extends FPDF{

    function header()
    {
        $this->Image('',10,10,90,30);

    }
    function header2()
    {
        $this->SetFillColor(195, 195, 195);
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(16);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetFont('Arial', '', 9);
        $this->SetY(20);
        $this->SetX(140);
        $this->Cell(40, 2,"EL RAPIDO 2",0,0,"left");
        $this->SetY(24);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetY(28);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetY(32);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetY(36);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetY(40);
        $this->SetX(140);
        $this->Cell(44, 2,"",0,0,"left");
        $this->SetY(44);
        $this->SetX(140);
        $this->Cell(40, 2,"",0,0,"left");
        $this->SetY(48);
        $this->SetX(10);
        $this->SetFillColor(190, 220, 170);
        $this->Cell(190, 3,"",0,0,"left",true);
        $this->SetFont('Arial', 'B', 12);
        $this->SetY(83);
        $this->SetX(60);
        $this->Cell(190, 3,utf8_decode("Informe de INGRESOS AL SISTEMA 2021"),0,0,"left");
    }
    function body1(){


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(89);
        $this->SetX(10);
        $this->Cell(190, 24,"",1,0,"left");
        $this->SetY(92);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("Señor:"),0,"left");
        $this->SetY(98);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("Dirección:"),0,"left");
        $this->SetY(104);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("N° Documento:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(38);
        $this->Line( 39, 95, 107, 95);
        $this->Cell(30, 2,"Encargado de bodega",0,"left");
        $this->SetY(98);
        $this->SetX(38);
        $this->Line( 39, 101, 107, 101);
        $this->Cell(30, 2,utf8_encode("Taller central"),0,"left");
        $this->SetY(104);
        $this->SetX(39);
        $this->Line( 39, 107, 80, 107);
        $this->Cell(30, 2,'-----',0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(92);
        $this->SetX(107);
        $this->Line( 121, 95, 150, 95);
        $this->Cell(30, 2,utf8_encode(" Fono:"),0,"left");
        $this->SetY(98);
        $this->SetX(107);
        $this->Line( 124, 101, 145, 101);
        $this->Cell(30, 2,utf8_encode(" Ciudad:"),0,"left");
        $this->SetY(104);
        $this->SetX(80);
        $this->Line( 112, 107, 150, 107);
        $this->Cell(30, 2,utf8_encode("Cond. de pago:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(121);
        $this->Cell(30, 2,'+569',0,"left");
        $this->SetY(98);
        $this->SetX(124);
        $this->Cell(30, 2,'Sn Fdo.',0,"left");
        $this->SetY(104);
        $this->SetX(112);
        $this->Cell(30, 2,'---',0,"left");

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(129);
        $this->SetX(80);
        $this->Cell(30, 2,utf8_encode("Valores neto más 19% Iva."),0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(92);
        $this->SetX(150);
        $this->Line( 173, 95, 199, 95);
        $this->Cell(30, 2,utf8_decode("Fecha:"),0,"left");
        $this->SetY(98);
        $this->SetX(145);
        $this->Line( 170, 101, 196, 101);
        $this->Cell(30, 2,utf8_decode("Responsable:"),0,"left");
        $this->SetY(104);
        $this->SetX(150);
        $this->Line( 173, 107, 199, 107);
        $this->Cell(30, 2,utf8_decode("Entrega:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(174);
        $this->Cell(30, 2,date('Y-m-d'),0,"left");
        $this->SetY(98);
        $this->SetX(169);
        $this->Cell(30, 2,'Sergio Valderas',0,"left");
        $this->SetY(104);
        $this->SetX(174);
        $this->Cell(30, 2,'Personal',0,"left");

    }
    function body2($q1){



        $this->SetFont('Arial', 'B', 10);
        $this->SetY(123);
        $this->SetX(10);
        $this->SetFillColor(190, 220, 170);
        $this->Cell(190, 12,"",0,0,"left",true);
        $this->SetY(123);
        $this->SetX(10);
        $this->Cell(16, 12,"Cantidad",1,0,"C");
        $this->SetY(123);
        $this->SetX(26);
        $this->Cell(19, 12,utf8_decode("Código"),1,0,"C");
        $this->SetY(123);
        $this->SetX(45);
        $this->Cell(20, 12,utf8_decode("Fecha"),1,0,"C");
        $this->SetY(123);
        $this->SetX(65);
        $this->Cell(85, 12,utf8_decode("Descripción"),1,0,"C");
        $this->SetY(123);
        $this->SetX(150);
        $this->Cell(25, 12,utf8_decode("Neto x/u"),1,0,"C");
        $this->SetY(123);
        $this->SetX(175);
        $this->Cell(25, 12,utf8_decode("Total Neto"),1,0,"C");


        $y=135;
        $ttn=0;
        $ttt=0;
        $iva=0;

        $this->SetY(129);

        while($r=mysqli_fetch_row($q1)) {

            $cant1=$r[2];
            $tn=$r[6];


            $this->SetFillColor(190, 220, 170);
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(83, 6,"", 0, 6, "L");
            $this->SetX(10);
            $this->Cell(16, 6, $r[2], 1, 0, "C");
            $this->SetX(26);
            $this->Cell(19, 6, $r[0], 1, 0, "C");
            $this->SetX(45);
            $this->Cell(20, 6, $r[8], 1, 0, "C");
            $this->SetX(65);
            $this->Cell(85, 6, $r[3], 1, 0, "L");
            $this->SetX(150);
            $this->Cell(25, 6, number_format(intval($tn/$cant1),0, ',', '.'), 1, 0, "R");
            $this->SetX(175);
            $this->Cell(25, 6, number_format($tn, 0, ',', '.'), 1, 0, "R");

            $y=$y+6;

            $ttn+=$tn;
            $iva=intval($ttn*0.19);
            $ttt=intval($iva+$ttn);
        }

        $this->Cell(45, 5,"",0,5,"C");
        $this->Cell(45, 5,"",0,5,"C");
        
        $this->SetX(10);
        $this->Cell(120, 15,utf8_decode("Observación: "),1,0,"L");

        $this->SetFont('Arial', 'B', 10);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttn, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"Neto",1,5,"C",true);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($iva, 0, ',', '.'),1,0,"R",true);

        $this->SetX(130);
        $this->Cell(45, 5,"19% Iva",1,5,"C",true);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttt, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"Total",1,5,"C",true);
    }

}

$pdf = new PDF1('P','mm','A4');
$pdf -> AddPage();
$pdf ->header();
$q1=mysqli_query($dbc,$c1);

$pdf ->header2();

$pdf ->body1($q1);
$pdf ->body2($q1);

$pdf ->Output();




