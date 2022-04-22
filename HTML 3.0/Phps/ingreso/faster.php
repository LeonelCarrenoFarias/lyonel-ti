<?php

include '../connect/Connect.php';

    $v1=$_GET['fecha2'];
    $v2=$_GET['code2'];
    $v3=$_GET['docu'];
    $v4=$_GET['cant2'];
    $v5=$_GET['desc2'];


    $tx1="SELECT `code` FROM `inventario` WHERE `code`=$v2 ";
    $qx1=mysqli_query($dbc,$tx1);
    $des=0;
    if(mysqli_num_rows($qx1)>0){
        $des=1;
    }else{
        $des=0;
    }


    if($des==1){
        $tx1="SELECT `cantidad`,`valor` FROM `inventario` WHERE `code`=$v2 AND `detalle`='$v5'";
        $qx1=mysqli_query($dbc,$tx1);
        $cc=0;
        $vv=0;
        while($rw=mysqli_fetch_row($qx1)){
            $cc=$rw[0];
            $vv=$rw[1];
        }
        $cant_final=intval($cc)+intval($v4);

        $tx2="UPDATE `inventario` SET `cantidad`=$cant_final WHERE `code`=$v2 AND `detalle`='$v5'";

        $x3="SELECT MAX(`Id_Detalle_Material`) FROM `det_material`";
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
        $monto_final=intval($vv)*intval($v4);


        $tx6="INSERT INTO `det_material`(`Code`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`,  `documento_asoc`, `Estado`) VALUES ($v2,$id6,$v4,'$v5',NULL ,NULL,$monto_final,NULL,'$v1', $v3,1)";

        $qx2=mysqli_query($dbc,$tx2);
        $qx6=mysqli_query($dbc,$tx6);
        if ($qx2 == false || $qx6 == false) {
            die('Error SQL al actualizar stock: ' . mysqli_error($dbc));
        } else {
            mysqli_close($dbc);
            header('Location: Entradas.php');
        }

        mysqli_close($dbc);
    }