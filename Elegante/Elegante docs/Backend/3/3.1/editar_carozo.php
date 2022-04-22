<?php

include '../../connect/connect.php';

$id=$_GET['id'];
$yh=$_GET['yh'];
$if= $_GET['if'];
$pf=$_GET['pf'];
$cp=$_GET['cp'];
$cch=$_GET['cch'];
$cf=$_GET['cf'];
$pc=$_GET['pc'];
$ic=$_GET['ic'];
$fc=$_GET['fco'];
$fif=$_GET['50'];
$bb=$_GET['100'];


$text="UPDATE `feno_carozos` SET `yema_hinchada`='$yh',`inicio_flor`='$if',`plena_flor`='$pf',`caida_petalos`='$cp',`caida_chaquetas`='$cch',`crec_fruto`='$cf',`precosecha`='$pc',`inicio_cosecha`='$ic',`termino_cosecha`='$fc',`50_caida`='$fif',`100_caida`='$bb' WHERE `id_plantacion`=$id";

$querr=mysqli_query($dbc,$text);

if($querr=true){
    mysqli_close($dbc);
    header("Location: feno_carozos.php");

}else{
    mysqli_close($dbc);
    header("Location: feno_carozos.php");
}
