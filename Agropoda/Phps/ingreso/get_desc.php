<?php
include '../connect/Connect.php';

header('Content-Type: application/json');
$id=$_GET['code'];

$c="SELECT `detalle` FROM `inventario` WHERE `code`=$id";
$q=mysqli_query($dbc,$c);
if(mysqli_num_rows($q)>0){
    while($r=mysqli_fetch_row($q)){
        $datos = array(
            'ds'=> strval($r[0])
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);
    }
}else{
    $datos = array(
        'ds'=> ''
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}

mysqli_close($dbc);