<?php
session_start();
$nom=utf8_decode($_SESSION["nombre"]);
$rut=$_SESSION["rut"];
$cuaderno=$_SESSION["cuaderno"];

include_once '../connect/connect.php';

    $fecha = $_GET['fecha'];
    $nombre = $_GET['nombre'];
    $cargo = $_GET['cargo'];
    $responsabilidad = $_GET['responsable'];

        $id1=0;
        $folio=0;
        $text="SELECT * FROM `responsabilidad` WHERE `id_cuaderno`=$cuaderno";
        $querry=mysqli_query($dbc,$text);
        while ($row=mysqli_fetch_row($querry)){
            $id1=$row[0];
        }

        $folio=$id1+1;

        $text1="INSERT INTO `responsabilidad`(`id_definicion`, `id_cuaderno`, `fecha`, `nombre`, `cargo`, `descripcion_cargo`) VALUES ($folio,$cuaderno,'$fecha','$nombre','$cargo','$responsabilidad')";
        $querry1=mysqli_query($dbc,$text1);


        if($querry1==true) {
            mysqli_close($dbc);

            echo "<script>
                alert('Se ha insertado con éxito, un nuevo registro.');
                window.location= 'responsabilidades.php'
                    </script>";
        }else{
            mysqli_close($dbc);

            echo "<script>
                alert('Error al insertar a la BD');
                window.location= 'responsabilidades.php'
                    </script>";
        }


