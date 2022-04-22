<?php
require 'Connect.php';


$id=$_GET['id'];
$cantidad=$_GET['cantidad'];

header('Content-Type: application/json');

$cc="SELECT `Stock` FROM `herramienta` WHERE `Id_Herramienta`=$id";
$qq=mysqli_query($dbc,$cc);
$stock_actual=0;
while($r=mysqli_fetch_row($qq)){
    $stock_actual=$r[0];
}
$stock_posterior=intval($stock_actual)-intval($cantidad);


if($stock_posterior==0){
    $c1="UPDATE `herramienta` SET `Estado`=FALSE WHERE `Id_Herramienta`=$id";
    $q1=mysqli_query($dbc,$c1);

    $c="UPDATE `herramienta` SET `Stock`=$stock_posterior WHERE `Id_Herramienta`=$id";
    $q=mysqli_query($dbc,$c);

}else{
    $c2="UPDATE `herramienta` SET `Stock`=$stock_posterior WHERE `Id_Herramienta`=$id";
    $q2=mysqli_query($dbc,$c2);
}




if($q1== true) {
    $datos = array(
        'estado' => 'ok',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}