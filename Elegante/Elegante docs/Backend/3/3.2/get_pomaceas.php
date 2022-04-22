<?php
include '../../connect/connect.php';

header('Content-Type: application/json');
$id=$_GET['id'];

$c="SELECT `yema_hinchada`, `puntas_verdes`, `ramillete_expuesto`, `boton_rosado`, `inicio_flor`, `plena_flor`, `fruto_cuajado`, `caida_petalos_ini`, `caida_petalos_fin`, `inicio_cosecha`, `termino_cosecha`, `50_amarilla`, `50_caida`, `100_caida` FROM `feno_pomaceas` WHERE `id_plantacion`=$id";
$q=mysqli_query($dbc,$c);

while($r=mysqli_fetch_row($q)){
        $datos = array(
            'iden'=> strval($id),
            'yh'=> strval($r[0]),
            'pv'=> strval($r[1]),
            're'=> strval($r[2]),
            'br'=> strval($r[3]),
            'if'=> strval($r[4]),
            'pf'=> strval($r[5]),
            'fcuaj'=> strval($r[6]),
            'cpi'=>strval($r[7]),
            'cpf'=>strval($r[8]),
            'ic'=>strval($r[9]),
            'fc'=>strval($r[10]),
            'a'=>strval($r[11]),
            'fif'=>strval($r[12]),
            'bb'=>strval($r[13])
        );
    echo json_encode($datos, JSON_FORCE_OBJECT);

}
mysqli_close($dbc);
