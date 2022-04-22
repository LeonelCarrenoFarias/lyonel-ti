<?php
include '../connect/Connect.php';

$valor1=$_GET['v1'];
header('Content-Type: application/json');

$text="SELECT `Id_Centro` FROM `centrocosto` WHERE `Nombre`='$valor1'";
$querry=mysqli_query($dbc,$text);

$v2=mysqli_num_rows($querry);
if($v2>0){
    $datos = array(
        'estado' => 'ok'
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}else{
    $datos = array(
        'estado' => 'no'
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}