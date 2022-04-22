<?php
require_once '../connect/Connect.php';

$tipo=intval($_GET['seleccion']);
$fecha=$_GET['fecha'];
$documento=$_GET['documento'];


if($tipo===1){

                $code=$_GET['code'];
                $code_fab=$_GET['code_fab'];
                $desc=$_GET['desc'];
                $marca=$_GET['marca'];
                $cant=$_GET['cant'];
                $precio=$_GET['precio'];

                $unidad=$_GET['unidad'];
                $stock_opt=$_GET['stock_opt'];
                $categoria=$_GET['cat'];
                $monto = $_GET['monto'];
                $lugar = $_GET['select2'];
                $seccion = $_GET['select3'];

                $tx1="SELECT `code` FROM `inventario` WHERE `code`=$code ";
                $qx1=mysqli_query($dbc,$tx1);
                $des=0;
                if(mysqli_num_rows($qx1)>0){
                    $des=1;
                }else{
                    $des=0;
                }


            if($des==1){
                $tx1="SELECT `cantidad` FROM `inventario` WHERE `code`=$code AND `detalle`='$desc'";
                $qx1=mysqli_query($dbc,$tx1);
                $cc=0;
                while($rw=mysqli_fetch_row($qx1)){
                    $cc=$rw[0];
                }
                $cant_final=intval($cc)+intval($cant);

                $tx2="UPDATE `inventario` SET `id_fabrica`='$code_fab',`cantidad`=$cant_final,`marca`='$marca',`valor`=$precio,`ubicacion`='$seccion' WHERE `code`=$code";

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

                $tx6="INSERT INTO `det_material`(`Code`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`,  `documento_asoc`, `Estado`) VALUES ('$code',$id6,$cant,'$desc','$unidad',$stock_opt,$monto,'$categoria','$fecha', $documento,1)";

                $qx2=mysqli_query($dbc,$tx2);
                $qx6=mysqli_query($dbc,$tx6);
                if ($qx2 == false || $qx6 == false) {
                    die('Error SQL al actualizar stock: ' . mysqli_error($dbc));
                } else {
                    mysqli_close($dbc);
                    $var = "Stock actualizado con exito.";
            
                    
                    echo '<script language="javascript">
            location.href ="Entradas.php";alert("Actualizado con exito!");
            </script>'; 
                }


            }else{

                $aux=strtoupper($desc);
                $aux2=strtoupper($code_fab);
                $tx3="INSERT INTO `inventario`(`code`,`id_fabrica`, `detalle`, `cantidad`, `marca`, `valor`, `ubicacion`) VALUES ('$code','$aux2','$aux',$cant,'$marca',$precio,'$seccion')";

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

                $tx6="INSERT INTO `det_material`(`Code`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`, `documento_asoc`, `Estado`) VALUES ('$code',$id6,$cant,'$desc','$unidad',$stock_opt,$monto,'$categoria','$fecha', $documento,1)";
                $qx3=mysqli_query($dbc,$tx3);
                $qx6=mysqli_query($dbc,$tx6);

                if ($qx3 == false || $qx6 == false) {
                    die('Error SQL al ingresar nuevo elemento: ' . mysqli_error($dbc));
                } else {
                    mysqli_close($dbc);
                    $var = "Elemento registrado con éxito.";
                      echo '<script language="javascript">
            location.href ="Entradas.php";alert("Ingresado con exito!");
            </script>'; 
                }
            }


}else if($tipo===3){

    $dura=$_GET['dura'];
    $code=$_GET['code'];
    $desc=$_GET['desc'];
    $cant=$_GET['cant'];
    $precio=$_GET['precio'];
    $monto = $_GET['monto'];


        $c3 = "INSERT INTO `servicio`(`Id_Servicio`, `Descripcion`, `Duracion`, `Valor`, `Estado`) VALUES ($code,'$desc', $dura,$precio, true)";

        $cau4="SELECT MAX(`Id_Det_Servicio`) FROM `det_servicio`";
        $qau4=mysqli_query($dbc,$cau4);
        if ($qau4 == false) {
            die('Error SQL $qaux3: ' . mysqli_error($dbc));
        }else {
            $id4 = 0;
            while ($r4 = mysqli_fetch_row($qau4)) {
                $id4 = $r4[0];
            }
            $id4 += 1;

            $tx4 = "INSERT INTO `det_servicio`(`Id_Servicio`, `Id_Det_Servicio`, `Item`, `Total_Neto`, `Cantidad`, `Fecha_Inicio`, `Fecha_Termino`, `documento_asoc`, `Estado`) VALUES ($code,$id4,'$desc',$monto,$cant,'$fecha', null,$documento,1)";


            $q3 = mysqli_query($dbc, $c3);
            $q4 = mysqli_query($dbc, $tx4);

            if ($q3 == false || $q4==false) {
                die('Error SQL q3 o q4: ' . mysqli_error($dbc));
            } else {
                mysqli_close($dbc);
                $var = "Servicio registrado exitosamente.";
                echo '<script language="javascript">
            location.href ="Entradas.php";alert("Servicio ingresado con exito!");</script>';
            
            }
    }
}else if($tipo===4){

    $dura=$_GET['dura'];
    $code=$_GET['code'];
    $desc=$_GET['desc'];
    $cant=$_GET['cant'];
    $precio=$_GET['precio'];
    $monto = $_GET['monto'];


        $cx4 = "INSERT INTO `arriendo`(`Id_Arriendo`, `Descripcion`, `Valor`, `Duracion`, `Estado`) VALUES ($code,'$desc',$precio,$dura,1)";

        $ca4="SELECT MAX(`Id_Det_Arriendo`) FROM `det_arriendo`";
        $qa4=mysqli_query($dbc,$ca4);
        if ($qa4 == false) {
            die('Error SQL $qau4: ' . mysqli_error($dbc));
        }else {
            $id6 = 0;
            while ($r6 = mysqli_fetch_row($qa4)) {
                $id6 = $r6[0];
            }
            $id6 += 1;

            $tx5="INSERT INTO `det_arriendo`(`Id_Arriendo`, `Id_Det_Arriendo`, `Item`, `Cantidad`, `Monto`, `Fecha_Arriendo`, `Fecha_Devolucion`,`documento_asoc`, `Estado`) VALUES ($code,$id6,'$desc',$cant,$monto,'$fecha',NULL ,$documento,1)";


            $qx4 = mysqli_query($dbc, $cx4);
            $qx5 = mysqli_query($dbc, $tx5);

            if ($qx4 == false || $qx5 ==false) {
                die('Error SQL $q4: ' . mysqli_error($dbc));
            } else {
                mysqli_close($dbc);
                $var = "Arriendo registrado exitosamente.";
                echo "<script> alert('".$var."'); </script>";
                header('Location: ../Arriendos/Arriendos.php');
            }
        }
}


