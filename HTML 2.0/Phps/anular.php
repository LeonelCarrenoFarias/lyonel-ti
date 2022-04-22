<?php
require 'Connect.php';


$ide=$_GET['iden'];

header('Content-Type: application/json');

    $c1="UPDATE `adquisicion` SET `Estado`=0 WHERE `Id_Adquisicion`=$ide";

    $c2="SELECT `Id_Material` FROM `det_material` WHERE `det_material`.`Id_Adqui`=$ide";

    $c3="UPDATE `det_material` SET `Estado`=0 WHERE `Id_Adqui`=$ide";

    $q2=mysqli_query($dbc,$c2); //obtener id de materiales involucrados
    while ($r1=mysqli_fetch_row($q2)){

        $c4="UPDATE `material` SET `Estado`=0 WHERE `Id_Material`=$r1[0]";

        $q4=mysqli_query($dbc,$c4); //ocultar materiales

    }
    $q3=mysqli_query($dbc,$c3); //ocultar det material de la adquisicion

    $q1=mysqli_query($dbc,$c1); //ocultar adquisicon de materiales

if($q1 && $q3 === true) {
    $datos = array(
        'estado' => 'ok',
        'ident' => $ide
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}