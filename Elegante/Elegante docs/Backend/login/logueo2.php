<?php
session_start();
include'../connect/connect.php';
ini_set("default_charset", "UTF-8");

$cuaderno_num=$_GET['select1'];

$text1="SELECT * FROM `cuaderno` WHERE `id_cuaderno`=$cuaderno_num";
$querry1=mysqli_query($dbc,$text1);
$num=mysqli_num_rows($querry1);

if($num>0){
    $_SESSION["cuaderno"] = $num;

    mysqli_close($dbc);
    header("Location: ../1/1.1/inicio.php");
}else{
    mysqli_close($dbc);
    header("Location: index.php");
}