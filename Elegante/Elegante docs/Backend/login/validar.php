<?php
header('Content-Type: application/json');

include '../connect/connect.php';

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$mail=$_GET['mail'];
$c1="SELECT `rut_razon`, `correo` FROM `fundo` WHERE `correo`='$mail'";
$q1=mysqli_query($dbc,$c1);
$boo=0;
$des=0;
while($r=mysqli_fetch_row($q1)) {
    $des = $r[1];

    if ($des==$mail) {
        $boo = 1;

    }
}


if($boo==1){
    $datos = array(
        'estado' => 'ok');
}else{
    $datos = array(
        'estado' => 'no');
}
echo json_encode($datos, JSON_FORCE_OBJECT);