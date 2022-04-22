<?php

include '../../connect/connect.php';

$id=$_GET['ide'];
$yh=$_GET['yh'];
$pv=$_GET['pv'];
$re=$_GET['re'];
$br=$_GET['br'];
$if=$_GET['if'];
$pf=$_GET['pf'];
$fc=$_GET['fc'];
$icp=$_GET['icp'];
$fcp=$_GET['fcp'];
$ini_c=$_GET['ic'];
$fin_c=$_GET['fco'];
$a=$_GET['50a'];
$fif=$_GET['50'];
$bb=$_GET['100'];


$text="UPDATE `feno_pomaceas` SET `yema_hinchada`='$yh',`puntas_verdes`='$pv',`ramillete_expuesto`='$re',`boton_rosado`='$br',`inicio_flor`='$if',`plena_flor`='$pf',`fruto_cuajado`='$fc',`caida_petalos_ini`='$icp',`caida_petalos_fin`='$fcp',`inicio_cosecha`='$ini_c',`termino_cosecha`='$fin_c',`50_amarilla`='$a',`50_caida`='$fif',`100_caida`='$bb' WHERE `id_plantacion`=$id";

$querr=mysqli_query($dbc,$text);

if($querr=true){
    mysqli_close($dbc);
    header("Location: feno_pomaceas.php");

}else{

}