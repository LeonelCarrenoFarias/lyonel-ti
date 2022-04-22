<?php
include("fpdf.php");
/*include ('../OneTruck System/Connect.php');
require('../FPDF/fpdf.php');

$codigo=$_GET['n_orden'];

$q1="SELECT 'Cod_orden','Cod_factura','Fecha','Fecha_reparacion','Fecha_pago','Total_neto','Total_iva','Total','Nombre_trabajador','Km_ingreso','Forma_pago' FROM orden_de_servicio WHERE orden_de_Servicio.Cod_orden=$codigo";

$aux="SELECT 'Cod_cliente' FROM orden_de_servicio WHERE orden_de_servicio.Cod_cliente=$codigo";
$au=mysqli_query($dbc.$aux);
$a=mysqli_fetch_row($au);

$q2="SELECT 'Nombre_empresa','Rut_cliente','Direccion','Telefono','Email' FROM cliente WHERE cliente.Cod_cliente= $a[0]";

$q3="SELECT 'N_patente','Marca','Modelo','Kilometraje','N_chasis' FROM vehiculo WHERE vehiculo.Cod_cliente=$a[0]";

$q4="SELECT 'Nombre_solicitante','Rut_solicitante','Telefono' FROM trabajo_solicitado WHERE trabajo_solicitado.Cod_orden=$codigo";

$q5="SELECT 'N_item','Descripcion' FROM trabajo_solicitado WHERE trabajo_solicitado.Cod_orden=$codigo";

$q6="SELECT 'Cod_item','Descripcion_trabajo','Horas_hombre','Valor_hora' FROM trabajo_realizado WHERE trabajo_realizado.Cod_orden=$codigo";

$q7="SELECT 'Cantidad','Nombre','Subtotal' FROM detalle_repuesto WHERE detalle_repuesto.Cod_cliente=$codigo";

$q8="SELECT 'Direccion','Total' FROM terreno WHERE terreno.Cod_cliente=$codigo";*/

class PDF extends FPDF{
    function header (){
        $this -> SetFillColor(195,195,195);
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetY(2);
        $this -> SetX(90);
        $this -> Cell(20,2,0,0,'C');

        $this -> SetY(5);
        $this -> SetX(10);
        $this -> Cell(40,10,1,0,'C');
        $this -> SetY(15);
        $this -> SetX(10);
        $this -> Cell(40,15,1,0,'C');

        $this -> SetY(35);
        $this -> SetX(10);
        $this -> Cell(40,10,1,0,'C',true);


        $this -> SetY(2);
        $this -> SetX(147);
        $this -> Cell(30,7,utf8_decode('N° Orden'), 0,0,'L');
        $this -> SetY(2);
        $this -> SetX(170);
        $this -> Cell(30,6,1,0,'C');
        $this -> SetY(10);
        $this -> SetX(147);
        $this -> Cell(30,7,utf8_decode('N° Factura'), 0,0,'L');
        $this -> SetY(10);
        $this -> SetX(170);
        $this -> Cell(30,6,1,0,'C');
        $this -> Cell(30);
        $this -> SetY(15);
        $this -> SetX(147);
        $this -> Cell(30,10,utf8_decode('Onetruck'), 0,0,'L');
        $this -> SetY(20);
        $this -> SetX(147);
        $this -> Cell(50,10, utf8_decode('Los culenes, sitio D'), 0,0,'L');
        $this -> SetY(25);
        $this -> SetX(147);
        $this -> Cell(50,10, utf8_decode('Sitio 4, Constitución'), 0,0,'L');
        $this -> SetY(30);
        $this -> SetX(147);
        $this -> Cell(50,10, '+56 71 22230012', 0,0,'L');

        $this -> Ln(25);

    }
    function body_cliente(){
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetFillColor(95,95,95);
        $this -> Ln(2);

        $this -> SetX(55);
        $this -> Cell(30,5,utf8_decode('Cliente'),0,0,'L');
        $this -> SetX(145);
        $this -> Cell(30,5,utf8_decode('Vehiculo'),0,0,'L');

       $this -> SetFont('Arial', '', 11);

        $this -> SetX(15);
        $this -> Cell(30,5,utf8_decode('Nombre:'), 0,0,'L');
        $this -> SetX(35);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(15);
        $this -> Cell(30,5,utf8_decode('Rut:'), 0,0,'L');
        $this -> SetX(35);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(15);
        $this -> Cell(30,5,utf8_decode('Dirección:'), 0,0,'L');
        $this -> SetX(35);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(15);
        $this -> Cell(30,5,utf8_decode('Telefono:'), 0,0,'L');
        $this -> SetX(35);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(15);
        $this -> Cell(30,5,utf8_decode('E-mail:'), 0,0,'L');
        $this -> SetX(35);
        $this -> Cell(55,5,1,0,'C');

        $this -> SetX(105);
        $this -> Cell(30,5,utf8_decode('Patente:'), 0,0,'L');
        $this -> SetX(129);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(105);
        $this -> Cell(30,5,utf8_decode('Marca:'), 0,0,'L');
        $this -> SetX(129);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(105);
        $this -> Cell(30,5,utf8_decode('Modelo:'), 0,0,'L');
        $this -> SetX(129);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(105);
        $this -> Cell(30,5,utf8_decode('Kilometraje:'), 0,0,'L');
        $this -> SetX(129);
        $this -> Cell(55,5,1,0,'C');
        $this -> SetX(105);
        $this -> Cell(30,5,utf8_decode('N° chasis:'), 0,0,'L');
        $this -> SetX(129);
        $this -> Cell(55,5,1,0,'C');
        $this -> Ln(10);

    }

