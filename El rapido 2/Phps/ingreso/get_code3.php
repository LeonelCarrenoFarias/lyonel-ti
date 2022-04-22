<?php
include '../connect/Connect.php';
header('Content-Type: application/json');
$desc=$_GET['desc'];

$x3="SELECT MAX(`Id_Servicio`) FROM `servicio`";
$ux3=mysqli_query($dbc,$x3);
$id6=15000;
if ($ux3 == false) {
    die('Error SQL $ux3: ' . mysqli_error($dbc));
}else {
    if(mysqli_num_rows($ux3)>0){
        while($r=mysqli_fetch_row($ux3)){
            $id6=$r[0];
        }
        $id6+=1;
    }
}
$datos = array(
    'cod3' => strval($id6)
);
echo json_encode($datos, JSON_FORCE_OBJECT);
mysqli_close($dbc);