<?php

include '../connect/Connect.php';
header('Content-Type: application/json');

$var=$_GET['id'];
$var1=$_GET['new_neto'];

if($var1 <= '0'){
    $datos = array(
        'estado' => 'no'
    );
    mysqli_close($dbc);
    echo json_encode($datos, JSON_FORCE_OBJECT);
}else{
    $text1="UPDATE `inventario` SET `ubicacion`='$var1' WHERE `code`=$var";
    $querry=mysqli_query($dbc,$text1);
    if($querry){
        $datos = array(
            'estado' => 'si'
        );
        mysqli_close($dbc);
        echo json_encode($datos, JSON_FORCE_OBJECT);

    }else{
        $datos = array(
            'estado' => 'no'
        );
        mysqli_close($dbc);
        echo json_encode($datos, JSON_FORCE_OBJECT);
    }
}