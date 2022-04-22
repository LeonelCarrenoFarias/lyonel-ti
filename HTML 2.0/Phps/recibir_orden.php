<?php
require_once 'Connect.php';
$rut=$_COOKIE['Id'];

$tipo=$_GET['select'];
$n_orden=$_GET['orden'];
$obra=$_GET['obra'];
$señores=$_GET['prov'];
$rut_prov=$_GET['rut_prov'];
$direccion=$_GET['dir'];
$fono=$_GET['fono'];
$ciudad=$_GET['city'];
$fecha=$_GET['dat'];
$vendedor=$_GET['ven'];
$n_cotizacion=$_GET['cot'];
$modo_pago=$_GET['pago'];
$fecha_estimada=$_GET['fechaentre'];
$despacho=$_GET['despacho'];
$needdate=$_GET['needdate'];



$contador=1;
$monto_neto=0;
$monto_bruto=0;

$observacion =$_GET['obs'];



$id_obra=0;

//materiales

if($tipo==0){

    $nu=strval($contador);

    $nom1="cant";
    $nom2="nombre";
    $nom3="descripcion";
    $nom4="precio";
    $nom5="Tneto";


    $cantidad = intval($_GET[strval($nom1.$nu)]);
    $nombre = $_GET[strval($nom2.$nu)];
    $descripcion = $_GET[strval($nom3.$nu)];
    $precio = intval($_GET[strval($nom4.$nu)]);
    $total_neto = intval($_GET[strval($nom5.$nu)]);
    $c2="";

    while( !empty($cantidad) && !empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($total_neto) && $contador<9){
        $ide_mat=0;
        $ide_det=0;
        $unidad="";
        $stock=0;


        $busqueda = "SELECT `Id_Material`,`Unidad`,`Stock`,`Ubicacion` FROM `material` WHERE `Nombre`='$nombre' AND `Descripcion`='$descripcion'";
        $con = mysqli_query($dbc,$busqueda);
        $c3="";
        if ($con == false) {
            die('Error SQL $qmax1: ' . mysqli_error($dbc));
        } else {

            if (mysqli_num_rows($con) == 0) {
                $stock = 0;
                $cmax = "SELECT MAX(`Id_Material`) FROM `material`";
                $qmax = mysqli_query($dbc, $cmax);
                $ubi='Bodega';


                while ($r = mysqli_fetch_row($qmax)) {
                    $ide_mat = $r[0] + 1;
                }

                $st = intval($stock) + intval($cantidad);

                $c3 = "INSERT INTO `material`(`Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`, `Estado_Entrega`, `Estado`, `Stock_Optimo`) VALUES ($ide_mat,'$nombre','$descripcion','$unidad',0,'$ubi',FALSE,TRUE,1)";
                $q3 = mysqli_query($dbc,$c3);
                if ($q3 == false) {
                    die('Error SQL c3 insersión del detalle del material nuevo: ' . mysqli_error($dbc));
                }

                $cmax1 = "SELECT MAX(`Id_Detalle_Material`) FROM `det_material`";
                $qmax1 = mysqli_query($dbc, $cmax1);

                while ($r = mysqli_fetch_row($qmax1)) {
                    $ide_det = $r[0]+1;
                }
                $nn=strval($nombre."-".$descripcion);
                $c2 ="INSERT INTO `det_material`(`Id_Adqui`, `Id_Material`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Monto`, `Estado`) VALUES ($n_orden,$ide_mat,$ide_det,'$cantidad','$nn',$precio,FALSE)";

                $q2 = mysqli_query($dbc,$c2);
                if ($q2 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }

            } else{
                    while ($r = mysqli_fetch_row($con)) {
                        $ide_mat = $r[0];
                    }

                $cmax1 = "SELECT MAX(`Id_Detalle_Material`) FROM `det_material`";
                $qmax1 = mysqli_query($dbc, $cmax1);

                while ($r = mysqli_fetch_row($qmax1)) {
                    $ide_det = $r[0]+1;
                }
                $nn=strval($nombre."-".$descripcion);
                $c2 ="INSERT INTO `det_material`(`Id_Adqui`, `Id_Material`, `Id_Detalle_Material`, `Cantidad`, `Detalle`, `Monto`, `Estado`) VALUES ($n_orden,$ide_mat,$ide_det,'$cantidad','$nn',$precio,FALSE)";

                $q2 = mysqli_query($dbc,$c2);
                if ($q2 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }
            }

        }

        $i_d_d = 0;
        $cmax4 = "SELECT MAX(`Id_Det_Despacho`) FROM `det_despacho`";
        $qmax4 = mysqli_query($dbc, $cmax4);
        if ($qmax4 == false) {
            die('Error SQL $qmax4: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax4)) {
                $i_d_d = $r[0]+1;
            }
            $c4 = "INSERT INTO `det_despacho`(`Id_Det_Despacho`, `Id_Guia`, `Id_Adqui`, `Item`, `Cantidad`, `Estado`) VALUES ($i_d_d,0,$n_orden,'$nombre.$descripcion',$cantidad,FALSE)";
        }






        $cc6 = "SELECT `Id_Proveedor` FROM `proveedor` WHERE `Id_Proveedor`=$rut_prov";
        $qq6 = mysqli_query($dbc, $cc6);
        $des_prov = 0;
        if (mysqli_num_rows($qq6)==0) {
            $categoria = $tipo;

            $c6 = "INSERT INTO `proveedor`(`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Evaluacion`) VALUES ($rut_prov,'$señores',$categoria,'$direccion','$ciudad',5)";
            $q6 = mysqli_query($dbc, $c6);
            if ($q6 == false) {
                die('Error SQL $q6: ' . mysqli_error($dbc));
            }
        }

        $i_d_p = 0;
        $cmax5 = "SELECT MAX(`Id_Det_Proveedor`) FROM `det_proveedor`";
        $qmax5 = mysqli_query($dbc, $cmax5);
        if ($qmax5 == false) {
            die('Error SQL $qmax5: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax5)) {
                $i_d_p = $r[0]+1;
            }
            if ($despacho == 0) {
                $despacho = "En Local";
            } else if ($despacho === 1) {
                $despacho = "Despacho";
            } else {
                $despacho = "A Convenir";
            }

            $c5 = "INSERT INTO `det_proveedor`(`Id_Proveedor`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`,`Fono`) VALUES ($rut_prov,$n_orden,$i_d_p,'$fecha_estimada','$nombre.$descripcion',$precio,'$despacho',FALSE,$fono)";

        }






        $q4 = mysqli_query($dbc, $c4);
        if ($q4 == false) {
            die('Error SQL c4: ' . mysqli_error($dbc));
        } else {
            $q5 = mysqli_query($dbc, $c5);
            if ($q5 == false) {
                die('Error SQL c5: ' . mysqli_error($dbc));
            } else {
                $monto_neto += $total_neto;
            }
        }


        $contador++;
        $nu=strval($contador);
        $nom1="cant";
        $nom2="nombre";
        $nom3="descripcion";
        $nom4="precio";
        $nom5="Tneto";


        $cantidad = intval($_GET[strval($nom1.$nu)]);
        $nombre = $_GET[strval($nom2.$nu)];
        $descripcion = $_GET[strval($nom3.$nu)];
        $precio = intval($_GET[strval($nom4.$nu)]);
        $total_neto = intval($_GET[strval($nom5.$nu)]);
    }


    $cobra1="SELECT `Id_Obra` FROM `obra` WHERE `Nombre`='$obra'";
    $cobra2=mysqli_query($dbc,$cobra1);
    while($r=mysqli_fetch_row($cobra2)){

        if($cobra2){
            $id_obra=$r[0];
        }else{
            die("Error al obtener id de la obra".mysqli_error($dbc));
        }
    }


    $monto_bruto = intval($monto_neto * 1.19);

    $c1="INSERT INTO `adquisicion`(`Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`, `Observacion`, `Vendedor`, `Despacho`, `Tipo`, `Cond_Pago`, `N_Cotizacion`, `Estado_Recepcion`) VALUES ($n_orden,$id_obra,'$fecha','$needdate',$monto_bruto,$monto_neto,1,$rut,'$observacion','$vendedor','$despacho',$tipo,'$modo_pago',$n_cotizacion,0)";
    $q1=mysqli_query($dbc,$c1);
    if ($q1 === false) {
        die('Error SQL $q1: ' . mysqli_error($dbc));
    }else {
        echo'<script>alert("La orden de compra de materiales, fue ingresada con éxito");</script>';
        mysqli_close($dbc);
        header("Location: Registros.php");
    }

}





















