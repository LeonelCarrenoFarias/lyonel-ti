<?php
require 'Connect.php';
$nom=utf8_decode($_COOKIE['Nombre']);

$id=$_GET["id"];
$cantidad=$_GET["cantidad"];

header('Content-Type: application/json');

$ide=0;
$c="SELECT MAX(`Id_Det_Soli_Mat`) FROM `det_soli_mat`";
$q=mysqli_query($dbc,$c);
while($r=mysqli_fetch_row($q)){
    $ide=$r[0]+1;
}

$name="";
$desc="";
$uni="";
$c2="SELECT `Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`, `N_Lote`, `Fecha_Venc`, `Estado_Entrega`, `Estado`, `Stock_Optimo` FROM `material` WHERE `Id_Material`=$id";
$q2=mysqli_query($dbc,$c2);
while($rr=mysqli_fetch_row($q2)){
    $name=$rr[1];
    $desc=$rr[2];
    $uni=$rr[3];
}

$c3="SELECT MAX(`Id_Solicitud`) FROM `solicitud` ";
$q3=mysqli_query($dbc,$c3);

$de2=0;
$date=date("y-m-d");
while($rrr=mysqli_fetch_row($q3)){
    $de2=$rrr[0]+1;
}



$ccc="INSERT INTO `solicitud`(`Id_Solicitud`,`Id_Sol_Mat`,`Id_Sol_Herr`,`Solicitante`, `Fecha`, `Estado`) VALUES ($de2,$ide,NULL,'$nom', '$date',TRUE )";
$qqq=mysqli_query($dbc,$ccc);



$c1="INSERT INTO `det_soli_mat`(`Id_Det_Soli_Mat`, `Id_Material`, `Nombre`, `Detalle`, `Unidad`, `Cantidad`, `Estado`) VALUES ($ide,$id,'$name','$desc','$uni',$cantidad,TRUE )";
$q1=mysqli_query($dbc,$c1);



if($q1== true) {
    $datos = array(
        'estado' => 'ok',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}