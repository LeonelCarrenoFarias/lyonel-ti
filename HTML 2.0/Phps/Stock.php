
<?php
session_start();
require 'Connect.php';
$rut=$_COOKIE['Id'];
$nom=utf8_decode($_COOKIE['Nombre']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ingesaf - GOCYS</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="../index.php">Ingesaf - GOCYS</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom) ?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <!--<li><a href="Perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>-->
        <li><a href="../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>
    <!--
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Mensajes</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="Nuevomsj.html"><i class="icon-plus"></i> Nuevo Mensaje</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="Bandeja_entrada.html"><i class="icon-envelope"></i> Bandeja Entrada</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="Bandeja_Salida"><i class="icon-arrow-up"></i> Bandeja Salida</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="Msj_eliminados.html"><i class="icon-trash"></i> Eliminados</a></li>
      </ul>
    </li>-->
    <li class=""><a title="" href="../index.php"><i class="icon icon-share-alt"></i> <span class="text">Salir</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Buscar Aqui..."/>
  <button type="submit" class="tip-bottom" title="Buscar"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
  <ul>
    <li><a href="Indicadores.php"><i class="icon icon-dashboard"></i> <span>Indicadores</span></a> </li>
    <li><a href="Orden.php"><i class="icon icon-edit"></i> <span>Orden de Compra</span></a> </li>
    <li><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
    <li><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
    <li><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
    <li ><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
    <li class="active"><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Stock</a> </div>
    <h1>Stock</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="span11">
    <div class="row-fluid">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Materiales</a></li>
        <li><a data-toggle="tab" href="#tab2">Herramientas</a></li>
      </ul>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Inventario de Materiales</h5>
              <!--<div class="span3" style="float: right">
                <select id="Sel_estado" class="span11" style="display: none;">
                  <option value="0">Todos</option>
                  <option value="1">Óptimo</option>
                  <option value="2">Escaso</option>
                  <option value="3">Proceso de Compra</option>
                </select><br>
              </div>-->
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Ubicacion</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                  <th>Estado</th>
                  <th>Unidad</th>
                  <th>Stock</th>
                  <th>Fecha Orden</th>
                  <th>Vencimiento</th>
                </tr>
                </thead>
                <tbody>

                <?php

                include 'Connect.php';
                $F_Ad="";

                    $c1="SELECT `Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`,`Estado_Entrega`, `Estado`,`Stock_Optimo` FROM `material` WHERE `Estado`=TRUE";
                    $q1=mysqli_query($dbc,$c1);
                    while($r1=mysqli_fetch_row($q1)){


                        $c2="SELECT `Fecha_Adqui`,`F_Venc` FROM `adquisicion` INNER JOIN `det_material` WHERE `adquisicion`.`Id_Adquisicion`=`det_material`.`Id_Adqui` AND `det_material`.`Id_Material`=$r1[0]";
                        $q2=mysqli_query($dbc,$c2);
                        $vc=0;
                        while ($r2=mysqli_fetch_row($q2)){
                            $F_Ad=$r2[0];
                            $vc=$r2[1];
                        }

                        $stock_opt=$r1[8];
                        $estad="";
                        $color="";

                        if($r1[6]== TRUE) {
                            if ($r1[4] < ($stock_opt * 0.25)) {
                                $estad = "Nivel Escaso";
                                $color = "Pink";
                            } else {
                                $estad = "Nivel Optimo";
                                $color = "palegreen";

                            }
                        }else{
                            $estad = "Proceso de Compra";
                            $color = "khaki";
                        }
                        $n1=utf8_decode($r1[1]);
                        $d1=utf8_decode($r1[2]);
                        $u1=utf8_decode($r1[3]);

                        echo'
                            <tr class="gradeX">
                              <td class="center" style="background-color: '.$color.'">'.$r1[0].'</td>
                              <td class="center" style="background-color: '.$color.'">'.$r1[5].'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($n1).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($d1).'</td>
                              
                              
                              <td class="center" style="background-color: '.$color.'">'.$estad.'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($u1).'</td>
                              <td class="center" style="background-color: '.$color.'">'.$r1[4].'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($F_Ad).'</td>
                              <td class="center" style="background-color: '.$color.'">'.$vc.'</td>
                            </tr>
                        ';
                    }





                    $c2="SELECT `det_material`.`Id_Material`, `Fecha_Adqui`, `Cantidad`,`F_Venc` FROM `adquisicion` INNER JOIN `det_material` WHERE `adquisicion`.`Id_Adquisicion`=`det_material`.`Id_Adqui` AND `det_material`.`Estado`=FALSE";
                    $q2=mysqli_query($dbc,$c2);
                    $F_Ad="";
                    $vc="";
                    while ($r2=mysqli_fetch_row($q2)) {


                        $c3="SELECT `Fecha_Adqui`,`F_Venc` FROM `adquisicion` INNER JOIN `det_material` WHERE `adquisicion`.`Id_Adquisicion`=`det_material`.`Id_Adqui` AND `det_material`.`Id_Material`=$r2[0]";
                        $q3=mysqli_query($dbc,$c3);
                        $vc=0;
                        while ($r3=mysqli_fetch_row($q3)){
                                $F_Ad=$r3[0];
                            $vc=$r3[1];
                        }

                        $can = $r2[2];
                        $c1 = "SELECT `Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`,`Estado_Entrega`, `Estado`,`Stock_Optimo` FROM `material` WHERE `Id_Material`=$r2[0]";
                        $q1 = mysqli_query($dbc, $c1);
                        while ($r1 = mysqli_fetch_row($q1)) {


                            $estad = "Proceso de Compra";
                            $color = "khaki";
                            $n1 = utf8_decode($r1[1]);
                            $d1 = utf8_decode($r1[2]);
                            $u1 = utf8_decode($r1[3]);

                            echo '
                            <tr class="gradeX">
                              <td class="center" style="background-color: ' . $color . '">' . $r1[0] . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . $r1[5] . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . utf8_encode($n1) . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . utf8_encode($d1) . '</td>
                              
                              
                              <td class="center" style="background-color: ' . $color . '">' . $estad . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . utf8_encode($u1) . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . $can . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . utf8_encode($F_Ad) . '</td>
                              <td class="center" style="background-color: ' . $color . '">' . utf8_encode($vc) . '</td>
                            </tr>
                        ';
                        }

                    }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        <div id="tab2" class="tab-pane">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Inventario de Herramientas</h5>
              <!--<div class="span3" style="float: right">
                <select class="span11" style="display: none; ">
                  <option value="0">Todos</option>
                  <option value="1">Operativas</option>
                  <option value="2">No Operativas</option>
                  <option value="3">En Reparación</option>
                </select><br>
              </div>-->
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Ubicacion</th>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c2="SELECT `Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado` FROM `herramienta` WHERE `Estado`=true";
                $q2=mysqli_query($dbc,$c2);
                while($r2=mysqli_fetch_row($q2)){


                    $c3="SELECT `Fecha_Adqui` FROM `adquisicion` INNER JOIN `det_herramienta` WHERE `adquisicion`.`Id_Adquisicion`=`det_herramienta`.`Id_Adqui` AND `det_herramienta`.`Id_Herramienta`=$r2[0]";
                    $q3=mysqli_query($dbc,$c3);
                    $F_Ad="";
                    while ($r3=mysqli_fetch_row($q3)){
                        $F_Ad=$r3[0];
                    }

                    $estad="";
                    $color="";

                    if($r2[7]=='Operativa'){

                        $estad="Operativa";
                        $color="palegreen";
                    }else{

                        $estad="No operativa";
                        $color="pink";
                    }


                    $v1=utf8_decode($r2[6]);
                    $v2=utf8_decode($r2[1]);
                    $v3=utf8_decode($r2[2]);

                    echo'
                            <tr class="gradeX">
                              <td class="center" style="background-color: '.$color.'">'.$r2[0].'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($v1).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($v2).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($v3).'</td>
                              <td class="center" style="background-color: '.$color.'">'.$r2[3].'</td>
                              <td class="center" style="background-color: '.$color.'">'.$estad.'</td>
                             
                            </tr>
                        ';
                }

                $c2="SELECT `det_herramienta`.`Id_Herramienta`, `Fecha_Adqui`, `det_herramienta`.`Cantidad`, `adquisicion`.`Id_Adquisicion` FROM `adquisicion` INNER JOIN `det_herramienta` WHERE `adquisicion`.`Id_Adquisicion`=`det_herramienta`.`Id_Adqui` AND `det_herramienta`.`Estado`=FALSE";
                $q2=mysqli_query($dbc,$c2);
                $ubica="-";

                while ($r2=mysqli_fetch_row($q2)) {

                    $F_Ad=$r2[1];
                    $Ad=$r2[3];


                    $can = $r2[2];
                    $c1 = "SELECT `Id_Herramienta`, `Nombre`, `Categoria`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado`, `Estado_Entrega` FROM `herramienta` WHERE `Id_Herramienta`=$r2[0]";
                    $q1 = mysqli_query($dbc, $c1);
                    while ($r1 = mysqli_fetch_row($q1)) {


                        $estad = "Proceso de Compra";
                        $color = "khaki";
                        $n1 = utf8_decode($r1[1]);
                        $d1 = utf8_decode($r1[4]);
                        $c1 = utf8_decode($r1[2]);

                        echo'
                            <tr class="gradeX">
                              <td class="center" style="background-color: '.$color.'">'.$Ad.'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($ubica).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($n1).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($c1).'</td>
                              <td class="center" style="background-color: '.$color.'">'.utf8_encode($can).'</td>
                              <td class="center" style="background-color: '.$color.'">'.$estad.'</td>
                             
                            </tr>
                        ';
                    }

                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 Desarrollo web- webistas by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
</div>
<!--end-Footer-part-->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.tables.js"></script>
</body>
</html>
