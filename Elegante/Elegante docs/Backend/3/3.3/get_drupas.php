<?php
include '../../connect/connect.php';

header('Content-Type: application/json');
$id=$_GET['id'];

$c="SELECT `puntas_verdes`, `brote_10cm`, `inicio_flor`, `plena_flor`, `cuaja`, `inicio_cosecha`, `termino_cosecha`, `50_caida`, `100_caida` FROM `feno_kiwi` WHERE `id_plantacion`=$id";
$q=mysqli_query($dbc,$c);

while($r=mysqli_fetch_row($q)){
        $datos = array(
            'iden'=> strval($id),
            'pv'=> strval($r[0]),
            'br'=> strval($r[1]),
            'if'=> strval($r[2]),
            'pf'=> strval($r[3]),
            'fcuaj'=> strval($r[4]),
            'ic'=>strval($r[5]),
            'fc'=>strval($r[6]),
            'fif'=>strval($r[7]),
            'bb'=>strval($r[8])
        );
    echo json_encode($datos, JSON_FORCE_OBJECT);

}
mysqli_close($dbc);
