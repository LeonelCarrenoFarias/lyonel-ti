<?php
require 'Connect.php';

$id=$_GET['id'];
$guia=$_GET['g'];
$ciudad=utf8_decode($_GET['c']);
$fecha=$_GET['f'];
$lote=$_GET['l'];
$venc=$_GET['v'];
$dest=$_GET['d'];

header('Content-Type: application/json');



$c1="INSERT INTO `guia_despacho`(`Id_Guia`, `Ciudad`, `Fecha_Despacho`, `Destino`) VALUES ($guia,$ciudad,$fecha,$dest)";
$q1=mysqli_query($dbc,$c1);

$c2="UPDATE `det_despacho` SET `Id_Guia`=$guia,`Estado`=TRUE WHERE `det_despacho`.`Id_Adqui`=$id";
$q2=mysqli_query($dbc,$c2);

$cc="UPDATE `det_herramienta` SET `Estado`=true WHERE `det_herramienta`.`Id_Adqui`=$id";
$qq=mysqli_query($dbc,$cc);

$ccc="SELECT `Id_Herramienta` FROM `det_herramienta` INNER JOIN `herramienta` WHERE `det_herramienta`.`Id_Herramienta`=`herramienta`.`Id_Herramienta` AND `det_herramienta`.`Id_Adqui`=$id ";
$qqq=mysqli_query($dbc,$ccc);

while($rrr=mysqli_fetch_row($qqq)){
    $c3="UPDATE `herramienta` SET `Estado_Entrega`=true WHERE `Id_Herramienta`=$rrr[0]  ";
    $q3=mysqli_query($dbc,$q3);
}

    $datos = array(
        'estado' => 'ok',
        'ident' => 1
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
