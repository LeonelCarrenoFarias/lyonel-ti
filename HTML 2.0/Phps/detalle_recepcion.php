<?php
require_once 'Connect.php';
header('Content-Type: application/json');

$id=$_GET['id'];

$c1="SELECT `Id_Detalle_Material`, `Detalle`,`Estado` FROM `det_material` WHERE `Id_Adqui`=$id";

function getArraySQL($dbc,$c1){
    //generamos la consulta

    mysqli_set_charset($dbc, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($dbc, $c1)) die(); //si la conexión falla , cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_row($result))
    {
        $rawdata[$i] =$row;
        $i++;
    }

    mysqli_close($dbc);
    return $rawdata; //devolvemos el array
}

$myArray = getArraySQL($dbc,$c1);
echo json_encode($myArray,JSON_FORCE_OBJECT);


