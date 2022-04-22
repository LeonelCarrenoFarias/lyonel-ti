<?php
include "Connect.php";

 $nombre=utf8_decode($_GET['nom']);
 $seleccion=$_GET['select'];
$ciudad=utf8_decode($_GET['city']);
$direccion=utf8_decode($_GET['adress']);
$descripcion=utf8_decode($_GET['desc']);
$f_i=$_GET['date1'];
$f_t=$_GET['date2'];


    $c1="SELECT MAX(`Id_Obra`) FROM `obra`";
    $q1=mysqli_query($dbc,$c1);


    $codigo=0;
    $estado=true;
    while($row1=mysqli_fetch_row($q1)){
        $codigo=$row1[0];
    }
    $incremento=1;
    $codigo=$codigo+$incremento;


        $consulta="INSERT INTO `obra`(`Id_Obra`, `Nombre`, `Ciudad`,`Direccion`, `Descripcion`, `Tipo`, `Fecha_Inicio`, `Fecha_Termino`, `Estado`) VALUES ($codigo,'$nombre','$ciudad','$direccion','$descripcion',$seleccion,'$f_i','$f_t',$estado)";
        $querry1=mysqli_query($dbc,$consulta);


    if ($querry1 == 1) {
        echo '<script language="javascript">alert("Obra creada exitosamente.");</script>';
        mysqli_close($dbc);
        header ("Location: Orden.php");

    }else{
        die('Error SQL $q3: ' . mysqli_error($dbc));

    }


