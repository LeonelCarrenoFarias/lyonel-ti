<?php
include '../../connect/connect.php';

header('Content-Type: application/json');
$id=$_GET['id'];

$c="SELECT `yema_hinchada`, `inicio_flor`, `plena_flor`, `caida_petalos`, `caida_chaquetas`, `crec_fruto`, `precosecha`, `inicio_cosecha`, `termino_cosecha`, `50_caida`, `100_caida` FROM `feno_carozos` WHERE `id_plantacion`=$id";
$q=mysqli_query($dbc,$c);

while($r=mysqli_fetch_row($q)){
        $datos = array(
            'yh'=> strval($r[0]),
            'if'=> strval($r[1]),
            'pf'=> strval($r[2]),
            'cp'=>strval($r[3]),
            'cch'=>strval($r[4]),
            'cf'=>strval($r[5]),
            'pc'=>strval($r[6]),
            'ic'=>strval($r[7]),
            'fc'=>strval($r[8]),
            'fif'=>strval($r[9]),
            'bb'=>strval($r[10])
        );
    echo json_encode($datos, JSON_FORCE_OBJECT);

}
mysqli_close($dbc);
