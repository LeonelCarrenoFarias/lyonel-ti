<?php
require "../connect/Connect.php";

$id=$_GET['id'];

header('Content-Type: application/json');

$c1="SELECT `Id_Solicitud` FROM `solicitud` WHERE `Id_Solicitud`=$id";
$q1=mysqli_query($dbc,$c1);
$id2=0;
while($r=mysqli_fetch_row($q1)){
    $id2=$r[0];
}

if($id2>0) {

    $c2 = "UPDATE `solicitud` SET `Estado`=0 WHERE `Id_Solicitud`=$id2";
    $q2 = mysqli_query($dbc, $c2);

    $c3 = "UPDATE `det_soli_mat` SET `Estado`=0 WHERE `Id_Det_Solicitud`=$id2";
    $q3 = mysqli_query($dbc, $c3);

    if ($q3 && $q2) {

        $datos = array(
            'estado' => 'ok',
            'ident' => $id
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);
    } else {
        echo 'error';
    }
}else{
    echo 'No existe esta solicitud';
}