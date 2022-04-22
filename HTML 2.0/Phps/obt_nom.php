<?php
include 'Connect.php';

$nom=$_GET['nom'];
header('Content-Type: application/json');

$c="SELECT `Id_Proveedor`,`Direccion`,`Ciudad` FROM `proveedor` WHERE `Nombre`='$nom'";
$q=mysqli_query($dbc,$c);


$val=0;
$city="";
$dir="";
while($r=mysqli_fetch_row($q)){
    $val=$r[0];
    $dir=$r[1];
    $city=$r[2];

    $c2="SELECT MAX(`Fono`) FROM `det_proveedor` WHERE `Id_Proveedor`=$val";
    $q2=mysqli_query($dbc,$c2);
    $fono=0;
    while($rr=mysqli_fetch_row($q2)){
        $fono=$rr[0];
    }

    if($val>0){
            $datos = array(
                'rut'=> strval($val),
                'city'=> strval($city),
                'direccion'=> strval($dir),
                'fono'=>strval($fono)
            );
        echo json_encode($datos, JSON_FORCE_OBJECT);
    }else{
        $datos = array(
            'rut'=> '0'
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);

    }
}
