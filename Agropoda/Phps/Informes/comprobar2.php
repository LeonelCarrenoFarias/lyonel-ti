<?php
include '../connect/Connect.php';

$valor=$_GET['valor'];

$x3="SELECT * FROM `bodega` WHERE `cod_bodega`=$valor";
$ux3=mysqli_query($dbc,$x3);
$val=0;
if ($ux3 == false) {
    die('Error SQL $ux3: ' . mysqli_error($dbc));
}else {

    while($row=mysqli_fetch_row($ux3)){
        $val=$row[0];
    }
    if($val>0){
        $datos = array(
            'des' => 'si'
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);

    }else{
        $datos = array(
            'des' => 'no'
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);

    }
}
mysqli_close($dbc);