//herramientas







elseif ($tipo==1){

    $nu=strval($contador);

    $nom1="cant";
    $nom2="nombre";
    $nom3="descripcion";
    $nom4="precio";
    $nom5="Tneto";


    $cantidad = intval($_GET[strval($nom1.$nu)]);
    $nombre = $_GET[strval($nom2.$nu)];
    $descripcion = $_GET[strval($nom3.$nu)];
    $precio = intval($_GET[strval($nom4.$nu)]);
    $total_neto = intval($_GET[strval($nom5.$nu)]);
    $c2="";

    while( !empty($cantidad) && !empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($total_neto) && $contador<9){
        $ide_herr=0;
        $ide_det=0;
        $unidad="";
        $stock=0;
        $ubi="Bodega";


        $busqueda = "SELECT `Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado`, `Estado_Entrega` FROM `herramienta` WHERE `Nombre`='$nombre' AND `Descripcion`='$descripcion'";
        $con = mysqli_query($dbc,$busqueda);
        $c3="";
        if ($con == false) {
            die('Error SQL $qmax1: ' . mysqli_error($dbc));
        } else {

            if (mysqli_num_rows($con) == 0) {
                $stock = 0;
                $cmax = "SELECT MAX(`Id_Herramienta`) FROM `herramienta`";
                $qmax = mysqli_query($dbc, $cmax);

                while ($r = mysqli_fetch_row($qmax)) {
                    $ide_herr = $r[0] + 1;
                }

                $st = intval($stock) + intval($cantidad);

                $c3 = "INSERT INTO `herramienta`(`Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado`, `Estado_Entrega`) VALUES ($ide_herr,'$nombre','$nombre',$st,'$descripcion',$precio,'$ubi','Operativa',TRUE ,FALSE )";
                $q3 = mysqli_query($dbc,$c3);
                if ($q3 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }

            } else{
                while ($r = mysqli_fetch_row($con)) {
                    $ide_mat = $r[0];
                }


                $cmax1 = "SELECT MAX(`Id_Detalle_Herramienta`) FROM `det_herramienta`";
                $qmax1 = mysqli_query($dbc, $cmax1);

                while ($r = mysqli_fetch_row($qmax1)) {
                    $ide_det = $r[0];
                }
                $tipo=1;
                $ide_det = $ide_det +1;
                $nn=strval($nombre."-".$descripcion);
                $c2 ="INSERT INTO `det_herramienta`(`Id_Adqui`, `Id_Herramienta`, `Id_Det_Herramienta`, `Cantidad`,  `Descripcion`, `Fecha_Compra`, `Tipo`, `Estado`) VALUES ($n_orden,$ide_herr,$ide_det,$cantidad,'$nn','$fecha',$tipo,FALSE)";

                $q2 = mysqli_query($dbc,$c2);
                if ($q2 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }
            }
        }

        $i_d_d = 0;
        $cmax4 = "SELECT MAX(`Id_Det_Despacho`) FROM `det_despacho`";
        $qmax4 = mysqli_query($dbc, $cmax4);
        if ($qmax4 == false) {
            die('Error SQL $qmax4: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax4)) {
                $i_d_d = $r[0]+1;
            }
            $nn=strval($nombre."-".$descripcion);

            $c4 = "INSERT INTO `det_despacho`(`Id_Det_Despacho`, `Id_Guia`, `Id_Adqui`, `Item`, `Cantidad`, `Estado`) VALUES ($i_d_d,0,$n_orden,'$nn',$cantidad,FALSE)";
        }







        $cobra1="SELECT `Id_Obra` FROM `obra` WHERE `Nombre`='$obra'";
        $cobra2=mysqli_query($dbc,$cobra1);

        while($r=mysqli_fetch_row($cobra2)){

            if($cobra2){
                $id_obra=$r[0];
            }else{
                die("Error al obtener id de la obra".mysqli_error($dbc));
            }
        }



        $cc6 = "SELECT `Id_Proveedor` FROM `proveedor` WHERE `Id_Proveedor`=$rut_prov";
        $qq6 = mysqli_query($dbc, $cc6);
        $des_prov = 0;
        if (mysqli_num_rows($qq6)==0) {
            $categoria = $tipo;

            $c6 = "INSERT INTO `proveedor`(`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Evaluacion`) VALUES ($rut_prov,'$señores',$categoria,'$direccion','$ciudad',5)";
            $q6 = mysqli_query($dbc, $c6);
            if ($q6 == false) {
                die('Error SQL $q6: ' . mysqli_error($dbc));
            }
        }

        $i_d_p = 0;
        $cmax5 = "SELECT MAX(`Id_Det_Proveedor`) FROM `det_proveedor`";
        $qmax5 = mysqli_query($dbc, $cmax5);
        if ($qmax5 == false) {
            die('Error SQL $qmax5: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax5)) {
                $i_d_p = $r[0]+1;
            }
            if ($despacho == 0) {
                $despacho = "En Local";
            } else if ($despacho === 1) {
                $despacho = "Despacho";
            } else {
                $despacho = "A Convenir";
            }

            $c5 = "INSERT INTO `det_proveedor`(`Id_Proveedor`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`) VALUES ($rut_prov,$n_orden,$i_d_p,'$fecha_estimada','$nombre.$descripcion',$precio,'$despacho',FALSE)";

        }






        $q4 = mysqli_query($dbc, $c4);
        if ($q4 == false) {
            die('Error SQL c4: ' . mysqli_error($dbc));
        } else {
            $q5 = mysqli_query($dbc, $c5);
            if ($q5 == false) {
                die('Error SQL c5: ' . mysqli_error($dbc));
            } else {
                $monto_neto += $total_neto;
            }
        }


        $contador++;
        $nu=strval($contador);
        $nom1="cant";
        $nom2="nombre";
        $nom3="descripcion";
        $nom4="precio";
        $nom5="Tneto";


        $cantidad = intval($_GET[strval($nom1.$nu)]);
        $nombre = $_GET[strval($nom2.$nu)];
        $descripcion = $_GET[strval($nom3.$nu)];
        $precio = intval($_GET[strval($nom4.$nu)]);
        $total_neto = intval($_GET[strval($nom5.$nu)]);
    }


    $monto_bruto = intval($monto_neto * 1.19);

    $c1="INSERT INTO `adquisicion`(`Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`, `Observacion`, `Vendedor`, `Despacho`, `Tipo`, `Cond_Pago`, `N_Cotizacion`) VALUES ($n_orden,$id_obra,'$fecha','$needdate',$monto_bruto,$monto_neto,1,$rut,'$observacion','$vendedor','$despacho',$tipo,'$modo_pago',$n_cotizacion)";
    $q1=mysqli_query($dbc,$c1);
    if ($q1 === false) {
        die('Error SQL $q1: ' . mysqli_error($dbc));
    }else {
        echo'<script>alert("La orden de compra de herramientas, fue ingresada con éxito");</script>';
        mysqli_close($dbc);
        header("Location: Registros.php");
    }

}














