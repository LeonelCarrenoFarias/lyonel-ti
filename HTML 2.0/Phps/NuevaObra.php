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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom)?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <!--<li><a href="Perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>-->
        <li><a href="../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>
    <!--<li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Mensajes</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="Nuevomsj.html"><i class="icon-plus"></i> Nuevo Mensaje</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="Bandeja_entrada.html"><i class="icon-envelope"></i> Bandeja Entrada</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="Bandeja_Salida.html"><i class="icon-arrow-up"></i> Bandeja Salida</a></li>
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
    <li class="active"><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
    <li><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
    <li><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
    <li ><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li ><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="Indicadores.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Nueva Obra</a>
    <h1>Crear Obra</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Validación de datos</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="GET" action="Nueva_obra.php" name="basic_validate" id="basic_validate" >
              <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                  <input  type="text" name="nom" id="nom" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tipo</label>
                <div class="controls">
                  <select name="select" id="select" required >
                    <option value="0"  >Obra Civil</option>
                    <option value="1" selected>Construcción Industrial</option>
                    <option value="2" >Construcción de Silos</option>
                    <option value="3">Mantención / Reparación</option>
                  </select>                </div>
              </div>
                <div class="control-group">
                    <label class="control-label">Ciudad</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="city" id="city" required />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Dirección</label>
                    <div class="controls">
                        <input class="span4"  type="text" name="adress" id="adress" required />
                    </div>
                </div>

              <div class="control-group">
                <label class="control-label">Fecha Inicio</label>
                <div class="controls">
                  <input  type="date" name="date1" id="date1" required />
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Fecha Término</label>
              <div class="controls">
                <input  type="date" name="date2" id="date2" required />
              </div>
              </div>

              <div class="control-group">
                <label class="control-label">Descripción</label>
                <div class="controls">
                  <input class="span6"  type="text" name="desc" id="desc" required />
                </div>
              </div>

              <div class="form-actions">
                <button id="guardar" class="btn btn-warning btn-large" type="submit" onclick="alerta1()">Crear</button>
              </div>

            </form>
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
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>
<script language="JavaScript">


    function alerta1() {
        alert("La Obra ha sido creada exitosamente");

    }

</script>


</body>
</html>
