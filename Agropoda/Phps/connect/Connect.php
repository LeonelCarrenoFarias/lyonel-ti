<?php

 $DBhost="localhost";
 $DBuser="root";
$DBpin="";
 $DBname="podadora";

 $dbc=mysqli_connect($DBhost,$DBuser,$DBpin,$DBname);

if($dbc){
    if (!mysqli_set_charset($dbc, "utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($dbc));
        exit();
    } else {
        mysqli_character_set_name($dbc);
    }
}else{
    echo"Error al cargar la base de datos";
}