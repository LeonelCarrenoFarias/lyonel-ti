<?php
include '../../connect/connect.php';
include "../../../FPDF/fpdf.php";


$id=$_GET['idad'];

$c1="SELECT `Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`, `Observacion`, `Vendedor`, `Despacho`, `Tipo`,`Cond_Pago`,`N_Cotizacion` FROM `adquisicion` WHERE `Id_Adquisicion`=$id";
$q=mysqli_query($dbc,$c1);
$tipo=0;
$cond="";
$n_coti=0;
while($rr=mysqli_fetch_row($q)){
    $tipo=$rr[11];
    $cond=$rr[12];
    $n_coti=$rr[13];
}
$c2="";
$c3="";

if($tipo==0){
    $c2="SELECT `Id_Adqui`, `Id_Material`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Monto`, `Estado` FROM `det_material` WHERE `Id_Adqui`=$id ";

    $c3="SELECT `det_proveedor`.`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`,`Fono` FROM `det_proveedor` INNER JOIN `proveedor` WHERE `Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";


}else if($tipo==1){

    $c2="SELECT `Id_Adqui`, `Id_Herramienta`, `Id_Det_Herramienta`,`Descripcion`,`Fecha_Compra`, `Tipo`, `Estado` FROM `det_herramienta` WHERE `Id_Adqui`=$id";
    $c3="SELECT `det_proveedor`.`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`,`Fono` FROM `det_proveedor` INNER JOIN `proveedor` WHERE `Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";


}else if($tipo==2){
    $c2="SELECT `Id_Adqui`, `Id_Servicio`, `Id_Det_Servicio`, `Item`, `Valor`, `Cantidad`, `Estado` FROM `det_servicio` WHERE `Id_Adqui`=$id";
    $c3="SELECT `det_proveedor`.`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`,`Fono` FROM `det_proveedor` INNER JOIN `proveedor` WHERE `Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";


}else{
    $c2="SELECT `Id_Adquisicion`, `Id_Arriendo`, `Id_Det_Arriendo`, `Cantidad`, `Fecha_Arriendo`, `Fecha_Devolucion`, `Estado` FROM `det_arriendo` WHERE `Id_Adquisicion`=$id";
    $c3="SELECT `det_proveedor`.`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`,`Fono` FROM `det_proveedor` INNER JOIN `proveedor` WHERE `Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";

}

class PDF1 extends FPDF{

