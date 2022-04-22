<?php
include '../Phps/connect/Connect.php';
include "fpdf.php";

$bodega=$_GET['bodega'];

$c1="";
$y=0;
if($bodega==='0') {
    $c1 = "SELECT `code`, `id_fabrica`, `detalle`, `cantidad`, `marca`, `valor`, `ubicacion` FROM `inventario` ORDER BY `detalle` ASC";

}else{
    $c1 = "SELECT `code`, `id_fabrica`, `detalle`, `cantidad`, `marca`, `valor`, `ubicacion` FROM `inventario` WHERE `ubicacion` IN ( SELECT `id` FROM `seccion_bod` INNER JOIN `bodega` WHERE `seccion_bod`.`id_bodega`=`bodega`.`cod_bodega` AND `seccion_bod`.`id_bodega`='$bodega')";

}


class PDF1 extends FPDF{

    function header()
    {
        $this->Image('',10,10,90,30);

    }
    function header2($bodega,$dbc)
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
        $bod="";
        if($bodega=="0"){
            $bod="TODAS";
        }else {

            $tt1 = "SELECT `cod_bodega`, `nombre`, `encargado`, `estado` FROM `bodega` WHERE `cod_bodega`='$bodega'";
            $qq1 = mysqli_query($dbc, $tt1);

            while ($row = mysqli_fetch_row($qq1)) {
                $bod = $row[1];
            }
        }


        $this->Cell(190, 3,utf8_decode("INVENTARIO BODEGA N°: $bod"),0,0,"left");
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
        $this->SetY(62);
        $this->SetX(38);
        $this->Line( 39, 65, 107, 65);
        $this->Cell(30, 2,"Encargado de bodega",0,"left");
        $this->SetY(68);
        $this->SetX(38);
        $this->Line( 39, 71, 107, 71);
        $this->Cell(30, 2,utf8_encode("Taller central"),0,"left");
        $this->SetY(74);
        $this->SetX(39);
        $this->Line( 39, 77, 80, 77);
        $this->Cell(30, 2,'-----',0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(62);
        $this->SetX(107);
        $this->Line( 121, 65, 150, 65);
        $this->Cell(30, 2,utf8_encode(" Fono:"),0,"left");
        $this->SetY(68);
        $this->SetX(107);
        $this->Line( 124, 71, 145, 71);
        $this->Cell(30, 2,utf8_encode(" Ciudad:"),0,"left");
        $this->SetY(74);
        $this->SetX(80);
        $this->Line( 112, 77, 150, 77);
        $this->Cell(30, 2,utf8_encode("Cond. de pago:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(62);
        $this->SetX(121);
        $this->Cell(30, 2,'+569 ',0,"left");
        $this->SetY(68);
        $this->SetX(124);
        $this->Cell(30, 2,'Sn Fdo.',0,"left");
        $this->SetY(74);
        $this->SetX(112);
        $this->Cell(30, 2,'---',0,"left");

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(99);
        $this->SetX(80);
        $this->Cell(30, 2,utf8_encode("Valores neto + 19% Iva."),0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(62);
        $this->SetX(150);
        $this->Line( 169, 65, 199, 65);
        $this->Cell(30, 2,utf8_decode("Fecha:"),0,"left");
        $this->SetY(68);
        $this->SetX(145);
        $this->Line( 170, 71, 196, 71);
        $this->Cell(30, 2,utf8_decode("Responsable:"),0,"left");
        $this->SetY(74);
        $this->SetX(150);
        $this->Line( 173, 77, 199, 77);
        $this->Cell(30, 2,utf8_decode("Entrega:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(62);
        $this->SetX(170);
        $this->Cell(30, 2,date('Y-m-d'),0,"left");
        $this->SetY(68);
        $this->SetX(169);
        $this->Cell(30, 2,'Sergio Valderas',0,"left");
        $this->SetY(74);
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
        $this->Cell(22, 12,utf8_decode("Ubicación"),1,0,"C");
        $this->SetY(123);
        $this->SetX(67);
        $this->Cell(83, 12,utf8_decode("Descripción"),1,0,"C");
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

            $cant1=$r[3];
            $precio=$r[5];

            $this->SetFillColor(190, 220, 170);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(83, 6,"", 0, 6, "L");
            $this->SetX(10);
            $this->Cell(16, 6, $r[3], 1, 0, "C");
            $this->SetX(26);
            $this->Cell(19, 6, $r[0], 1, 0, "C");
            $this->SetX(45);
            $this->Cell(22, 6, $r[6], 1, 0, "C");
            $this->SetX(67);
            $this->Cell(83, 6, strtoupper( substr($r[2],0,50)), 1, 0, "L");
            $this->SetX(150);
            $this->Cell(25, 6, number_format(intval($precio),0, ',', '.'), 1, 0, "R");
            $this->SetX(175);
            $this->Cell(25, 6, number_format($precio*$cant1, 0, ',', '.'), 1, 0, "R");

            $y=$y+6;


            $tn=$precio*$cant1;
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

$cont=0;

$pdf = new PDF1('P','mm','A4');
$pdf -> AddPage();
$q1=mysqli_query($dbc,$c1);

$pdf ->header2($bodega,$dbc);

$pdf ->body1($q1);
$pdf ->body2($q1);

$pdf ->Output();