    function body_solicitante(){
        $this -> SetFont('Arial', '', 11);
        $this -> SetFillColor(95,95,95);
        $this -> Ln(10);


        $this -> SetX(10);
        $this -> Cell(20,5,utf8_decode('Solicitante'), 1,0,'L');
        $this -> SetX(30);
        $this -> Cell(55,5,1,0,'L');
        $this -> SetX(85);
        $this -> Cell(10,5,utf8_decode('Rut'),1,0,'L');
        $this -> SetX(95);
        $this -> Cell(35,5,1,0,'L');
        $this -> SetX(130);
        $this -> Cell(25,5,utf8_decode('Telefono'),1,0,'L');
        $this -> SetX(155);
        $this -> Cell(40,5,1,0,'L');

        $this -> Ln(10);

    }

    function body_solicitados(){
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetX(95);
        $this -> Cell(10,5,utf8_decode('Trabajos solicitados'), 0,0,'C');
        $this->Ln(2);


        $this -> SetFont('Arial', '', 11);

        $this -> SetX(10);
        $this -> Cell(20,6,utf8_decode('N°'), 1,0,'L');
        $this -> SetX(30);
        $this -> Cell(165,6,utf8_decode('Descripcion                     '),1,0,'C');


        $this -> Ln(20);

    }

    function body_realizados(){
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetFillColor(95,95,95);

        $this -> SetX(95);
        $this -> Cell(10,5,utf8_decode(' Trabajos realizados'), 0,0,'C');
        $this->Ln(2);


        $this -> SetFont('Arial', '', 11);

        $this -> SetX(10);
        $this -> Cell(20,6,utf8_decode('N°'), 1,0,'L');

        $this -> SetX(30);
        $this -> Cell(120,6,utf8_decode('                     Descripcion'),1,0,'C');

        $this -> SetX(150);
        $this -> Cell(15,6,utf8_decode('H.H.'), 1,0,'L');

        $this -> SetX(165);
        $this -> Cell(30,6,utf8_decode('Subtotal'),1,0,'C');
        $contador=0;
        $contador_horas=0;
/*
        while($row6=mysqli_fetch_row()) {

            $this->SetX(10);
            $this->Cell(20, 6,1, 0, 'L');

            $this->SetX(30);
            $this->Cell(120, 6, utf8_decode(), 1, 0, 'L');


            $this->SetX(150);
            $this->Cell(15, 6, utf8_decode(), 1, 0, 'L');

            $this -> SetX(165);
            $this -> Cell(30,6,1,0,'L');


        }*/

        /* falta agregar los valores totales*/
        $this -> SetFont('Arial', '', 11);
        $this -> SetFillColor(210,210,210);

        $this -> SetX(120);
        $this -> Cell(30,6,utf8_decode('                     Total'),1,0,'C');

        $this -> SetX(150);
        $this -> Cell(15,6, 1,0,'L',true);

        $this -> SetX(165);
        $this -> Cell(30,6,1,0,'C',true);


        $this -> Ln(25);
        $this-> Ln();

    }


