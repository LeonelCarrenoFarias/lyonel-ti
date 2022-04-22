<?php
session_start();
include'../connect/connect.php';
ini_set("default_charset", "UTF-8");

$rut=0;
$correo =$_GET['mail'];
$clave =$_GET['pass'];

$c1="SELECT `rut_razon`, `nombre_predio`, `razon social`, `propietario`, `csg`, `telefono`, `correo`, `encargado_huerto`, `napas`, `profundidad` FROM `fundo` WHERE `correo`='$correo'";
$q1=mysqli_query($dbc,$c1);


if ($q1 === false) {
    die('Error SQL, el correo en cuestion, no existe.: ' . mysqli_error($dbc));
}else {
    $correo2 = "";
    $nombre = "";
    $rol = 2;

    while ($r = mysqli_fetch_row($q1)) {
        $rut = $r[0];
        $nombre = $r[1];
        $correo2 = $r[6];
        $_SESSION["nombre"] = $nombre;

    }


    $c2 = "SELECT `clave1`, `clave2` FROM `sesion` WHERE `rut`=$rut";
    $pin1 = "";
    $pin2 = "";
    $q2 = mysqli_query($dbc, $c2);
    if ($q2 === false) {
        session_destroy();
        die('Error SQL no existen claves asociadas al rut: ' . mysqli_error($dbc));

    } else {
        while ($rr = mysqli_fetch_row($q2)) {
            $pin1 = $rr[0];
            $pin2 = $rr[1];
        }

        if ($clave == $pin1 or $clave == $pin2) {

            $_SESSION["rut"] = $rut;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["correo"] = $correo;

            mysqli_close($dbc);
            header("Location: index2.php");

        } else {
            echo "<script>alert('Los datos no existen.');</script>";
            mysqli_close($dbc);
            header('location: index.php');

        }
        mysqli_close($dbc);
    }

}