
<?php
session_start();
require_once'Connect.php';
ini_set("default_charset", "UTF-8");
$rut=$_COOKIE['Id'];
$nom=utf8_decode($_COOKIE['Nombre']);

$rut = mysqli_real_escape_string($dbc, $rut);
$nom = mysqli_real_escape_string($dbc, $nom);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ingesaf - GOCYS</title>
<meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom);?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <!--<li class="divider"></li>-->
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
    </li>
    -->
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
    <li  class="active"><a href="Indicadores.php"><i class="icon icon-dashboard"></i> <span>Indicadores</span></a> </li>
    <li><a href="Orden.php"><i class="icon icon-edit"></i> <span>Orden de Compra</span></a> </li>
    <li><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
    <li><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
    <li><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
    <li ><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a><a href="Indicadores.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-info-sign"></i> Indicadores</a>
      <h1>   Sistema de Gestión de Ordenes de Compra y Servicios</h1>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">

<!--Chart-box-->    

<!--End-Chart-box--> 
    <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Ultimas Ordenes Despachadas</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
                <?php

                $con="SELECT DISTINCT `Id_Adqui`,`Fecha_Despacho` FROM `guia_despacho` INNER JOIN `det_despacho` WHERE `guia_despacho`.`Id_Guia`=`det_despacho`.`Id_Guia` ORDER BY `Fecha_Despacho` DESC";
                $qq=mysqli_query($dbc,$con);
                if ($qq === false) {
                    die('Error SQL con: ' . mysqli_error($dbc));
                }else {
                    $ida = 0;
                    $fecha = "";
                    $obs = "";
                    $contador = 0;


                    if ($contador < 3) {
                        while ($r = mysqli_fetch_row($qq)) {
                            $ida = $r[0];
                            $fecha = $r[1];

                            $c2 = "SELECT `Id_Persona`,`Observacion` FROM `adquisicion` WHERE `Id_Adquisicion`=$ida";
                            $q2 = mysqli_query($dbc, $c2);
                            if ($q2 === false) {
                                die('Error SQL c2: ' . mysqli_error($dbc));
                            }else {
                                while ($rr = mysqli_fetch_row($q2)) {

                                    $obs = utf8_decode($rr[1]);

                                    $c3 = "SELECT `Nombre` FROM `persona` WHERE `Id_Persona`=$rr[0]";
                                    $q3 = mysqli_query($dbc, $c3);
                                    if ($q3 === false) {
                                        die('Error SQL c3: ' . mysqli_error($dbc));
                                    }else {
                                        while ($rrr = mysqli_fetch_row($q3)) {
                                            $nn=utf8_decode($rrr[0]);
                                            echo '<li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="../img/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info"> Por: ' . utf8_encode($nn) . ' / Fecha: ' . $fecha . '</span>
                  <p><a target="_blank" href="../FPDF/Orden.php?idad='. $ida .'">' . utf8_encode($obs) . '</a> </p>
                </div>
              </li>';
                                        }
                                    }
                                }
                            }
                        }
                        $contador++;
                    }
                }
                ?>

              <li>
              <button class="btn btn-warning btn-mini"><a style="color: white;" href="Registros.php">Ver mas..</a></button>
              </li>
            </ul>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>% Stock utilizado V/S Cantidad óptima   (Stock Crítico)</h5>
          </div>
          <div class="widget-content">
            <ul class="unstyled">

                <?php

                    $c1="SELECT `Nombre`, `Stock`, `Stock_Optimo` FROM `material` WHERE `Estado`=TRUE ORDER BY `Stock` DESC ";
                    $q1=mysqli_query($dbc,$c1);
                if ($q1 === false) {
                    die('Error SQL c2: ' . mysqli_error($dbc));
                }else {
                    $nombre = '';
                    $stock = 0;
                    $stock_optimo = 0;
                    $pu = 0;
                    $pr = 0;

                    $nombre1 = '';
                    $stock1 = 0;
                    $stock_optimo1 = 0;
                    $pu1 = 0;
                    $pr1 = 0;
                    $restante1 = 0;

                    $nombre2 = '';
                    $stock2 = 0;
                    $stock_optimo2 = 0;
                    $pu2 = 0;
                    $pr2 = 0;
                    $restante2 = 0;

                    $nombre3 = '';
                    $stock3 = 0;
                    $stock_optimo3 = 0;
                    $pu3 = 0;
                    $pr3 = 0;
                    $restante3 = 0;

                    while ($r = mysqli_fetch_row($q1)) {
                        $nombre = utf8_decode($r[0]);
                        $stock = $r[1];
                        $stock_optimo = $r[2];

                        $porc_uso = round(((100 / $stock_optimo) * $stock), 1);
                        $porc_rest = round(100 - $porc_uso, 1);

                        if ($porc_uso > $pu1) {
                            $nombre1 = $nombre;
                            $stock1 = $stock;
                            $stock_optimo1 = $stock_optimo;
                            $pu1 = $porc_uso;
                            $pr1 = $porc_rest;
                            $restante1 = $stock_optimo1 - $stock1;
                        } else if ($porc_uso > $pu2) {
                            $nombre2 = $nombre;
                            $stock2 = $stock;
                            $stock_optimo2 = $stock_optimo;
                            $pu2 = $porc_uso;
                            $pr2 = $porc_rest;
                            $restante2 = $stock_optimo2 - $stock2;

                        } else if ($porc_uso > $pu3) {
                            $nombre3 = $nombre;
                            $stock3 = $stock;
                            $stock_optimo3 = $stock_optimo;
                            $pu3 = $porc_uso;
                            $pr3 = $porc_rest;
                            $restante3 = $stock_optimo3 - $stock3;

                        }


                    }


                    echo '<li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> ' . $pu1 . '% de: ' . utf8_encode($nombre1) . ' utilizado.<span class="pull-right strong">' . $restante1 . ' restantes (' . $pr1 . ') %</span>
                <div class="progress progress-striped ">
                  <div style="width: ' . $pu1 . '%;" class="bar"></div>
                </div>
              </li>';

                    echo '<li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> ' . $pu2 . '% de: ' . utf8_encode($nombre2) . ' utilizado.<span class="pull-right strong">' . $restante2 . ' restantes (' . $pr2 . ') %</span>
                <div class="progress progress-striped ">
                  <div style="width: ' . $pu2 . '%;" class="bar"></div>
                </div>
              </li>';

                    echo '<li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> ' . $pu3 . '% de: ' . utf8_encode($nombre3) . ' utilizado.<span class="pull-right strong">' . $restante3 . ' restantes (' . $pr3 . ') %</span>
                <div class="progress progress-striped ">
                  <div style="width: ' . $pu3 . '%;" class="bar"></div>
                </div>
              </li>';

                }
                ?>
            </ul>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Despachos Pendientes</h5>
          </div>
          <div class="widget-content nopadding updates collapse in" id="collapseG3">


              <?php

              $ida=0;
              $tipo="";
              $obs="";
              $fecha_entrega="";
              $des="";

              $cont=0;

              $c2 = "SELECT `adquisicion`.`Id_Adquisicion`,`Observacion`,`Tipo`,`Fecha_estimada_entr` FROM `adquisicion` INNER JOIN `det_proveedor` WHERE `adquisicion`.`Id_Adquisicion`=`det_proveedor`.`Id_Adquisicion` AND `Estado_Recepcion`=0 ORDER BY `Fecha_estimada_entr` DESC";
              $q2 = mysqli_query($dbc, $c2);
              if ($q2 === false) {
                  die('Error SQL c2: ' . mysqli_error($dbc));
              }else {
                  while ($r = mysqli_fetch_row($q2)) {
                      $ida = $r[0];
                      $obs = utf8_decode($r[1]);
                      $tipo = $r[2];

                      if ($tipo == 0) {
                          $des = utf8_decode("Compra de materiales");
                      } else if ($tipo == 1) {
                          $des = utf8_decode("Compra de herramientas");

                      } else if ($tipo == 2) {
                          $des = utf8_decode("Adquisicion de servicio");

                      } else {
                          $des = utf8_decode("Adquisicion de arriendo");

                      }

                      $fecha_entrega = $r[3];
                      $dats = preg_split("/[\-]+/", $fecha_entrega);
                      $dia = $dats[2];
                      $mes = $dats[1];
                      $nm = "";
                      if ($mes == 1) {
                          $nm = "ENE";
                      } else if ($mes == 2) {
                          $nm = "FEB";
                      } else if ($mes == 3) {
                          $nm = "MAR";
                      } else if ($mes == 4) {
                          $nm = "ABR";
                      } else if ($mes == 5) {
                          $nm = "MAY";
                      } else if ($mes == 6) {
                          $nm = "JUN";
                      } else if ($mes == 7) {
                          $nm = "JUL";
                      } else if ($mes == 8) {
                          $nm = "AGO";
                      } else if ($mes == 9) {
                          $nm = "SEP";
                      } else if ($mes == 10) {
                          $nm = "OCT";
                      } else if ($mes == 11) {
                          $nm = "NOV";
                      } else {
                          $nm = "DIC";
                      }


                      if ($cont < 3) {
                          echo '<div class="new-update clearfix"><i class="icon-ok-sign"></i>
              <div class="update-done"><a title="Ver orden" href="../FPDF/Orden.php?idad=' . $ida . '" target="_blank"><strong>' . utf8_encode($des) . '</strong></a> <span>' . utf8_encode($obs) . '</span> </div>
              <div class="update-date"><span class="update-day">' . $dia . '</span>' . $nm . '</div>
            </div>';
                      }

                  }
              }
              ?>
        </div>
        
      </div>


        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Materiales escasos</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> Enterate de los materiales que necesitan atención. <a href="Stock.php">Ver...</a> </div>
            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Arriendos efectuados</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGTwo">
              <div class="widget-content">Últimos arrriendos efectuados en la obra. <a href="Arriendos.php">Ver...</a></div>
            </div>
          </div>
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse"> <span class="icon"><i class="icon-magnet"></i></span>
                <h5>Servicios</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGThree">
              <div class="widget-content"> Listado de los servicios adquiridos ultimamente.<a href="Servicios.php">Ver...</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2020 Desarrollo web- webistas by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