    function header()
    {
    }
    function header2($id)
    {
        $this->SetFillColor(195, 195, 195);
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(46);
        $this->SetX(10);
        $this->Cell(40, 2,"76.146.213-K",0,0,"left");
        $this->SetFont('Arial', '', 9);
        $this->SetY(50);
        $this->SetX(10);
        $this->Cell(40, 2,"Montaje y Obras Civiles",0,0,"left");
        $this->SetY(54);
        $this->SetX(10);
        $this->Cell(40, 2,"El Alamo 0891, San Fernando",0,0,"left");
        $this->SetY(58);
        $this->SetX(10);
        $this->Cell(40, 2,"Maestranza Toribio Soto Mayor s/n, Camino Nincunlauta",0,0,"left");
        $this->SetY(62);
        $this->SetX(10);
        $this->Cell(40, 2,"Fono (72)-2 711698",0,0,"left");
        $this->SetY(66);
        $this->SetX(10);
        $this->Cell(40, 2,"Movil +569 90158362",0,0,"left");
        $this->SetY(70);
        $this->SetX(10);
        $this->Cell(40, 2,"rfarfan@ingesaf.com",0,0,"left");
        $this->SetY(74);
        $this->SetX(10);
        $this->Cell(40, 2,"www.ingesaf.com",0,0,"left");
        $this->SetY(77);
        $this->SetX(10);
        $this->SetFillColor(255, 110, 0);
        $this->Cell(190, 3,"",0,0,"left",true);
        $this->SetFont('Arial', 'B', 12);
        $this->SetY(83);
        $this->SetX(60);
        $this->Cell(190, 3,utf8_decode("ORDEN DE COMPRA N°: $id/ 2020"),0,0,"left");
    }
    function body1($q2,$q3){

        $n1="";
        $d1="";
        $ci1="";
        $fono=0;
        $fecha="";
        $cond="";
        $vendedor="";
        $distribucion="";
        $n_coti=0;

        while($r2=mysqli_fetch_row($q2)){
            $fecha=$r2[2];
            $cond=utf8_decode($r2[12]);
            $n_coti=$r2[13];
            $vendedor=$r2[9];

        }
        while($r2=mysqli_fetch_row($q3)){
            $n1=utf8_decode($r2[1]);
            $d1=utf8_decode($r2[3]);
            $ci1=utf8_decode($r2[4]);
            $fono=$r2[12];
            $distribucion=$r2[10];

        }


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(89);
        $this->SetX(10);
        $this->Cell(190, 24,"",1,0,"left");
        $this->SetY(92);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("SEÑORES:"),0,"left");
        $this->SetY(98);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("DIRECCIÓN:"),0,"left");
        $this->SetY(104);
        $this->SetX(10);
        $this->Cell(30, 2,utf8_decode("N° COTIZACIÓN:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(38);
        $this->Line( 39, 95, 107, 95);
        $this->Cell(30, 2,$n1,0,"left");
        $this->SetY(98);
        $this->SetX(38);
        $this->Line( 39, 101, 107, 101);
        $this->Cell(30, 2,utf8_encode($d1),0,"left");
        $this->SetY(104);
        $this->SetX(39);
        $this->Line( 39, 107, 80, 107);
        $this->Cell(30, 2,$n_coti,0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(92);
        $this->SetX(107);
        $this->Line( 121, 95, 150, 95);
        $this->Cell(30, 2,utf8_encode(" FONO:"),0,"left");
        $this->SetY(98);
        $this->SetX(107);
        $this->Line( 124, 101, 150, 101);
        $this->Cell(30, 2,utf8_encode(" CIUDAD:"),0,"left");
        $this->SetY(104);
        $this->SetX(80);
        $this->Line( 112, 107, 150, 107);
        $this->Cell(30, 2,utf8_encode("COND. DE PAGO:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(121);
        $this->Cell(30, 2,utf8_encode("+(56)-".$fono),0,"left");
        $this->SetY(98);
        $this->SetX(124);
        $this->Cell(30, 2,utf8_encode($ci1),0,"left");
        $this->SetY(104);
        $this->SetX(112);
        $this->Cell(30, 2,utf8_encode($cond),0,"left");

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(129);
        $this->SetX(80);
        $this->Cell(30, 2,utf8_encode("VALORES NETO MAS 19% IVA."),0,"left");


        $this->SetFont('Arial', 'B', 10);
        $this->SetY(92);
        $this->SetX(150);
        $this->Line( 173, 95, 199, 95);
        $this->Cell(30, 2,utf8_decode("FECHA:"),0,"left");
        $this->SetY(98);
        $this->SetX(150);
        $this->Line( 173, 101, 199, 101);
        $this->Cell(30, 2,utf8_decode("VENDEDOR:"),0,"left");
        $this->SetY(104);
        $this->SetX(150);
        $this->Line( 173, 107, 199, 107);
        $this->Cell(30, 2,utf8_decode("ENTREGA:"),0,"left");

        $this->SetFont('Arial', '', 9);
        $this->SetY(92);
        $this->SetX(174);
        $this->Cell(30, 2,utf8_decode($fecha),0,"left");
        $this->SetY(98);
        $this->SetX(174);
        $this->Cell(30, 2,utf8_decode($vendedor),0,"left");
        $this->SetY(104);
        $this->SetX(174);
        $this->Cell(30, 2,utf8_decode($distribucion),0,"left");

    }
    function body2($q2,$tipo){
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(123);
        $this->SetX(10);
        $this->SetFillColor(255, 110, 0);
        $this->Cell(190, 12,"",0,0,"left",true);
        $this->SetY(123);
        $this->SetX(10);
        $this->Cell(15, 12,"CANT",1,0,"C");
        $this->SetY(123);
        $this->SetX(25);
        $this->Cell(20, 12,utf8_decode("CODIGO"),1,0,"C");
        $this->SetY(123);
        $this->SetX(45);
        $this->Cell(105, 12,utf8_decode("DESCRIPCIÓN"),1,0,"C");
        $this->SetY(123);
        $this->SetX(150);
        $this->Cell(25, 12,utf8_decode("NETO U."),1,0,"C");
        $this->SetY(123);
        $this->SetX(175);
        $this->Cell(25, 12,utf8_decode("TOTAL NETO"),1,0,"C");


        $y=135;
        $ttn=0;
        $ttt=0;
        $iva=0;

        while($rrr=mysqli_fetch_row($q2)) {
            $v1=intval($rrr[3]);
            $v2=intval($rrr[5]);
            $tn=$v1*$v2;
            $ttn=$ttn+$tn;
            $iva=$ttn*0.19;
            $ttt=$iva+$ttn;
            $txt1=utf8_decode($rrr[1]);
            if($tipo==0){
                $txt2=$rrr[4];
            }elseif($tipo==1){
                $txt2=$rrr[3];
            }elseif($tipo==2){
                $txt2=$rrr[3];
            }else{
                $txt2=$rrr[7];
            }

            $this->SetFillColor(255, 110, 0);
            $this->SetY($y);
            $this->SetX(10);
            $this->Cell(15, 8, $rrr[3], 1, 0, "C");
            $this->SetX(25);
            $this->Cell(20, 8, utf8_decode($txt1), 1, 0, "C");
            $this->SetX(45);
            $this->Cell(105, 8, utf8_decode($txt2), 1, 0, "C");
            $this->SetX(150);
            $this->Cell(25, 8, number_format(intval($rrr[5]),0, ',', '.'), 1, 0, "R");
            $this->SetX(175);
            $this->Cell(25, 8, number_format($tn, 0, ',', '.'), 1, 0, "R");

            $y=$y+8;

        }

        $this->SetY($y);
        $this->SetX(10);
        $this->Cell(120, 15,utf8_decode("OBSERVACIÓN: se solicita despacho para 26 de septiembre"),1,0,"L");

        $this->SetY($y);
        $this->SetX(130);
        $this->Cell(45, 5,"NETO",1,0,"C",true);
        $this->SetY($y+5);
        $this->SetX(130);
        $this->Cell(45, 5,"+19% IVA",1,0,"C",true);
        $this->SetY($y+10);
        $this->SetX(130);
        $this->Cell(45, 5,"TOTAL",1,0,"C",true);

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
        $this->Cell(30, 10,"ROBINSON FARFAN C.",0,0,"C");

        $this->SetY($y+14);
        $this->SetX(50);
        $this->Cell(30, 10,"CEL 09-0158362",0,0,"C");

        $this->SetY($y+19);
        $this->SetX(50);
        $this->Cell(30, 10,"EMAIL: rfarfan@ingesaf.com",0,0,"C");

        $this->SetY($y+24);
        $this->SetX(150);
        $this->Line( 129, $y+24, 182, $y+24);
        $this->Cell(30, 10,"FIRMA",0,0,"left");


    }

}

$pdf = new PDF1('P','mm','A4');
$pdf -> AddPage();
$pdf ->header();
$pdf ->header2($id);

$q1=mysqli_query($dbc,$c1);
$q2=mysqli_query($dbc,$c3);
$pdf ->body1($q1,$q2);
$q3=mysqli_query($dbc,$c2);

$pdf ->body2($q3,$tipo);
$pdf ->Output();




