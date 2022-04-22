<?php
include '../../connect/connect.php';

$v1=$_GET['num_moni'];
$v2=$_GET['responsable'];
$v3=$_GET['fecha'];
$v4=$_GET['estado'];


$t1="SELECT `id_plantacion`, `variedad` FROM `plantacion` WHERE `categoria`=2";
$q1=mysqli_query($dbc,$t1);
while($rr=mysqli_fetch_row($q1)){
    $id_plantacion=$rr[0];
    $variedad=$rr[1];


    $text1="SELECT `id_monitoreo` FROM `monitoreo` ORDER BY `id_monitoreo` ASC";
    $querry1=mysqli_query($dbc,$text1);
    $last_id=0;
    while($rw1=mysqli_fetch_row($querry1)){
        $last_id=$rw1[0];
    }
    $last_id+=1;

    $text2="INSERT INTO `monitoreo`(`id_monitoreo`, `id_plantacion`, `num_monitoreo`, `responsable`, `fecha`,`estado_fenologico`, `estado`) VALUES ($last_id,$id_plantacion,$v1,'$v2','$v3','$v4',1)";
    $querry2=mysqli_query($dbc,$text2);

    $text3="SELECT `id_moni_carozo` FROM `moni_carozo` ORDER BY `id_moni_carozo` ASC";
    $querry3=mysqli_query($dbc,$text3);
    $last_id3=0;
    while($rw3=mysqli_fetch_row($querry3)){
        $last_id3=$rw3[0];
    }
    $last_id3+=1;

    $text4="INSERT INTO `moni_carozo`(`id_moni_carozo`, `id_monitoreo`, `num_plantas`) VALUES ($last_id3,$last_id,20)";

    if($querry2){
        $querry4=mysqli_query($dbc,$text4);
        echo'<script type="text/javascript">alert("Monitoreo ingresado con éxito.");
                window.location.href="moni_carozos.php";
                </script>';
    }else{
        echo'<script type="text/javascript">alert("Error al guardar en BD.");
                window.location.href="moni_carozos.php";
                </script>';
    }

}
