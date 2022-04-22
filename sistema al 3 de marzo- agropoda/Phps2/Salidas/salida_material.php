<?php
require '../connect/Connect.php';


$id=$_GET['ide'];
$cantidad=$_GET['canti'];
$centro=$_GET['centrocosto'];
$nombre=$_GET['nombre'];


$cc="SELECT `detalle`, `cantidad`, `marca`, `valor`, `ubicacion` FROM `inventario` WHERE `code`=$id";
$qq=mysqli_query($dbc,$cc);
$stock_actual=0;
$detalle="";
$valor="";

while($r=mysqli_fetch_row($qq)){
    $stock_actual=$r[1];
    $detalle=$r[0];
    $valor=$r[3];
}
$stock_posterior=floatval($stock_actual)-floatval($cantidad);

if($stock_posterior>=0) {

    $c = "UPDATE `inventario` SET `cantidad`=$stock_posterior WHERE `code`=$id";


    $ca4 = "SELECT MAX(`Id_Det_Sal_Materiales`) FROM `det_sal_materiales`";
    $qa4 = mysqli_query($dbc, $ca4);
    if ($qa4 == false) {
        die('Error SQL $qau4: ' . mysqli_error($dbc));
    } else {
        $id6 = 0;
        while ($r6 = mysqli_fetch_row($qa4)) {
            $id6 = $r6[0];
        }
        $id6 += 1;
    }



    $monto = intval(intval($cantidad) * intval($valor));
    $fecha = date('Y-m-d');

    $tt = "INSERT INTO `det_sal_materiales`(`Code`, `Id_Centro`, `Id_Det_Sal_Materiales`, `Detalle`, `Cantidad`, `Monto`, `Fecha_Salida`, `Estado`,`Responsable`) VALUES ($id,'$centro',$id6,'$detalle',$cantidad,$monto,'$fecha',1,'$nombre')";


    $q = mysqli_query($dbc, $c);
    $q2 = mysqli_query($dbc, $tt);

    if($q && $q2){
        mysqli_close($dbc);
        $var = "Salida registrada exitosamente.";
       echo '<script language="javascript">
            location.href ="Salida.php";alert("Salida registrada exitosamente.");
            </script>'; 
    }else{
        mysqli_close($dbc);
        $var = "Error al registrar la salida.";
        echo '<script language="javascript">
            location.href ="Salida.php";alert("Error al registrar la salida");
            </script>'; 
    }

}


