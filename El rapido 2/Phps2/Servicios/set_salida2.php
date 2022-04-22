<?php
include '../connect/Connect.php';

header('Content-Type: application/json');
$id=$_GET['id'];
$monto=intval($_GET['monto']);
$detalle=$_GET['detalle'];
$fecha=date('Y-m-d');

$x3="SELECT MAX(`Id_Salida_Servicio`) FROM `det_sal_servicio`";
$ux3=mysqli_query($dbc,$x3);
$id6=0;
if ($ux3 == false) {
    die('Error SQL $ux3: ' . mysqli_error($dbc));
}else {
    if(mysqli_num_rows($ux3)>0){
        while($r=mysqli_fetch_row($ux3)){
            $id6=$r[0];
        }
    }
    $id6+=1;
}


$text="INSERT INTO `det_sal_servicio`(`Id_Salida_Servicio`, `Id_Servicio`, `Id_Centro`, `Detalle`, `Monto`, `Fecha`, `Estado`) VALUES ($id6,$id,1002,'$detalle',$monto,'$fecha',1)";

$text2="UPDATE `det_servicio` SET `Fecha_Termino`='$fecha',`Estado`=0 WHERE `Id_Servicio`=$id";

$text3="SELECT `Caja` FROM `centrocosto` WHERE `Id_Centro`=1002";
$querry3=mysqli_query($dbc,$text3);
$caja=0;
while($row=mysqli_fetch_row($querry3)){
    $caja=intval($row[0]);
}

$montofinal=intval($caja+$monto);

$text4="UPDATE `centrocosto` SET `Caja`=$montofinal WHERE `Id_Centro`=1002";


$querry1=mysqli_query($dbc,$text);
$querry2=mysqli_query($dbc,$text2);
$querry4=mysqli_query($dbc,$text4);

if($querry1 && $querry2 && $querry4){
        $datos = array(
            'ds'=> 1
        );
    mysqli_close($dbc);
        echo json_encode($datos, JSON_FORCE_OBJECT);

}else{
    $datos = array(
        'ds'=> 0
    );
    mysqli_close($dbc);
    echo json_encode($datos, JSON_FORCE_OBJECT);
}

