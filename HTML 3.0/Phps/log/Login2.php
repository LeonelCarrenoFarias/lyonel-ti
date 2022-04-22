<?php
session_start();
include '../connect/Connect.php';
ini_set("default_charset", "UTF-8");

$rut=$_GET['rut'];
$correo=$_GET['email'];
$clave=$_GET['pass'];

$rut = mysqli_real_escape_string($dbc, $rut);
$correo = mysqli_real_escape_string($dbc, $correo);
$clave = mysqli_real_escape_string($dbc, $clave);

$c1="SELECT `Id_Persona`,`Nombre`,`Correo`, `Tipo_Usuario` FROM `persona` WHERE `Id_Persona`=$rut";
$q1=mysqli_query($dbc,$c1);



if ($q1 === false) {
    die('Error SQL c1: ' . mysqli_error($dbc));
}else {
    $rut2 = 0;
    $correo2 = "";
    $nombre = "";
    $datos = null;

    while ($r = mysqli_fetch_row($q1)) {
        $rut2 = $r[0];
        $nombre = $r[1];
        $correo2 = $r[2];
        $tipo2 = $r[3];
        $_SESSION["nombre"] = $nombre;

    }


    $c2 = "SELECT `Clave` FROM `sesion` WHERE `Id_Persona`=$rut";
    $pin = "";
    $q2 = mysqli_query($dbc, $c2);
    if ($q2 === false) {
        session_destroy();
        die('Error SQL c1: ' . mysqli_error($dbc));

    } else {
        while ($rr = mysqli_fetch_row($q2)) {
            $pin = $rr[0];
        }

        if ($rut == $rut2 && $clave == $pin && $correo == $correo2) {

            setcookie('Id', $rut, time() + (3600 * 3600));
            setcookie('Correo', $correo, time() + (3600 * 3600));
            setcookie('Nombre', $nombre, time() + (3600 * 3600));

            $_SESSION["id"] = $rut;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["correo"] = $correo;

            mysqli_close($dbc);
            header("Location: ../inventario/Stock.php");

        } else {
            echo '<script language="javascript">alert("Error al iniciar sesión, los datos no existen.");</script>';
            mysqli_close($dbc);
            header('location: ../../index.php');

        }
        mysqli_close($dbc);
    }

}