<?php

include '../../connect/connect.php';

$id=$_GET['ide'];
$pv=$_GET['pv'];
$br=$_GET['bbb'];
$if=$_GET['if'];
$pf=$_GET['pf'];
$fc=$_GET['fc'];
$ini_c=$_GET['ic'];
$fin_c=$_GET['fco'];
$fif=$_GET['50'];
$bb=$_GET['100'];


$text="UPDATE `feno_kiwi` SET `puntas_verdes`='$pv',`brote_10cm`='$br',`inicio_flor`='$if',`plena_flor`='$pf',`cuaja`='$fc',`inicio_cosecha`='$ini_c',`termino_cosecha`='$fin_c',`50_caida`='$fif',`100_caida`='$bb' WHERE `id_plantacion`=$id";

$querr=mysqli_query($dbc,$text);

if($querr=true){
    mysqli_close($dbc);
    header("Location: feno_drupas.php");

}else{

}