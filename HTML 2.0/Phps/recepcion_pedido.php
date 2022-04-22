<?php
require 'Connect.php';


$id=$_GET['orden1'];
$factura=$_GET['fact1'];
$guia=$_GET['guia1'];
$fecha=$_GET['f_rec1'];
$ciudad=utf8_decode($_GET['city1']);
$dest=$_GET['dest1'];
$lista=$_GET['lista'];



if(!empty($id) && !empty($guia) && !empty($ciudad) && !empty($fecha) && !empty($dest)) {

    $caux1 = "SELECT `Id_Guia` FROM `guia_despacho` WHERE `Id_Guia`=$guia";
    $qaux1 = mysqli_query($dbc, $caux1);

    if ($guia == 0) {
        echo "<script>alert('No se ingresó guia de despacho.')</script>";
    } else{
        if (mysqli_num_rows($qaux1)>0) {
            die('Error SQL $qmax5, ya existe el número de guia en la base de datos, no se puede remplazar: ' . mysqli_error($dbc));
        }else {
            $c1 = "INSERT INTO `guia_despacho`(`Id_Guia`, `Id_Factura`, `Ciudad`, `Fecha_Despacho`, `Destino`) VALUES ($guia, $factura,'$ciudad','$fecha','$dest')";
            $c2 = "UPDATE `det_despacho` SET `Id_Guia`=$guia,`Estado`=TRUE WHERE `det_despacho`.`Id_Adqui`=$id";

        }
    }


    $caux22 = "SELECT `Id_Factura` FROM `factura` WHERE `Id_Factura`=$factura";
    $qaux22 = mysqli_query($dbc, $caux22);
    $co1="";

    if ($guia == 0) {
        echo "<script>alert('No se ingresó factura alguna.')</script>";
    }
    else{
        if (mysqli_num_rows($qaux22)>0) {
            die('Error SQL $qaux22, ya existe el número de factura en la base de datos, no se puede remplazar: ' . mysqli_error($dbc));
        }  else {

            $d1 = 0;
            $d2 = 0;
            $d3 = "";

            $ccc1 = "SELECT `Monto_Bruto`, `Monto_Neto`, `Cond_Pago` FROM `adquisicion` WHERE `Id_Adquisicion`=$id";
            $qqq1 = mysqli_query($dbc, $ccc1);
            if ($qqq1 == false) {
                die('Error SQL $qaux22, ya existe el número de factura en la base de datos, no se puede remplazar: ' . mysqli_error($dbc));
            } else {
                while ($row = mysqli_fetch_row($qqq1)) {
                    $d1 = $row[0];
                    $d2 = $row[1];
                    $d3 = utf8_decode($row[2]);
                }
                $co1 = "INSERT INTO `factura`(`Id_Factura`, `Fecha`, `Fecha_Pago`, `Forma_Pago`, `Total_Neto`, `Total_Bruto`, `Estado`) VALUES ($factura,'$fecha','$fecha','$d3',$d2,$d1,TRUE)";
            }



        }
    }


    $cc = "UPDATE `det_material` SET `Estado`=TRUE WHERE `det_material`.`Id_Adqui`=$id";

    $contador=1;
while($contador<=$lista) {

    $n1="ident";
    $n2="venc";
    $n3="lote";
    $n4="unidad";

    $nn1=$n1.$contador;
    $nn2=$n2.$contador;
    $nn3=$n3.$contador;
    $nn4=$n4.$contador;

    $id_det_mat=$_GET["$nn1"];
    $vencimiento=$_GET["$nn2"];
    $lote=$_GET["$nn3"];
    $unidad=$_GET["$nn4"];


    $cupdstock = "SELECT `Id_Adqui`, `Id_Material`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Monto`, `Estado` FROM `det_material` WHERE `Id_Adqui`=$id AND `Estado`=FALSE ";
    $qupdt = mysqli_query($dbc, $cupdstock);
    $cantsuma = 0;
    $iden = 0;
    $iden2 = 0;
    $q3 = 0;
    while ($r = mysqli_fetch_row($qupdt)) {
        $iden = $r[1];
        $iden2 = $r[2];
        $cantsuma = $r[3];

        $ccc = "SELECT `Stock` FROM `material` WHERE `Id_Material`=$iden";
        $qqq = mysqli_query($dbc, $ccc);
        $stockreal = 0;
        $stockactualizado = 0;
        $rr = mysqli_fetch_row($qqq);
            $stockreal = $rr[0];
            $stockactualizado = intval($stockreal + $cantsuma);
            $ubicacion = "Bodega";


            $c3 = "UPDATE `material` SET `Stock`=$stockactualizado,`Ubicacion`='$ubicacion', `Unidad`='$unidad',`Estado_Entrega`=TRUE,`Estado`=TRUE WHERE `Id_Material`=$iden";

            $q3 = mysqli_query($dbc, $c3);
            if ($q3 == false) {
                die('Error SQL $q3: ' . mysqli_error($dbc));
            }


            $cupt3 = "UPDATE `det_material` SET `N_Lote`=$lote,`F_Venc`='$vencimiento',`Estado`=TRUE WHERE `Id_Detalle_Material`=$iden2";

            $qup3 = mysqli_query($dbc, $cupt3);
            if ($qup3 == false) {
                die('Error SQL $q3: ' . mysqli_error($dbc));
            }

    }
$contador++;
}




    $cw = "UPDATE `adquisicion` SET `Estado_Recepcion`=TRUE WHERE `Id_Adquisicion`=$id";
    $qw = mysqli_query($dbc, $cw);
    if ($qw == false) {
        die('Error SQL $qw: ' . mysqli_error($dbc));
    } else {
        $q1 = mysqli_query($dbc, $c1);
        if ($q1 == false) {
            die('Error SQL $q1: ' . mysqli_error($dbc));
        } else {
            $q2 = mysqli_query($dbc, $c2);
            if ($q2 == false) {
                die('Error SQL $q2: ' . mysqli_error($dbc));
            } else {
                $qo2 = mysqli_query($dbc, $co1);
                if ($qo2 == false) {
                    die('Error SQL $qo2: ' . mysqli_error($dbc));
                } else {
                    $qq = mysqli_query($dbc, $cc);
                    if ($qq == false) {
                        die('Error SQL $qq: ' . mysqli_error($dbc));
                    } else {

                        echo "<script>alert('La orden N° : " . $id . ", ha sido ingresada al sistema de inventario. ( Despachado )');</script>";
                        header('Location: Registros.php');

                    }
                }
            }
        }
    }
}
mysqli_close($dbc);