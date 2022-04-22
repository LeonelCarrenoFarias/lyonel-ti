<?php
include '../connect/Connect.php';


$v1=strval(strtoupper($_GET['code']));
$v2=strval(strtoupper($_GET['nom']));

header('Content-Type: application/json');

    $caja=0;
    $estado=1;

    $t1 = "INSERT INTO `centrocosto`(`Id_Centro`, `Nombre`, `Caja`, `Estado`) VALUES ('$v1','$v2',$caja,$estado)";
    $q1 = mysqli_query($dbc, $t1);

    if ($q1 === true) {
        $datos = array(
            'estado' => 'ok'
        );
        mysqli_close($dbc);
        echo json_encode($datos, JSON_FORCE_OBJECT);
    } else {
        $datos = array(
            'estado' => 'no'
        );
        mysqli_close($dbc);
        echo json_encode($datos, JSON_FORCE_OBJECT);
    }

