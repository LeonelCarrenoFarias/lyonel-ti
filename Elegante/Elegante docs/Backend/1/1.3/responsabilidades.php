<?php
session_start();
$nom=utf8_decode($_SESSION["nombre"]);
$rut=$_SESSION["rut"];
$id_cuaderno=$_SESSION["cuaderno"];


?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGROGAP - Libro de campo </title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />


</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">Menú</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Predio" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-globe"></i>Predio</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="active"><i class="fa fa-puzzle-piece"></i><a href="../1.1/inicio.php" >Datos Generales</a></li>
                            <li><i class="fa fa-picture-o"></i><a href="../1.2/croquis.php">Croquis</a></li>
                            <li><i class="fa fa-users"></i><a href="responsabilidades.php">Responsabilidades</a></li>
                            <li><i class="fa fa-phone"></i><a href="../1.4/telefonos.php">Telefonos</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Plantaciones" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pagelines"></i>Plantaciones</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-folder-open-o"></i><a href="../../2/2.1/catastro.php">Catastro</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="../../2/2.2/agregar_planta.php">Agregar plantación</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Fenologia" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Fenologia</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-renren"></i><a href="../../3/3.1/feno_carozos.php">Carozos</a></li>
                            <li><i class="menu-icon fa fa-apple"></i><a href="../../3/3.2/feno_pomaceas.php">Pomáceas</a></li>
                            <li><i class="menu-icon fa fa-thumbs-up"></i><a href="../../3/3.3/feno_drupas.php">Drupas</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Monitoreo" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-check-circle-o"></i>Monitoreo</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-renren"></i><a href="../../4/4.1/moni_carozos.php">Carozos</a></li>
                            <li><i class="menu-icon fa fa-apple"></i><a href="../../4/4.2/moni_pomaceas.php">Pomáceas</a></li>
                            <li><i class="menu-icon fa fa-thumbs-up"></i><a href="../../4/4.3/moni_drupas.php">Drupas</a></li>                             <li><i class="menu-icon fa fa-fire"></i><a href="../../4/4.4/moni_maleza.php">Maleza</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Fertilizaciones" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-flag-o"></i>Fertilización</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="../../5/5.1/aplicaciones.php">Aplicaciones</a></li>
                            <li><i class="menu-icon fa fa-adjust"></i><a href="../../5/5.2/aplicar_ferti.php">Aplicar fertilizante</a></li>
                            <li><i class="menu-icon fa fa-certificate"></i><a href="../../5/5.3/ferti_organico.php">Fertilizante organico</a></li>
                            <li><i class="menu-icon fa fa-play"></i><a href="../../5/5.4/aplicar_organico.php">Aplicar organico</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Herbicidas" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cut (alias)"></i>Herbicidas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="../../6/6.1/aplicaciones_herbi.php">Aplicaciones</a></li>
                            <li><i class="menu-icon fa fa-play"></i><a href="../../6/6.2/aplicar_herbi.php">Aplicar producto</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Agroquimicos" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bug"></i>Agroquimicos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-table"></i><a href="../../7/7.1/resumen_agro.php">Resumen por especie</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="../../7/7.2/aplicaciones_agro.php">Aplicaciones</a></li>
                            <li><i class="menu-icon fa fa-play"></i><a href="../../7/7.3/aplicar_agro.php">Aplicar producto</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Carencias" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plus-square"></i>Carencias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-pencil"></i><a href="../../8/8.1/carencias.php">Resumen por cuartel</a></li>
                            <li><i class="menu-icon fa fa-plus-square-o"></i><a href="../../8/8.2/agregar_carencia.php">Agregar carencia</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Remanentes" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-trash-o"></i>Remanentes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-road"></i><a href="../../9/9.1/remanente.php">Resumen por especie</a></li>
                            <li><i class="menu-icon fa fa-spinner"></i><a href="../../9/9.2/lavado_rema.php">Aplicar lavado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Eventos climatologicos" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-umbrella"></i>Eventos climáticos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sun-o"></i><a href="../../10/10.1/eventos_clima.php">Eventos registrados</a></li>
                            <li><i class="menu-icon fa fa-tag"></i><a href="../../10/10.2/nuevo_evento.php">Nuevo evento</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Higenización" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Hig. Implementos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-refresh"></i><a href="../../11/11.1/higeni_imple.php">Higenización</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="../../11/11.2/añadir_higeni.php">Añadir</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Baños" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-female"></i>Baños</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-refresh"></i><a href="../../12/12.1/higeni_baños.php">Higenización</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="../../12/12.2/añadir_higeni.php">Añadir</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Maquinarias" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Maquinarias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-book"></i><a href="../../13/13.1/reg_maquinaria.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-arrow-right"></i><a href="../../13/13.2/nueva.php">Nueva maquina</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Equipos" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Equipos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-book"></i><a href="../../14/14.1/inventario_equipo.php">Inventario</a></li>
                            <li><i class="menu-icon fa-arrow-right"></i><a href="../../14/14.2/añadir_equipo">Añadir equipo</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Mantenciones" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plus-square"></i>Mantenciónes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-arrows-alt"></i><a href="../../15/15.1/registro_mante.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-play"></i><a href="../../15/15.2/nueva_mante.php">Nueva mantención</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Calibracion de maquinarias" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dashboard (alias)"></i>Calibración maq.</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sitemap"></i><a href="../../16/16.1/calibraciones.php">Calibraciones</a></li>
                            <li><i class="menu-icon fa fa-plus-square"></i><a href="../../16/16.2/nueva_calibracion.php">Nueva calibración</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Emisores de riego" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tint"></i>Emisores</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="../../17/17.1/aforo_emisores.php">Aforo</a></li>
                            <li><i class="menu-icon fa fa-check-circle-o"></i><a href="../../17/17.2/nueva_muestra.php">Nueva muestra</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Necesidad de riego" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Necesidad riego</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-archive"></i><a href="../../18/18.1/registro_necesidad.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-bars"></i><a href="../../18/18.2/modificar_calculo.php">Modificar calculo</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Calicatas" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-anchor"></i>Calicatas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-flag-checkered"></i><a href="../../19/19.1/calicatas.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-edit (alias)"></i><a href="../../19/19.2/añadir_calicata.php">Añadir calicata</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Productos quimicos" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Productos Quim.</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-folder-open-o"></i><a href="../../20/20.1/productos.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-filter"></i><a href="../../20/20.2/efectuar_cambio.php">Efectuar cambio</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Transporte" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-fighter-jet"></i>Transporte</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-check-square-o"></i><a href="../../21/21.1/transporte_check.php">Check-List</a></li>
                            <li><i class="menu-icon fa  fa-desktop"></i><a href="../../21/21.2/registros_check.php">Registros</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" title="Reclamos" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bolt"></i>Reclamos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-exclamation-circle"></i><a href="../../22/22.1/lista_reclamos.php">Lista</a></li>
                            <li><i class="menu-icon fa  fa-envelope-o"></i><a href="../../22/22.2/nuevo_reclamo.php">Nuevo</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../../"><img src="../../../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="../../../"><img src="../../../images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">


                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo utf8_encode($nom); ?>- <img class="user-avatar rounded-circle" src="../../../images/admin.jpg" alt="Imagen del usuario">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="../../login/index.php"><i class="fa fa-power -off"></i>Cerrar sesión</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">

                    <div class="ui-typography">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="typo-headers">
                                            <h3 class="pb-2 display-4">Responsabilidades</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Definición de las responsabilidades</strong><button style="float:right; margin-left: 10px;"  type="button" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp; Imprimir

                                        </button><button style="float:right;" type="button" class="btn btn-success  mb-1" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-plus"></i>&nbsp; Agregar

                                        </button>


                                        <!-- modal para ingresar nueva responsabilidad  -->

                                        <div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mediumModalLabel"><strong>Registrar nuevo(a) responsable</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="bd_responsable.php" method="GET" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="date" id="fecha" name="fecha" readonly required value="<?php echo date("Y-m-d");?>"  class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input required type="text" id="nombre" maxlength="50" name="nombre" placeholder="Nombre" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input required type="text" id="cargo" maxlength="50" name="cargo" placeholder="Cargo ejercido" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input required type="text" maxlength="50" id="responsable" name="responsable" placeholder="Responsabilidad en el predio" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                            </div>
                                        </div><br>
                                        <div class="form-actions form-group">
                                            <button style="float: right; margin-left: 10px;" type="submit" class="btn btn-success mb-1">Guardar</button>
                                            <button style="float: left; margin-left: 10px;" type="button" class="btn btn-danger btn-sm"  class="close" data-dismiss="modal" aria-label="Close">Salir</button>
                                            <button style="float: left; margin-left: 10px;" type="reset" class="btn btn-secondary btn-sm">Borrar</button></div>
                                    </form>
                                </div>
                        </div>

                    </div>
                </div>
            </div>


                                    </div>

                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: left;" scope="row">Fecha A/M/D</th>
                                                            <th style="text-align: left;" scope="row">Nombre completo</th>
                                                            <th style="text-align: left;" scope="row">Cargo desempeñado en predio</th>
                                                            <th style="text-align: left;" scope="row">Responsabilidad en predio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
include "../../connect/connect.php";

$text2="SELECT `id_definicion`, `id_cuaderno`, `fecha`, `nombre`, `cargo`, `descripcion_cargo` FROM `responsabilidad` WHERE `id_cuaderno`=$id_cuaderno ORDER BY `nombre`";
$querry2=mysqli_query($dbc,$text2);


        while($row2=mysqli_fetch_row($querry2)){

                                                    echo'
                                                        <tr>
                                                           <td style="text-align: left;">'.$row2[2].'</td>
                                                           <td style="text-align: left;">'.$row2[3].'</td>
                                                           <td style="text-align: left;">'.$row2[4].'</td>
                                                           <td style="text-align: left;">'.$row2[5].'</td>                     
                                                        </tr>';
}
mysqli_close($dbc);
?>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
            </div>

    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../../assets/js/init/fullcalendar-init.js"></script>


</body>
