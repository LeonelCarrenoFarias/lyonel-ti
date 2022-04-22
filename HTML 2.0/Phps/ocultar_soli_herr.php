<?php
require 'Connect.php';


$id=$_GET["id"];
$sol=$_GET["soli"];

header('Content-Type: application/json');

$c1="SELECT `Id_Sol_Herr` FROM `solicitud` WHERE `Id_Solicitud`=$id";
$q1=mysqli_query($dbc,$c1);
while($r=mysqli_fetch_row($q1)){

    $c2="UPDATE `solicitud` SET `Estado`=FALSE WHERE `Id_Solicitud`=$id";
    $q2=mysqli_query($dbc,$c2);

    $c3="UPDATE `det_soli_herr` SET `Estado`=FALSE WHERE `Id_Det_Soli_Herr`=$r[0]";
    $q3=mysqli_query($dbc,$c3);



    if($q3== true) {
        $datos = array(
            'estado' => 'ok',
            'ident' => $id
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);
    }
}