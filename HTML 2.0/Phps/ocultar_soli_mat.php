<?php
require "Connect.php";

$id=$_GET['id'];
$sol=$_GET['soli'];

header('Content-Type: application/json');

$c1="SELECT `Id_Sol_Mat` FROM `solicitud` WHERE `Id_Solicitud`=$id";
$q1=mysqli_query($dbc,$c1);
$id2=0;
while($r=mysqli_fetch_row($q1)){
    $id2=$r[0];
}


$c2="UPDATE `solicitud` SET `Estado`=0 WHERE `Id_Solicitud`=$id";
$q2=mysqli_query($dbc,$c2);

$c3="UPDATE `det_soli_mat` SET `Estado`=0 WHERE `Id_Det_Soli_Mat`=$id2";
$q3=mysqli_query($dbc,$c3);


$datos = array(
        'estado' => 'ok',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