    function body_repuestos(){
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetFillColor(95,95,95);

        $this -> SetX(95);
        $this -> Cell(10,5,utf8_decode('Repuestos utilizados'), 0,0,'C');
        $this->Ln(2);


        $this -> SetFont('Arial', '', 11);

        $this -> SetX(10);
        $this -> Cell(20,6,utf8_decode('Cant'), 1,0,'L');
        $this -> SetX(30);
        $this -> Cell(135,6,utf8_decode('      Descripcion'),1,0,'C');
        $this -> SetX(165);
        $this -> Cell(30,6,utf8_decode('Subtotal'),1,0,'C');

        $count=0;


        $this -> SetFillColor(210,210,210);

        $this -> SetX(135);
        $this -> Cell(30,6,utf8_decode('Total'),1,0,'C');

        $this -> SetX(165);
        $this -> Cell(30,6,utf8_decode($count),1,0,'C',true);

        $this -> Ln(25);

    }
    function body_terreno(){
        $this -> SetFont('Arial', 'B', 11);
        $this -> SetFillColor(95,95,95);

        $this -> SetX(95);
        $this -> Cell(10,5,utf8_decode('Atención terreno'), 0,0,'C');
        $this->Ln(2);

        $this -> SetFont('Arial', '', 11);

        $this -> SetX(10);
        $this -> Cell(155,6,utf8_decode('                       Direccion'),1,0,'C');

        $this -> SetX(165);
        $this -> Cell(30,6,utf8_decode('Total'),1,0,'C');


        $this -> Ln(25);

    }
    function totales(){
        $this -> SetFont('Arial', '', 11);
        $this -> SetFillColor(95,95,95);
        $this->Ln(2);


        $this -> SetX(135);
        $this -> Cell(30,6,utf8_decode('Total Neto'),1,0,'L');
        $this -> SetX(165);
        $this -> Cell(30,6,1,0,'R');
        $this -> SetX(135);
        $this -> Cell(30,6,utf8_decode('Total Iva'),1,0,'L');
        $this -> SetX(165);
        $this -> Cell(30,6,1,0,'R');
        $this -> SetX(135);
        $this -> Cell(30,6,utf8_decode('Total'),1,0,'L');
        $this -> SetX(165);
        $this -> Cell(30,6,1,0,'R');

        $this -> SetX(70);
        $this -> Cell(30,9,utf8_decode('Forma de pago'),1,0,'L');
        $this -> SetX(100);
        $this -> Cell(30,9,1,0,'R');
        $this -> SetX(70);
        $this -> Cell(30,9,utf8_decode('Fecha de pago'),1,0,'L');
        $this -> SetX(100);
        $this -> Cell(30,9,1,0,'R');

        $this -> SetX(10);
        $this -> Cell(40,9,utf8_decode('Fecha reparación'),1,0,'C');
        $this -> SetX(10);
        $this -> Cell(40,9,1,0,'C');

        $this -> Ln(20);

    }

    function Footer () {
        $this -> SetFont('Arial','', 10);
        $this -> SetY(-15);
        $this -> Cell(0,10, utf8_decode('Página') . $this -> PageNo(),0,0,'R');
        $this -> SetY(-15);
        $this -> Cell(0,10, utf8_decode('Visitanos en www.Onetruck.cl'), 0,0, 'C');

    }


}

$pdf = new PDF;
$pdf -> AddPage();
/*
$resultado1=mysqli_query($dbc,$q1);
$row1=mysqli_fetch_row($resultado1);
$pdf->header($row1);

$resultado2=mysqli_query($dbc,$q2);
$row2=mysqli_fetch_row($resultado2);

$resultado3=mysqli_query($dbc,$q3);
$row3=mysqli_fetch_row($resultado3);

$pdf->body_cliente($row2,$row3);

$resultado4=mysqli_query($dbc,$q4);
$row4=mysqli_fetch_row($resultado4);
$pdf->body_solicitante($row4);

$resultado5=mysqli_query($dbc,$q5);
$pdf->body_solicitados($resultado5);

$resultado6=mysqli_query($dbc,$q6);
$pdf->body_realizados($resultado6);

$resultado7=mysqli_query($dbc,$q7);
$pdf->body_repuestos($resultado7);

$resultado8=mysqli_query($dbc,$q8);
$pdf->body_terreno($resultado8);

$resultado9=mysqli_query($dbc,$q1);
$row9=mysqli_fetch_row($resultado9);
$pdf->totales($row9);*/

$pdf -> Output();