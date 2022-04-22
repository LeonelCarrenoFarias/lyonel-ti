<?php
session_start();
require '../connect/Connect.php';
$rut=$_SESSION['id'];
$nom=utf8_decode($_SESSION['nombre']);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom)?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <li><a href=""><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>
        <li><a href="../../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--start-top-serch-->
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar">
  <ul>
    <li ><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
    <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
    <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li ><a title="Solicitudes" href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
      <li class="active"><a title="Informes"  href="Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
      <li><a title="Informes"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
      <li><a title="Clientes"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Clientes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Informes</a>
    <h1>Seleccionador de informes del sistema.</h1>
    </div>
  <div class="container-fluid"><p></p><hr>
      <div class="row-fluid"><p style="font-size: 14px;">Módulo en el cual podras seleccionar que tipo de informe deseas obtener.</p>
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Nuevo informe</h5>
          </div>
          <div class="widget-content nopadding">
                    <form class="form-horizontal" method="GET" name="basic_validate" id="basic_validate" action="" target="_blank">
                            <div class="control-group">
                                <label class="control-label">Tipo de informe: </label>
                                <div class="controls">
                                  <select class="span3" id="informe" name="informe" required>
                                      <option  selected value=""></option>
                                      <option title="Informe total o parcial de las compras realizadas e ingresadas a sistema." value="1">Informe de ingresos al sistema.</option>
                                      <option title="Informe total o parcial de las ventas realizadas e ingresadas a sistema." value="2">Informe de salidas del sistema.</option>
                                      <option value="3">Informe por cliente</option>
                                      <option value="4">Informe de inventario</option>
                                  </select>
                                </div>
                            </div>
                        <div class="control-group">
                            <label class="control-label">Seleccione el cliente: </label>
                            <div class="controls">
                                <input list="ist" disabled class="span3" type="text" id="centrocosto" name="centrocosto" required>
                                <datalist id="ist">
                                <option value="0">Todos</option>
                                    <?php
                                    require '../connect/Connect.php';

                                    $t1="SELECT `Id_Centro`,`Nombre` FROM `centrocosto` WHERE 1";
                                    $q1=mysqli_query($dbc,$t1);
                                    while($row=mysqli_fetch_row($q1)){
                                        echo'<option value="'.$row[0].'">'.$row[1].'</option>';
                                    }
                                    mysqli_close($dbc);
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Seleccione la bodega: </label>
                            <div class="controls">
                                <input list="ist2" disabled type="text" class="span3" id="bodega" name="bodega" required>
                                <datalist id="ist2" >
                                <option value="0">Todas</option>
                                    <?php
                                    require '../connect/Connect.php';

                                    $t1="SELECT * FROM `bodega` WHERE 1";
                                    $q1=mysqli_query($dbc,$t1);
                                    while($row=mysqli_fetch_row($q1)){
                                        echo'<option value="'.$row[0].'">'.$row[1].'</option>';
                                    }
                                    mysqli_close($dbc);

                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Seleccione modo de informe: </label>
                            <div class="controls">

                                <div style="display: flex;"> <input required type="radio" id="rango"
                                                                    name="rang" value="1" disabled>
                                    <label for="rango">Rango de fechas</label></div>

                                <div style="display: flex;">  <input required type="radio" id="consolidado"
                                                                                                  name="rang" value="2" disabled>     <label for="consolidado">Consolidado</label>

                                </div></div>


                        </div>

                        <div style="display: flex;">
                            <div class="control-group">
                                <label class="control-label">Desde: </label>
                                <div class="controls">
                                    <input readonly class="span12" type="date" name="fecha1" id="fecha1">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hasta: </label>
                                <div class="controls">
                                    <input readonly class="span12" type="date" name="fecha2" id="fecha2">
                                </div>
                            </div>
                        </div>


                            <div class="control-group">
                                <div class="controls" >
                                    <button style="color: white"  id="mostrar"  class="btn btn-primary btn-large"  type="submit">Mostrar PDF</button>                                    <button style="color: white"  id="reset"  class="btn btn-danger btn-large"  type="reset" onclick="location.reload()">Actualizar</button>

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
  <div id="footer" class="span12"> 2021 Desarrollo web- by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
