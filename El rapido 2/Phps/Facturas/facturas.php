
<?php
session_start();
require '../connect/Connect.php';
$rut=$_SESSION['id'];
$nom=utf8_decode($_SESSION['nombre']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>El Rapido 2 - Inventario y requisiciones</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../css/bootstrap.min.css" />
<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../css/uniform.css" />
<link rel="stylesheet" href="../../css/select2.css" />
<link rel="stylesheet" href="../../css/matrix-style.css" />
<link rel="stylesheet" href="../../css/matrix-media.css" />
<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="../../index.php">El Rapido 2 - Inventario y requisiciones</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse" style="float: left;">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages"  ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom) ?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <li><a href=""><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>
        <li><a href="../../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>

  </ul>
</div>

<!--close-top-serch--> 

<!--sidebar-menu-->

    <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
      <ul>
            <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
            <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
            <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
            <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
            <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
            <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
            <li><a href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
          <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
          <li><a class="active" title="Informes"  href="facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
          <li><a title="Clientes"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Clientes</span></a></li>
      </ul>
    </div>
    <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="../../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Stock</a>
            </div>
            <h1>Registro de Facturas/Guias ingresadas </h1>
          </div>
        <div class="container-fluid"><p style="font-size: 14px;">Detalle y registro de las facturas o guias de despacho que han sido ingresadas al sistema en el modulo de ingreso. Escribe el numero de la factura en el buscador.</p>
            <div class="span12">
                    <div class="widget-content tab-content" style="margin-top: -20px;">
                            <div class="widget-box">

                                <div class="widget-content nopadding">
                                    <div >
                                        <form class="form-horizontal" method="GET" action="../../FPDF/Factura.php" target="_blank">
                                            <div></div>

                                            <div class="control-group material herramienta arriendo servicio">
                                                <label class="control-label"><strong>N° Factura: </strong></label>
                                                <div class="controls">
                                                    <input class="span3" minlength="4" style="height: 4%" required type="number" name="n_fac" id="n_fac">
                                                    <input class="btn-danger span2" disabled type="submit" id="ver" value="Ver">
                                                </div>
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
  <div id="footer" class="span12"> 2022 Desarrollo web- by leonel carreño <a href="">Universidad de Talca</a> </div>
</div>
<!--end-Footer-part-->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery.ui.custom.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.uniform.js"></script>
<script src="../../js/select2.min.js"></script>
<script src="../../js/jquery.dataTables.min.js"></script>
<script src="../../js/matrix.js"></script>
<script src="../../js/matrix.tables.js"></script>
<script>

    $(document).ready(function () {

        $("#n_fac").change(function(){

            var valor = $("#n_fac").val();

            $.ajax({
                type: "GET",
                url: "comp_fact.php",
                data: "desc=" + valor,
                success: function (respuesta) {
                    if (respuesta.estado === 'no') {
                        $("#ver").prop('disabled',true);
                        alert("Documento inexistente.");
                        $("#n_fac").val("");
                    }else{
                        if($("#n_fac").val()===""){

                            $("#ver").prop('disabled',true);
                        }else {
                            $("#ver").prop('disabled',false);
                            $("#ver").click(function () {
                                location.reload();
                            });
                        }
                    }
                }
            });


        });

        $("#n_fac").keyup(function(){

            var valor = $("#n_fac").val();

            $.ajax({
                type: "GET",
                url: "comp_fact.php",
                data: "desc=" + valor,
                success: function (respuesta) {
                    if (respuesta.estado === 'no') {
                        $("#ver").prop('disabled',true);
                    }else if(respuesta.estado === 'yes'){
                        $("#ver").prop('disabled',false);

                    }
                }
            });


        });


    });
</script>
</body>
</html>