// servicios





else if($tipo==2){

    $nu=strval($contador);

    $nom1="cant";
    $nom2="nombre";
    $nom3="descripcion";
    $nom4="precio";
    $nom5="Tneto";


    $cantidad = intval($_GET[strval($nom1.$nu)]);
    $descripcion = $_GET[strval($nom3.$nu)];
    $precio = intval($_GET[strval($nom4.$nu)]);
    $total_neto = intval($_GET[strval($nom5.$nu)]);
    $c2="";

    while( !empty($cantidad) && !empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($total_neto) && $contador<9){
        $ide_serv=0;
        $ide_det=0;
        $unidad="";
        $stock=0;
        $ubi="Bodega";


        $busqueda = "SELECT `Id_Servicio`, `Descripcion`, `Tipo`, `Duracion`, `Lugar`, `Estado` FROM `servicio` WHERE `Descripcion`='$descripcion'";
        $con = mysqli_query($dbc,$busqueda);
        $c3="";
        if ($con == false) {
            die('Error SQL $qmax1: ' . mysqli_error($dbc));
        } else {

            if (mysqli_num_rows($con) == 0) {
                $stock = 0;
                $cmax = "SELECT MAX(`Id_Servicio`) FROM `servicio`";
                $qmax = mysqli_query($dbc, $cmax);

                while ($r = mysqli_fetch_row($qmax)) {
                    $ide_serv = $r[0] + 1;
                }

                $st = intval($stock) + intval($cantidad);
                $tipo_serv="Servicio ocasional";
                $duracion="Indefinido";

                $c1="SELECT `Nombre` FROM `obra` WHERE `Estado`=TRUE ";
                $q1=mysqli_query($dbc,$c1);
                $cc="";
                if ($q1 === false) {
                    die('Error SQL c1: ' . mysqli_error($dbc));
                }else {
                    while ($r = mysqli_fetch_row($q1)) {
                        $cc = utf8_decode($r[0]);
                    }
                }




                $c3 = "INSERT INTO `servicio`(`Id_Servicio`, `Descripcion`, `Tipo`, `Duracion`, `Lugar`, `Estado`) VALUES ($ide_serv,'$descripcion','$tipo_serv','$duracion','$cc',TRUE)";
                $q3 = mysqli_query($dbc,$c3);
                if ($q3 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }

            } else{
                while ($r = mysqli_fetch_row($con)) {
                    $ide_serv = $r[0];
                }
            }

            $cmax1 = "SELECT MAX(`Id_Det_Servicio`) FROM `det_servicio`";
            $qmax1 = mysqli_query($dbc, $cmax1);

            while ($r = mysqli_fetch_row($qmax1)) {
                $ide_det = $r[0]+1;
            }
            $tipo=1;
            $nn=strval($descripcion);
            $c2 ="INSERT INTO `det_servicio`(`Id_Adqui`, `Id_Servicio`, `Id_Det_Servicio`, `Item`, `Valor`, `Cantidad`, `Estado`) VALUES ($n_orden,$ide_serv,$ide_det,'$nn',$precio,$cantidad,FALSE)";

            $q2 = mysqli_query($dbc,$c2);
            if ($q2 == false) {
                die('Error SQL c3: ' . mysqli_error($dbc));
            }

        }

        /*
        $i_d_d = 0;
        $cmax4 = "SELECT MAX(`Id_Det_Despacho`) FROM `det_despacho`";
        $qmax4 = mysqli_query($dbc, $cmax4);
        if ($qmax4 == false) {
            die('Error SQL $qmax4: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax4)) {
                $i_d_d = $r[0]+1;
            }
            $nn=strval($nombre."-".$descripcion);

            $c4 = "INSERT INTO `det_despacho`(`Id_Det_Despacho`, `Id_Guia`, `Id_Adqui`, `Item`, `Cantidad`, `Estado`) VALUES ($i_d_d,0,$n_orden,'$nn',$cantidad,FALSE)";
        }
**/






        $cobra1="SELECT `Id_Obra` FROM `obra` WHERE `Nombre`='$obra'";
        $cobra2=mysqli_query($dbc,$cobra1);

        while($r=mysqli_fetch_row($cobra2)){

            if($cobra2){
                $id_obra=$r[0];
            }else{
                die("Error al obtener id de la obra".mysqli_error($dbc));
            }
        }



        $cc6 = "SELECT `Id_Proveedor` FROM `proveedor` WHERE `Id_Proveedor`=$rut_prov";
        $qq6 = mysqli_query($dbc, $cc6);
        $des_prov = 0;
        if (mysqli_num_rows($qq6)==0) {
            $categoria = $tipo;

            $c6 = "INSERT INTO `proveedor`(`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Evaluacion`) VALUES ($rut_prov,'$señores',$categoria,'$direccion','$ciudad',5)";
            $q6 = mysqli_query($dbc, $c6);
            if ($q6 == false) {
                die('Error SQL $q6: ' . mysqli_error($dbc));
            }
        }

        $i_d_p = 0;
        $cmax5 = "SELECT MAX(`Id_Det_Proveedor`) FROM `det_proveedor`";
        $qmax5 = mysqli_query($dbc, $cmax5);
        if ($qmax5 == false) {
            die('Error SQL $qmax5: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax5)) {
                $i_d_p = $r[0]+1;
            }
            if ($despacho == 0) {
                $despacho = "En Local";
            } else if ($despacho === 1) {
                $despacho = "Despacho";
            } else {
                $despacho = "A Convenir";
            }

            $c5 = "INSERT INTO `det_proveedor`(`Id_Proveedor`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`) VALUES ($rut_prov,$n_orden,$i_d_p,'$fecha_estimada','$descripcion',$precio,'$despacho',FALSE)";

        }






        $q4 = mysqli_query($dbc, $c4);
        if ($q4 == false) {
            die('Error SQL c4: ' . mysqli_error($dbc));
        } else {
            $q5 = mysqli_query($dbc, $c5);
            if ($q5 == false) {
                die('Error SQL c5: ' . mysqli_error($dbc));
            } else {
                $monto_neto += $total_neto;
            }
        }


        $contador++;
        $nu=strval($contador);
        $nom1="cant";
        $nom2="nombre";
        $nom3="descripcion";
        $nom4="precio";
        $nom5="Tneto";


        $cantidad = intval($_GET[strval($nom1.$nu)]);
        $descripcion = $_GET[strval($nom3.$nu)];
        $precio = intval($_GET[strval($nom4.$nu)]);
        $total_neto = intval($_GET[strval($nom5.$nu)]);
    }


    $monto_bruto = intval($monto_neto * 1.19);

    $c1="INSERT INTO `adquisicion`(`Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`, `Observacion`, `Vendedor`, `Despacho`, `Tipo`, `Cond_Pago`, `N_Cotizacion`) VALUES ($n_orden,$id_obra,'$fecha','$needdate',$monto_bruto,$monto_neto,1,$rut,'$observacion','$vendedor','$despacho',$tipo,'$modo_pago',$n_cotizacion)";
    $q1=mysqli_query($dbc,$c1);
    if ($q1 === false) {
        die('Error SQL $q1: ' . mysqli_error($dbc));
    }else {
        echo'<script>alert("La orden de adquisición de servicios, fue ingresada con éxito");</script>';
        mysqli_close($dbc);
        header("Location: Servicios.php");
    }
}











