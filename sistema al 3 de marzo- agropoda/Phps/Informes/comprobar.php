<?php
include '../connect/Connect.php';
header('Content-Type: application/json');
$valor=$_GET["valor"];
if($valor>0) {

    $x3 = "SELECT `Id_Centro`, `Nombre`, `Caja`, `Estado` FROM `centrocosto` WHERE `Id_Centro`=$valor";
    $ux3 = mysqli_query($dbc, $x3);
    $val = 0;
    if ($ux3 == false) {
        die('Error SQL $ux3: ' . mysqli_error($dbc));
    } else {

        $val = mysqli_num_rows($ux3);
        if ($val >= 1) {
            $datos = array(
                'st' => 1
            );
            echo json_encode($datos, JSON_FORCE_OBJECT);

        } else {
            $datos = array(
                'st' => 0
            );
            echo json_encode($datos, JSON_FORCE_OBJECT);


        }

    }
}else{
    $datos = array(
        'st' => 1
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}
mysqli_close($dbc);
