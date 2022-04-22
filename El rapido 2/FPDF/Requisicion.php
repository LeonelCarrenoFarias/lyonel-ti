<?php
include '../Phps/connect/Connect.php';
include "fpdf.php";


$id=$_GET['idad'];

$c1="SELECT `Id_Solicitud`, `Responsable`, `Fecha`, `Estado` FROM `solicitud` WHERE `Id_Solicitud`=$id";

$c2="SELECT `Id_Det_Solicitud`, `Id_Solicitud`, `Codigo`, `Detalle`, `Cantidad`, `Estado` FROM `det_soli_mat` WHERE `Id_Solicitud`=$id";




class PDF1 extends FPDF{

    function header()
    {
        $this->Image('',10,10,90,30);

    }
    function header2($id)
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
        $this->Cell(190, 3,utf8_decode("REQUISICIÓN N°: $id/ 2021"),0,0,"left");
    }
    function body1($q1){

        $id_soli=0;
        $responsable="";
        $fecha2="";


        while($r2=mysqli_fetch_row($q1)){
            $id_soli=$r2[0];
            $responsable=$r2[1];
            $fecha2=$r2[2];
        }


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
        $this->Cell(30, 2,utf8_decode("N° Requisición:"),0,"left");

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
        $this->Cell(30, 2,$id_soli,0,"left");


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
        $this->Cell(30, 2,$fecha2,0,"left");
        $this->SetY(68);
        $this->SetX(169);
        $this->Cell(30, 2,$responsable,0,"left");
        $this->SetY(74);
        $this->SetX(174);
        $this->Cell(30, 2,'Personal',0,"left");
    }
    function body2($q2, $dbc){



        $this->SetFont('Arial', 'B', 10);
        $this->SetY(123);
        $this->SetX(10);
        $this->SetFillColor(190, 220, 170);
        $this->Cell(190, 12,"",0,0,"left",true);
        $this->SetY(123);
        $this->SetX(10);
        $this->Cell(15, 12,"Cantidad",1,0,"C");
        $this->SetY(123);
        $this->SetX(25);
        $this->Cell(20, 12,utf8_decode("Código"),1,0,"C");
        $this->SetY(123);
        $this->SetX(45);
        $this->Cell(105, 12,utf8_decode("Descripción"),1,0,"C");
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

        while($rrr=mysqli_fetch_row($q2)) {


            $c4="SELECT `valor` FROM `inventario` WHERE `code`=$rrr[2]";
            $q4=mysqli_query($dbc,$c4);
            $val=0;
            while($r2=mysqli_fetch_row($q4)){
                $val=$r2[0];
            }


            $cant1=$rrr[4];
            $tn=intval(intval($cant1)*intval($val));

            $this->SetFillColor(190, 220, 170);
            $this->SetY($y);
            $this->SetX(10);
            $this->Cell(15, 8, $rrr[4], 1, 0, "C");
            $this->SetX(25);
            $this->Cell(20, 8, $rrr[2], 1, 0, "C");
            $this->SetX(45);
            $this->Cell(105, 8, $rrr[3], 1, 0, "C");
            $this->SetX(150);
            $this->Cell(25, 8, number_format(intval($val),0, ',', '.'), 1, 0, "R");
            $this->SetX(175);
            $this->Cell(25, 8, number_format($tn, 0, ',', '.'), 1, 0, "R");

            $y=$y+8;

            $ttn+=$tn;
            $iva=intval($ttn*0.19);
            $ttt=intval($iva+$ttn);
        }

        $this->SetY($y);
        $this->SetX(10);
        $this->Cell(120, 15,utf8_decode("Observación: "),1,0,"L");

        $this->SetY($y);
        $this->SetX(130);
        $this->Cell(45, 5,"Neto",1,0,"C",true);
        $this->SetY($y+5);
        $this->SetX(130);
        $this->Cell(45, 5,"19% Iva",1,0,"C",true);
        $this->SetY($y+10);
        $this->SetX(130);
        $this->Cell(45, 5,"Total",1,0,"C",true);

        $this->SetY($y);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttn, 0, ',', '.'),1,0,"R",true);
        $this->SetY($y+5);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($iva, 0, ',', '.'),1,0,"R",true);
        $this->SetY($y+10);
        $this->SetX(175);
        $this->Cell(25, 5,number_format($ttt, 0, ',', '.'),1,0,"R",true);

    }

    function Footer(){
        $y=240;
        $this->SetFont('Arial', 'B', 10);
        $this->SetY($y);
        $this->SetX(10);
        $this->SetFillColor(255, 110, 0);
        $this->Cell(190, 40,"",0,0,"left");

        $this->SetY($y+9);
        $this->SetX(50);
        $this->Cell(30, 10,"Agropoda Ltda. C.",0,0,"C");

        $this->SetY($y+14);
        $this->SetX(50);
        $this->Cell(30, 10,"Cel: +569 93497065",0,0,"C");

        $this->SetY($y+19);
        $this->SetX(50);
        $this->Cell(30, 10,"e-mail: agropoda@agropoda.cl",0,0,"C");

        $this->SetY($y+24);
        $this->SetX(150);
        $this->Line( 129, $y+24, 182, $y+24);
        $this->Cell(30, 10,"Firma",0,0,"left");


    }

}

$pdf = new PDF1('P','mm','A4');
$pdf -> AddPage();
$pdf ->header();
$pdf ->header2($id);

$q1=mysqli_query($dbc,$c1);
$q2=mysqli_query($dbc,$c2);
$pdf ->body1($q1);
$pdf ->body2($q2,$dbc);

$pdf ->Output();




