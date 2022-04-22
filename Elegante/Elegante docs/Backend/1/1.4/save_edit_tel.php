<?php
session_start();
$nom=utf8_decode($_SESSION["nombre"]);
$rut=$_SESSION["rut"];
$id_cuaderno=$_SESSION["cuaderno"];


$d1=$_GET['proveedor'];
$d2=$_GET['tel1'];
$d3=$_GET['prov1'];
$d4=$_GET['tel2'];
$d5=$_GET['prov2'];
$d6=$_GET['cercano'];
$d7=$_GET['hosp'];
$d8=$_GET['otro'];

$estado=true;

include_once '../../connect/connect.php';

$text="UPDATE `emergencia` SET `proveedor`='$d1',`vendedor1`='$d3',`telefono1`=$d2,`vendedor2`='$d5',`telefono2`=$d4,`ubi_telefono`='$d6',`hospitalario`=$d7,`otros`='$d8',`estado`=$estado WHERE `rut_razon`=$rut";

$querry=mysqli_query($dbc,$text);


if($querry==true){
    mysqli_close($dbc);
    echo "<script>
                alert('Se ha actualizado con éxito, la información.');
                window.location= 'telefonos.php'
                    </script>";
}else{
    mysqli_close($dbc);

    echo "<script>
                alert('no se ha podido actualizar');
                window.location= 'edit_tel.php'
                    </script>";
}

