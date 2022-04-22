<?php
include '../Phps/connect/Connect.php';
include "fpdf.php";

$centro=$_GET['centrocosto'];
$c1="";


if($centro === "0"){
    $c1="SELECT * FROM `det_sal_materiales` ORDER BY `Fecha_Salida` ASC";

}else {

    $c1="SELECT `Code`, `Id_Centro`, `Id_Det_Sal_Materiales`, `Detalle`, `Cantidad`, `Monto`, `Fecha_Salida`, `Estado` FROM `det_sal_materiales` WHERE `Id_Centro`='$centro' ORDER BY `Fecha_Salida` ASC";
}


class PDF1 extends FPDF{

    function header()
    {
        $this->Image('',10,10,90,30);

    }
    function header2($centro)
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
        $var="";
        if($centro === "0"){
            $var="TODOS";
        }else{
            $var=$centro;
        }
        $this->Cell(190, 3,"Consolidado Cliente: ".$var,0,0,"left");
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
        $this->Cell(19, 12,utf8_decode("Código Cl."),1,0,"C");
        $this->SetY(123);
        $this->SetX(45);
        $this->Cell(20, 12,utf8_decode("Fecha"),1,0,"C");
        $this->SetY(123);
        $this->SetX(65);
        $this->Cell(85, 12,utf8_decode("Descripción"),1,0,"C");
        $this->SetY(123);
        $this->SetX(150);
        $this->Cell(25, 12,utf8_decode("Neto+IVA+%U"),1,0,"C");
        $this->SetY(123);
        $this->SetX(175);
        $this->Cell(25, 12,utf8_decode("Venta"),1,0,"C");


        $y=135;
        $ttn=0;
        $ttt=0;
        $iva=0;
        $aux1=0;
        $aux3=0;
        $taux1=0;
        $tiva=0;
        $this->SetY(129);

        while($r=mysqli_fetch_row($q1)) {

            $cant1=$r[4];
            $tn=$r[5];


             $this->SetFillColor(190, 220, 170);
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(83, 6,"", 0, 6, "L");
            $this->SetX(10);
            $this->Cell(16, 6, $r[4], 1, 0, "C");
            $this->SetX(26);
            $this->Cell(19, 6, $r[1], 1, 0, "C");
            $this->SetX(45);
            $this->Cell(20, 6, $r[6], 1, 0, "C");
            $this->SetX(65);
            $this->Cell(85, 6, $r[3], 1, 0, "L");
            $this->SetX(150);
            if($cant1>0) {
                $v1 = round($tn / $cant1);
            }else{
                $v1=0;
            }
            $this->Cell(25, 6, number_format(intval($v1),0, ',', '.'), 1, 0, "R");
            $this->SetX(175);
            $this->Cell(25, 6, number_format($tn, 0, ',', '.'), 1, 0, "R");

            $y=$y+6;
            $ttt+=$tn;

            $aux1=intval(round($tn*0.20));
            $tn=round($tn*0.80);
            $taux1+=$aux1;

            $aux1=intval(round($tn*0.19));
            $tn=round($tn*0.81);
            $tiva+=$aux1;


            $ttn+=$tn;
        }

        $this->Cell(45, 5,"",0,5,"C");
        $this->Cell(45, 5,"",0,5,"C");
        
        $this->SetX(10);
        $this->Cell(120, 20,utf8_decode("Observación: "),1,0,"L");

        $this->SetFont('Arial', 'B', 10);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttn, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"Neto",1,5,"R",true);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($tiva, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"19% Iva",1,5,"R",true);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($taux1, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"Total 20%U",1,5,"R",true);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttt, 0, ',', '.'),1,0,"R",true);
        $this->SetX(130);
        $this->Cell(45, 5,"Total Venta",1,5,"R",true);
    }

}

$pdf = new PDF1('P','mm','A4');
$pdf -> AddPage();
$pdf ->header();
$q1=mysqli_query($dbc,$c1);

$pdf ->header2($centro);

$pdf ->body1($q1);
$pdf ->body2($q1);

$pdf ->Output();




