<?php
include '../connect/Connect.php';

header('Content-Type: application/json');
$desc=strtoupper($_GET['desc']);

$c="SELECT `Code`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`, `documento_asoc`, `Estado` FROM `det_material` WHERE `documento_asoc`=$desc";
$q=mysqli_query($dbc,$c);


if(mysqli_num_rows($q)>0) {

        $datos = array(
            'estado' => 'yes'
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);


}else{

    $datos = array(
        'estado' => 'no',
        'cod' => strval($id6)
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}
mysqli_close($dbc);