</div>

<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.flot.min.js"></script>
<script src="../js/jquery.flot.resize.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.dashboard.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/matrix.interface.js"></script>
<script src="../js/matrix.chat.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.wizard.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.popover.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

<script src="../js/matrix.popover.js"></script>



<div id="gritter-notice-wrapper">
    <div id="gritter-item-2" class="gritter-item-wrapper " style="">
        <div class="gritter-top"></div>
        <div class="gritter-item">
            <div class="gritter-close"></div>
            <div class="gritter-without-image">
                <span class="gritter-title">Inventario</span>

                <?php

                $c4="SELECT `Stock`,`Stock_Optimo` FROM `material` WHERE `Estado_Entrega`=TRUE";
                $q4=mysqli_query($dbc,$c4);
                if ($q2 === false) {
                    die('Error SQL c2: ' . mysqli_error($dbc));
                }else {
                    $s = 0;
                    $so = 0;
                    $contador = 0;
                    while ($rr = mysqli_fetch_row($q4)) {
                        $s = $rr[0];
                        $so = $rr[1];

                        if ($s < $so) {
                            $contador++;
                        }
                    }

                    if ($contador == 0) {
                        echo ' <p>No exiten materiales con % de stock bajo.</p><a style="font-size: 12px;" href="Stock.php"> Ver Aqui!</a>';
                    } else {
                        echo ' <p>Existen ' . $contador . ' materiales que necesitan atención debido a su bajo stock.</p><a href="Stock.php" style="font-size: 12px;"> Ver Aqui!</a>';

                    }

                }
                ?>

            </div>
            <div style="clear:both"></div>
        </div>
        <div class="gritter-bottom"></div>
    </div><div id="gritter-item-5" class="gritter-item-wrapper" style="">
    </div>
</div>
</body>
</html>
<?php

mysqli_close($dbc);
?>