//arriendos





else{

    $nu=strval($contador);

    $nom1="cant";
    $nom2="nombre";
    $nom3="descripcion";
    $nom4="precio";
    $nom5="Tneto";


    $cantidad = intval($_GET[strval($nom1.$nu)]);
    $descripcion = $_GET[strval($nom3.$nu)];
    $precio = intval($_GET[strval($nom4.$nu)]);
    $total_neto = intval($_GET[strval($nom5.$nu)]);
    $c2="";

    while( !empty($cantidad) && !empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($total_neto) && $contador<9){
        $ide_arr=0;
        $ide_det=0;
        $unidad="";
        $stock=0;
        $ubi="Bodega";


        $busqueda = "SELECT `Id_Arriendo`, `Descripcion`, `Stock`, `Monto`, `Lugar`, `Estado` FROM `arriendo` WHERE `Descripcion`='$descripcion'";
        $con = mysqli_query($dbc,$busqueda);
        $c3="";
        if ($con == false) {
            die('Error SQL $qmax1: ' . mysqli_error($dbc));
        } else {

            if (mysqli_num_rows($con) == 0) {
                $stock = 0;
                $cmax = "SELECT MAX(`Id_Arriendo`) FROM `arriendo`";
                $qmax = mysqli_query($dbc, $cmax);

                while ($r = mysqli_fetch_row($qmax)) {
                    $ide_arr = $r[0] + 1;
                }

                $st = intval($stock) + intval($cantidad);
                $tipo_serv="Servicio ocasional";
                $duracion="Indefinido";

                $c1="SELECT `Nombre` FROM `obra` WHERE `Estado`=TRUE ";
                $q1=mysqli_query($dbc,$c1);
                $cc="";
                if ($q1 === false) {
                    die('Error SQL c1: ' . mysqli_error($dbc));
                }else {
                    while ($r = mysqli_fetch_row($q1)) {
                        $cc = utf8_decode($r[0]);
                    }
                }




                $c3 = "INSERT INTO `arriendo`(`Id_Arriendo`, `Descripcion`, `Stock`, `Monto`, `Lugar`, `Estado`) VALUES ($ide_arr,'$descripcion',$st,$precio,'$cc',TRUE)";
                $q3 = mysqli_query($dbc,$c3);
                if ($q3 == false) {
                    die('Error SQL c3: ' . mysqli_error($dbc));
                }

            } else{
                while ($r = mysqli_fetch_row($con)) {
                    $ide_serv = $r[0];
                }
            }

            $cmax1 = "SELECT MAX(`Id_Det_Arriendo`) FROM `det_arriendo`";
            $qmax1 = mysqli_query($dbc, $cmax1);

            while ($r = mysqli_fetch_row($qmax1)) {
                $ide_det = $r[0]+1;
            }
            $tipo=1;
            $nn=strval($descripcion);
            $fecha_dev="";

            $c2 ="INSERT INTO `det_arriendo`(`Id_Adquisicion`, `Id_Arriendo`, `Id_Det_Arriendo`, `Cantidad`, `Fecha_Arriendo`, `Fecha_Devolucion`, `Estado`) VALUES ($n_orden,$ide_arr,$ide_det,$cantidad,'$fecha','$fecha_dev',FALSE)";

            $q2 = mysqli_query($dbc,$c2);
            if ($q2 == false) {
                die('Error SQL c3: ' . mysqli_error($dbc));
            }

        }


        $i_d_d = 0;
        $cmax4 = "SELECT MAX(`Id_Det_Despacho`) FROM `det_despacho`";
        $qmax4 = mysqli_query($dbc, $cmax4);
        if ($qmax4 == false) {
            die('Error SQL $qmax4: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax4)) {
                $i_d_d = $r[0]+1;
            }
            $nn=strval($descripcion);

            $c4 = "INSERT INTO `det_despacho`(`Id_Det_Despacho`, `Id_Guia`, `Id_Adqui`, `Item`, `Cantidad`, `Estado`) VALUES ($i_d_d,0,$n_orden,'$nn',$cantidad,FALSE)";
        }






        $cobra1="SELECT `Id_Obra` FROM `obra` WHERE `Nombre`='$obra'";
        $cobra2=mysqli_query($dbc,$cobra1);

        while($r=mysqli_fetch_row($cobra2)){

            if($cobra2){
                $id_obra=$r[0];
            }else{
                die("Error al obtener id de la obra".mysqli_error($dbc));
            }
        }



        $cc6 = "SELECT `Id_Proveedor` FROM `proveedor` WHERE `Id_Proveedor`=$rut_prov";
        $qq6 = mysqli_query($dbc, $cc6);
        $des_prov = 0;
        if (mysqli_num_rows($qq6)==0) {
            $categoria = $tipo;

            $c6 = "INSERT INTO `proveedor`(`Id_Proveedor`, `Nombre`, `Categoria`, `Direccion`,`Ciudad`, `Evaluacion`) VALUES ($rut_prov,'$señores',$categoria,'$direccion','$ciudad',5)";
            $q6 = mysqli_query($dbc, $c6);
            if ($q6 == false) {
                die('Error SQL $q6: ' . mysqli_error($dbc));
            }
        }

        $i_d_p = 0;
        $cmax5 = "SELECT MAX(`Id_Det_Proveedor`) FROM `det_proveedor`";
        $qmax5 = mysqli_query($dbc, $cmax5);
        if ($qmax5 == false) {
            die('Error SQL $qmax5: ' . mysqli_error($dbc));
        } else {
            while ($r = mysqli_fetch_row($qmax5)) {
                $i_d_p = $r[0]+1;
            }
            if ($despacho == 0) {
                $despacho = "En Local";
            } else if ($despacho === 1) {
                $despacho = "Despacho";
            } else {
                $despacho = "A Convenir";
            }

            $c5 = "INSERT INTO `det_proveedor`(`Id_Proveedor`, `Id_Adquisicion`, `Id_Det_Proveedor`, `Fecha_estimada_entr`, `Material`, `Precio`, `Distribucion`, `Estado_Det`) VALUES ($rut_prov,$n_orden,$i_d_p,'$fecha_estimada','$descripcion',$precio,'$despacho',FALSE)";

        }






        $q4 = mysqli_query($dbc, $c4);
        if ($q4 == false) {
            die('Error SQL c4: ' . mysqli_error($dbc));
        } else {
            $q5 = mysqli_query($dbc, $c5);
            if ($q5 == false) {
                die('Error SQL c5: ' . mysqli_error($dbc));
            } else {
                $monto_neto += $total_neto;
            }
        }


        $contador++;
        $nu=strval($contador);
        $nom1="cant";
        $nom2="nombre";
        $nom3="descripcion";
        $nom4="precio";
        $nom5="Tneto";


        $cantidad = intval($_GET[strval($nom1.$nu)]);
        $descripcion = $_GET[strval($nom3.$nu)];
        $precio = intval($_GET[strval($nom4.$nu)]);
        $total_neto = intval($_GET[strval($nom5.$nu)]);
    }


    $monto_bruto = intval($monto_neto * 1.19);

    $c1="INSERT INTO `adquisicion`(`Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`, `Observacion`, `Vendedor`, `Despacho`, `Tipo`, `Cond_Pago`, `N_Cotizacion`) VALUES ($n_orden,$id_obra,'$fecha','$needdate',$monto_bruto,$monto_neto,1,$rut,'$observacion','$vendedor','$despacho',$tipo,'$modo_pago',$n_cotizacion)";
    $q1=mysqli_query($dbc,$c1);
    if ($q1 === false) {
        die('Error SQL $q1: ' . mysqli_error($dbc));
    }else {
        echo'<script>alert("La orden de adquisición de arriendos, fue ingresada con éxito");</script>';
        mysqli_close($dbc);
        header("Location: Arriendos.php");
    }
}