</div>
<!--end-Footer-part-->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery.ui.custom.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.uniform.js"></script>
<script src="../../js/select2.min.js"></script>
<script src="../../js/jquery.validate.js"></script>
<script src="../../js/matrix.js"></script>
<script src="../../js/matrix.form_validation.js"></script>
<script language="JavaScript">
    $( function() {

        function ucfirst(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        $("#desc").keyup(function(){
            // force: true to lower case all letter except first
            var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
            // to capitalize all words
            $(this).val(cp_value );
        });
        $("#cat").keyup(function(){
            // force: true to lower case all letter except first
            var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
            // to capitalize all words
            $(this).val(cp_value );
        });

$("#mostrar").click(function(){
                       location.reload();
                    });

        $("#informe").change(function(){
            var val=$(this).val();

            if($(this).val() === "1"){
                $("#mostrar").prop('disabled',true);

                $("#centrocosto").val("");
                $("#bodega").val("");
                $("#centrocosto").prop('disabled',true);
                $("#bodega").prop('disabled',true);
                $("#rango").prop('disabled',false);
                $("#consolidado").prop('disabled',false);
                $("#fecha1").prop('readonly',true);
                $("#fecha2").prop('readonly',true);

                $("#rango").click(function(){

                    $("#mostrar").prop('disabled',true);
                    $("#fecha1").prop('readonly',false);
                    $("#fecha2").prop('readonly',false);


                    $("#fecha1").change(function(){
                        $(this).prop('readonly',true);

                        $("#fecha2").change(function(){
                            $("#mostrar").prop('disabled',false);
                        });
                    });

                    $("#fecha2").change(function(){
                        $(this).prop('readonly',true);

                        $("#fecha1").change(function(){
                            $("#mostrar").prop('disabled',false);
                        });
                    });

                    $("#basic_validate").prop('action','../../FPDF/Ingresos_sistema.php');

                    $("#mostrar").click(function(){
                       location.reload();
                    });

                });
                $("#consolidado").click(function(){
                    $("#mostrar").prop('disabled',false);
                    $("#fecha1").prop('disabled',true);
                    $("#fecha2").prop('disabled',true);
                    $("#fecha1").val("");
                    $("#fecha2").val("");


                    $("#basic_validate").prop('action','../../FPDF/Ingresos_sistema_con.php');


                });


            }else if(val==="2"){
                $("#mostrar").prop('disabled',true);
                $("#centrocosto").val("");
                $("#bodega").val("");
                $("#centrocosto").prop('disabled',true);
                $("#bodega").prop('disabled',true);
                $("#rango").prop('disabled',false);
                $("#consolidado").prop('disabled',false);
                $("#fecha1").prop('readonly',true);
                $("#fecha2").prop('readonly',true);

                $("#rango").click(function(){

                    $("#mostrar").prop('disabled',true);
                    $("#fecha1").prop('readonly',false);
                    $("#fecha2").prop('readonly',false);



                    $("#fecha1").change(function(){
                        $(this).prop('readonly',true);

                        $("#fecha2").change(function(){
                            $("#mostrar").prop('disabled',false);
                        });
                    });

                    $("#fecha2").change(function(){
                        $(this).prop('readonly',true);

                        $("#fecha1").change(function(){
                            $("#mostrar").prop('disabled',false);
                        });
                    });
                    $("#basic_validate").prop('action','../../FPDF/Salidas_sistema.php');

                    $("#mostrar").click(function(){
                        location.reload();
                    });

                });
                $("#consolidado").click(function(){
                    $("#mostrar").prop('disabled',false);
                    $("#fecha1").prop('readonly',true);
                    $("#fecha2").prop('readonly',true);
                    $("#fecha1").val("");
                    $("#fecha2").val("");

                    $("#basic_validate").prop('action','../../FPDF/Salidas_sistema_con.php');

                });

            } else if(val==="3"){
                $("#mostrar").prop('disabled',true);

                $("#centrocosto").val("");
                $("#bodega").val("");
                $("#centrocosto").prop('disabled',false);
                $("#bodega").prop('disabled',true);
                $("#rango").prop('disabled',true);
                $("#consolidado").prop('disabled',true);
                $("#fecha1").prop('readonly',true);
                $("#fecha2").prop('readonly',true);

                $("#centrocosto").change(function(){
                        var desc=$(this).val();
                        $.ajax({
                            type: "GET",
                            url: "comprobar.php",
                            data:"valor="+desc,
                            success: function(respuesta) {
                                if(respuesta.st===1){
                                    $("#centrocosto").prop('readonly',true);
                                    $("#rango").prop('disabled',false);
                                    $("#consolidado").prop('disabled',false);

                                }else{
                                    alert("No existe tal centro de costo.");
                                    $("#centrocosto").val("");
                                }
                            }
                        });

                });

                    $("#rango").click(function(){

                        $("#mostrar").prop('disabled',true);
                        $("#fecha1").prop('readonly',false);
                        $("#fecha2").prop('readonly',false);

                        $("#fecha1").change(function(){
                            $(this).prop('readonly',true);

                            $("#fecha2").change(function(){
                                $("#mostrar").prop('disabled',false);
                            });
                        });

                        $("#fecha2").change(function(){
                            $(this).prop('readonly',true);

                            $("#fecha1").change(function(){
                                $("#mostrar").prop('disabled',false);
                            });
                        });
                        $("#basic_validate").prop('action','../../FPDF/Centro_costo.php');

                    });

                    $("#consolidado").click(function(){
                        $("#mostrar").prop('disabled',false);
                        $("#fecha1").prop('readonly',true);
                        $("#fecha2").prop('readonly',true);
                        $("#fecha1").val("");
                        $("#fecha2").val("");

                        $("#basic_validate").prop('action','../../FPDF/Centro_costo_con.php');


                    });

            }else if(val==="4"){
                $("#mostrar").prop('disabled',true);

                $("#centrocosto").val("");
                $("#bodega").val("");
                $("#bodega").prop('disabled',false);
                $("#centrocosto").prop('disabled',true);
                $("#rango").prop('disabled',true);
                $("#consolidado").prop('disabled',true);
                $("#fecha1").prop('readonly',true);
                $("#fecha2").prop('readonly',true);

                $("#bodega").change(function(){
                    var valor = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "comprobar2.php",
                        datos: "valor="+valor,
                        success: function (respuesta) {
                            if(respuesta.des = "si"){
                                $("#bodega").prop('readonly',true);
                                $("#mostrar").prop('disabled',false);
                                $("#basic_validate").prop('action','../../FPDF/Inventario.php');

                            }else{
                                alert("No existe tal centro de costo.");
                                $("#bodega").val("");
                            }
                        }
                    });
                });


            }
        });

    });
</script>

</body>
</html>
