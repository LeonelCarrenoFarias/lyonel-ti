<?php
include '../connect/Connect.php';

header('Content-Type: application/json');
$desc=strtoupper($_GET['desc']);

$c="SELECT `code`,`id_fabrica`,`marca`,`valor`,`ubicacion` FROM `inventario` WHERE `detalle`='$desc'";
$q=mysqli_query($dbc,$c);


if(mysqli_num_rows($q)>0) {


    while ($r = mysqli_fetch_row($q)) {

        $txt = "SELECT `id_bodega` FROM `seccion_bod` WHERE `id`='$r[4]'";
        $qxq = mysqli_query($dbc, $txt);
        $id_b = 0;
        if (mysqli_num_rows($qxq) > 0) {
            while ($rr = mysqli_fetch_row($qxq)) {
                $id_b = $rr[0];
            }
        } else {
            $id_b = "";
        }


        $tx = "SELECT `Medida`, `Stock_Optimo`, `Categoria` FROM `det_material` WHERE `Code`=$r[0]";
        $qx = mysqli_query($dbc, $tx);
        $v1 = "";
        $v2 = 0;
        $v3 = "";
        if (mysqli_num_rows($qx) > 0) {
            while ($rr = mysqli_fetch_row($qx)) {
                $v1 = $rr[0];
                $v2 = $rr[1];
                $v3 = $rr[2];
            }
        } else {
            $v1 = "";
            $v2 = "";
            $v3 = "";
        }


        $datos = array(
            'estado' => 'yes',
            'nm' => strval($r[0]),
            'cf' => strval($r[1]),
            'mc' => strval($r[2]),
            'vl' => strval($r[3]),
            'ub1' => strval($id_b),
            'ub2' => strval($r[4]),
            'md' => strval($v1),
            'sop' => strval($v2),
            'ct' => strval($v3),
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);

    }
}else{

    $x3="SELECT MAX(`code`) FROM `inventario`";
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
    $datos = array(
        'estado' => 'no',
        'cod' => strval($id6)
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}
mysqli_close($dbc);