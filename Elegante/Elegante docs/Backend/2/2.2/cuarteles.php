<?php

include '../../connect/connect.php';
header('Content-Type: application/json');

$id= $_GET['id'];
$text="SELECT `id_cuartel` FROM `cuartel` WHERE `id_cuartel`=$id";
$combociudad = mysqli_query($dbc,$text);
$cnums=mysqli_num_rows($combociudad);
if($cnums >0){
    $datos = array(
        'estado' => 'yes');
}else{
    $datos = array(
        'estado' => 'no');
}
echo json_encode($datos, JSON_FORCE_OBJECT);
