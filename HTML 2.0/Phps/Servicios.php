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
       <!-- <li><a href="Perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>-->
        <li><a href="../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li><!--
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Mensajes</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="../Nuevomsj.html"><i class="icon-plus"></i> Nuevo Mensaje</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="../Bandeja_entrada.html"><i class="icon-envelope"></i> Bandeja Entrada</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="Bandeja_Salida"><i class="icon-arrow-up"></i> Bandeja Salida</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="../Msj_eliminados.html"><i class="icon-trash"></i> Eliminados</a></li>
      </ul>
    </li>-->
    <li class=""><a title="" href="../index.php"><i class="icon icon-share-alt"></i> <span class="text">Salir</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Buscar Aqui..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
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
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li class="active"><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Servicios</a> </div>
    <h1>Servicios</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="span11">
      <div class="row-fluid">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab1">Servicios</a></li>
        </ul>
        <div class="widget-content tab-content">
          <div id="tab1" class="tab-pane active">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Servicios Adquiridos</h5>
              </div>
              <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Descripcion</th>
                      <th>Proveedor</th>
                      <th>Obra</th>
                      <th>Monto</th>
                      <th>Adquisición</th>
                      <th>Duración</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    include 'Connect.php';

                    $c3="SELECT `Id_Servicio`, `Descripcion`, `Tipo`, `Duracion`, `Lugar`, `Estado` FROM `servicio` WHERE `estado`=true";
                    $q3=mysqli_query($dbc,$c3);



                    while($row=mysqli_fetch_row($q3)) {
                        $Id_S=$row[0];
                        $c4="SELECT `p`.`Id_Obra`,`p`.`Id_Adquisicion`,`Fecha_Adqui`,`Valor` FROM `adquisicion` AS `p` INNER JOIN `det_servicio` AS `c` ON `p`.`Id_Adquisicion`=`c`.`Id_Adqui` AND `c`.`Id_Servicio`=$Id_S";
                        $q5=mysqli_query($dbc,$c4);

                        $Id_O=0;
                        $Id_Adq=0;
                        $F_Adq="";
                        $F_Dev="";
                        $valor=0;
                        while ($row4=mysqli_fetch_row($q5)){
                            $Id_O=$row4[0];
                            $Id_Adq=$row4[1];
                            $F_Adq=$row4[2];
                            $valor=utf8_decode($row4[3]);
                        }


                        $c5="SELECT `Nombre` FROM `obra` WHERE `Id_Obra`=$Id_O";
                        $q5=mysqli_query($dbc,$c5);
                        $nom="";
                        while($row5=mysqli_fetch_row($q5)){
                            $nom=utf8_decode($row5[0]);
                        }

                        $c6="SELECT `Nombre` FROM `proveedor` AS `P` INNER JOIN `det_proveedor` AS `DET` ON `P`.`Id_Proveedor`= `DET`.`Id_Proveedor` AND `DET`.`Id_Adquisicion`=$Id_Adq";
                        $q6=mysqli_query($dbc,$c6);
                        $name="";
                        while($r6=mysqli_fetch_row($q6)){
                            $name=utf8_decode($r6[0]);
                        }


                        $vv=utf8_decode($row[1]);
                        $dd=utf8_decode($row[3]);

                        echo '                    <tr class="gradeX">
<td><a href="../FPDF/Orden.php?idad='.$Id_Adq.'" target="_blank">'.$row[0].'</a></td>
                      <td>'.utf8_encode($vv).'</td>
                      <td>'.utf8_encode($name).'</td>
                      <td>'.utf8_encode($nom).'</td>
                      <td>'.utf8_encode($valor).'</td>
                      <td class="center">'.$F_Adq.'</td>
                      <td class="center">'.$dd.'</td>                    </tr>
';
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
  <div id="footer" class="span12"> 2020 Desarrollo Web- webistas by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
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
