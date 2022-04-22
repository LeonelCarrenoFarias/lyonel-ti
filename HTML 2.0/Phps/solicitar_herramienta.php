<?php
require 'Connect.php';
$nom=utf8_decode($_COOKIE['Nombre']);

$id=$_GET["id"];
$cantidad=$_GET["cantidad"];

header('Content-Type: application/json');

$ide=0;
$c="SELECT MAX(`Id_Det_Soli_Herr`) FROM `det_soli_herr`";
$q=mysqli_query($dbc,$c);
while($r=mysqli_fetch_row($q)){
    $ide=$r[0]+1;
}

$name="";
$cat="";

$c2="SELECT `Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado`, `Estado_Entrega` FROM `herramienta` WHERE `Id_Herramienta`=$id";
$q2=mysqli_query($dbc,$c2);
while($rr=mysqli_fetch_row($q2)){
    $name=$rr[1];
    $cat=$rr[2];
}

$c3="SELECT MAX(`Id_Solicitud`) FROM `solicitud`";
$q3=mysqli_query($dbc,$c3);

$de2=0;
$date=date("y-m-d");
while($rrr=mysqli_fetch_row($q3)){
    $de2=$rrr[0]+1;
}

$ccc="INSERT INTO `solicitud`(`Id_Solicitud`,`Id_Sol_Mat`,`Id_Sol_Herr`,`Solicitante`, `Fecha`, `Estado`) VALUES ($de2,NULL, $ide, '$nom','$date',TRUE )";
$qqq=mysqli_query($dbc,$ccc);




$c1="INSERT INTO `det_soli_herr`(`Id_Det_Soli_Herr`, `Id_Herramienta`, `Nombre`, `Categoria`, `Cantidad`, `Estado`) VALUES ($ide,$id,'$name','$cat',$cantidad,TRUE)";
$q1=mysqli_query($dbc,$c1);



if($q1== true) {
    $datos = array(
        'estado' => 'ok',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}