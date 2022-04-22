<?php
include '../connect/Connect.php';

session_start();
$rut=$_COOKIE['Id'];
$nom=utf8_decode($_COOKIE['Nombre']);

$req=$_GET['req'];
$date=$_GET['date'];
$id=$_GET['id'];
$nombre=$_GET['nombre'];
$cantidad=$_GET['cantidad'];



header('Content-Type: application/json');


$t1="SELECT `Id_Solicitud`, `Responsable`, `Fecha`, `Estado` FROM `solicitud` WHERE `Id_Solicitud`=$req";
$q1=mysqli_query($dbc,$t1);
$res=0;
while($rr=mysqli_fetch_row($q1)){
    if($rr[0]>0){
        $res=1;
    }else{
        $res=0;
    }
}

if($res===1){
    $x3="SELECT MAX(`Id_Det_Solicitud`) FROM `det_soli_mat`";
    $ux3=mysqli_query($dbc,$x3);
    $id3=15000;
    if ($ux3 == false) {
        die('Error SQL $ux3: ' . mysqli_error($dbc));
    }else {
        if(mysqli_num_rows($ux3)>0){
            while($r=mysqli_fetch_row($ux3)){
                $id3=$r[0];
            }
            $id3+=1;
        }
    }

    $t2="INSERT INTO `det_soli_mat`(`Id_Det_Solicitud`, `Id_Solicitud`, `Codigo`, `Detalle`, `Cantidad`, `Estado`) VALUES ($id3,$req,$id,'$nombre',$cantidad,1)";


    $q2=mysqli_query($dbc,$t2);

    $datos = array(
        'estado' => 'ok'
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
    mysqli_close($dbc);



}else{
    $tt="INSERT INTO `solicitud`(`Id_Solicitud`, `Responsable`, `Fecha`, `Estado`) VALUES ($req,'$nom','$date',1)";

    $x3="SELECT MAX(`Id_Det_Solicitud`) FROM `det_soli_mat`";
    $ux3=mysqli_query($dbc,$x3);
    $id3=15000;
    if ($ux3 == false) {
        die('Error SQL $ux3: ' . mysqli_error($dbc));
    }else {
        if(mysqli_num_rows($ux3)>0){
            while($r=mysqli_fetch_row($ux3)){
                $id3=$r[0];
            }
            $id3+=1;
        }
    }

    $t2="INSERT INTO `det_soli_mat`(`Id_Det_Solicitud`, `Id_Solicitud`, `Codigo`, `Detalle`, `Cantidad`, `Estado`) VALUES ($id3,$req,$id,'$nombre',$cantidad,1)";


    $qq=mysqli_query($dbc,$tt);
    $q2=mysqli_query($dbc,$t2);

    $datos = array(
        'estado' => 'ok'
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
    mysqli_close($dbc);

}

