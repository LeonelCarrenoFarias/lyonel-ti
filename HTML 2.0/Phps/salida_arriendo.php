<?php
require 'Connect.php';


$id=$_GET['id'];

header('Content-Type: application/json');

$c1="UPDATE `arriendo` SET `Estado`=FALSE WHERE `Id_Arriendo`=$id";
$q1=mysqli_query($dbc,$c1);


if($q1== true) {
    $datos = array(
        'estado' => 'ok',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}