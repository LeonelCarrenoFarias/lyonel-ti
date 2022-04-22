<?php
require_once'Connect.php';

$tipo=intval($_GET['seleccion']);
$nom=$_GET['nom'];
$desc=$_GET['desc'];
$cant=$_GET['cant'];
$unidad=$_GET['unidad'];
$stock_opt=$_GET['stock_opt'];
$n_lote=$_GET['n_lote'];
$select2=$_GET['dest'];
$categoria=$_GET['cat'];
$date2=$_GET['date2'];
$dur = $_GET['dur'];
$precio=$_GET['precio'];

$monto = $_GET['monto'];
$lugar = $_GET['dest'];

header('Content-Type: application/json');

if($tipo==1){

    $caux="SELECT MAX(`Id_Material`) FROM `material`";
    $qaux=mysqli_query($dbc,$caux);
    if ($qaux == false) {
        die('Error SQL $qaux: ' . mysqli_error($dbc));
    }else {
        $id1 = 0;
        while ($r1 = mysqli_fetch_row($qaux)) {
            $id1 = $r1[0] + 1;
        }

        $destino = "";
        if ($select2 = 0) {
            $destino = "Obra";
        } else if ($select2 = 2) {
            $destino = "Bodega";
        } else {
            $destino = "Casa Matriz";
        }

        if ($n_lote == 0) {
            $nlt = 1001;
        } else {
            $nlt = $n_lote;
        }

        $c1 = "INSERT INTO `material`(`Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`, `Estado_Entrega`, `Estado`,`Stock_Optimo`) VALUES ($id1,'$nom','$desc','$unidad',$cant,'$destino',true,true,$stock_opt)";
        $q1 = mysqli_query($dbc, $c1);


        if ($q1 == false) {
            die('Error SQL $q1: ' . mysqli_error($dbc));
        } else {
            echo '<script>alert("Material ingresado exitosamente.");</script>';
            mysqli_close($dbc);
            header('Location: Entradas.php');
        }


    }
}else if ($tipo==2){




    $destino="";
    if($select2=0){
        $destino="Obra";
    }else if($select2=2){
        $destino="Bodega";
    }else{
        $destino="Casa Matriz";
    }


    $caux2="SELECT MAX(`Id_Herramienta`) FROM `herramienta`";
    $qaux2=mysqli_query($dbc,$caux2);
    if ($qaux2 == false) {
        die('Error SQL $qaux2: ' . mysqli_error($dbc));
    }else {
        $id2 = 0;
        while ($r2 = mysqli_fetch_row($qaux2)) {
            $id2 = $r2[0] + 1;
        }
        $estado_h = "Operativa";

        $c2 = "INSERT INTO `herramienta`(`Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado`, `Estado_Entrega`) VALUES ($id2,'$nom','$categoria',$cant,'$desc','$precio','$destino','$estado_h',1,1)";
        $q2 = mysqli_query($dbc, $c2);


        if ($q2 == false) {
            die('Error SQL $q2: ' . mysqli_error($dbc));
        } else {
            echo '<script>alert("Herramienta ingresada exitosamente.");</script>';
            mysqli_close($dbc);
            header('Location: Entradas.php');
        }

    }

}else if($tipo==3){


    $caux3="SELECT MAX(`Id_Servicio`) FROM `servicio`";
    $qaux3=mysqli_query($dbc,$caux3);
    if ($qaux3 == false) {
        die('Error SQL $qaux3: ' . mysqli_error($dbc));
    }else {
        $id3 = 0;
        while ($r3 = mysqli_fetch_row($qaux3)) {
            $id3 = $r3[0] + 1;
        }


        $destino = "";
        if ($select2 == 0) {
            $destino = "Obra";
        } else if ($select2 == 2) {
            $destino = "Bodega";
        } else {
            $destino = "Casa Matriz";
        }

        $c3 = "INSERT INTO `servicio`(`Id_Servicio`, `Descripcion`, `Tipo`, `Duracion`, `Lugar`, `Estado`) VALUES ($id3,'$desc','$categoria',$dur,'$destino',true)";
        $q3 = mysqli_query($dbc, $c3);

        if ($q3 == false) {
            die('Error SQL $q3: ' . mysqli_error($dbc));
        } else {
            echo '<script>alert("Servicio ingresado exitosamente.");</script>';
            mysqli_close($dbc);
            header('Location: Entradas.php');
        }


    }
}else {

    $caux4="SELECT MAX(`Id_Arriendo`) FROM `arriendo`";
    $qaux4=mysqli_query($dbc,$caux4);
    if ($qaux4 == false) {
        die('Error SQL $qaux4: ' . mysqli_error($dbc));
    }else {
        $id4 = 0;




        while ($r4 = mysqli_fetch_row($qaux4)) {
            $id4 = $r4[0] + 1;
        }

        $c4 = "INSERT INTO `arriendo`(`Id_Arriendo`, `Descripcion`, `Stock`, `Monto`,`Lugar`, `Estado`) VALUES ($id4,'$desc',$cant,$monto,'$lugar',true)";
        $q4 = mysqli_query($dbc, $c4);


        if ($q4 == false) {
            die('Error SQL $q4: ' . mysqli_error($dbc));
        } else {
            echo '<script>alert("Arriendo ingresado exitosamente.");</script>';
            mysqli_close($dbc);
            header('Location: Entradas.php');
        }

    }
}

    $datos = array(
        'estado' => 'ok');
    echo json_encode($datos, JSON_FORCE_OBJECT);
