<?php
session_start();
$rut=$_COOKIE['Id'];
$nom=utf8_decode($_COOKIE['Nombre']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Agropoda - Inventario y requisiciones</title>
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
  <h1><a href="../../index.php">Agropoda - Inventario y requisiciones</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom) ?></span><b class="caret"> </b></a>
        <ul class="dropdown-menu">
            <li><a href=""><i class="icon-user"></i> Mi Perfil</a></li>
            <li class="divider"></li>
            <li><a href="../../../index.php"><i class="icon-key"></i> Salir</a></li>
        </ul>
    </li>
  </ul>
</div>

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i></a>
  <ul>
    <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
    <li class="active"><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
    <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li ><a href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
      <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Salida</a> </div>
    <h1>Salida desde inventario</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="span11">
    <div class="row-fluid" style="margin-top: -10px;">
<p style="font-size: 14px;">Modulo para registrar salidas desde el inventario.</p>
        <p><strong>Dato importante: </strong>La salida de elementos del inventario es individual. Debes seleccionar el check de la primera columna, en la fila del item a descontar. Luego ingresas la cantidad y presionas tabulador. El sistema te solicitará ingresar el centro de costo en el cual esta asociada la extracción. </p><p><strong>Dato importante: </strong>Cada salida va asociada a un centro de costo. </p>

        <div class="widget-box">
            <div class="widget-title">
            </div>
              <div class="widget-content nopadding">
              <table class="table table-bordered data-table ">
                <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                    <th>ID</th>
                    <th>Cod. Fabrica</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Stock óptimo</th>
                    <th>Ubicacion</th>
                    <th>Valor unitario</th>
                    <th class="span3">Egreso</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include_once '../connect/Connect.php';

                    $c1="SELECT `code`, `id_fabrica`, `detalle`, `cantidad`, `marca`, `valor`, `ubicacion` FROM `inventario` WHERE `cantidad` > 0 ";
                    $q1=mysqli_query($dbc,$c1);
                    while($r1=mysqli_fetch_row($q1)){

                        $tt="SELECT `Code`, `Stock_Optimo` FROM `det_material` WHERE `Code`=$r1[0]";
                        $qq=mysqli_query($dbc,$tt);

                        $stock_opt=0;
                        while ($rr=mysqli_fetch_row($qq)){
                            $stock_opt=$rr[1];
                        }

                        if($r1[3]<$stock_opt){
                            $estad="Nivel Escaso";
                            $color="lightcoral";
                        }else{
                            $estad="Nivel Optimo";
                            $color="palegreen";

                        }

                        echo'
                            <tr class="gradeX">
                <td class="center" ><input type="checkbox" class="check" /></td>
                <td class="center" >'.$r1[0].'</td>
                <td class="center" >'.$r1[1].'</td>
                <td class="center" >'.$r1[2].'</td>
                <td class="center" >'.$r1[4].'</td>
                <td class="center" >'.$r1[3].'</td>
                <td class="center" >'.$stock_opt.'</td>
                <td class="center" >'.$r1[6].'</td>
                <td class="center" style="text-align: right;">'.$r1[5].'</td>
                <td class="center" ><input class="span10 controls cantidad maximos" disabled type="number" min="0.001" steep="0.001"   ></td>
                </tr>
                ';
                }

                ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>

                    <a class="btn btn-warning btn-large" id="descontar" style="color: white" data-toggle="modal" href="#myAlert" disabled>Descontar Stock</a>

                      <div id="myAlert" class="modal hide " data-controls-modal="myModal" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">

                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                          <h3>Confirmar Salida del inventario</h3>
                        </div>

                        <div class="modal-body">
                          <p id="titulo" style="font-size: 16px;"></p>
                          <p id="contenido" style="font-size: 18px;"><strong><i class="icon icon-check"></i></strong></p>

                            <form  method="get" action="salida_material.php">
                                <div class="controls">
                                    <label for="ide">Codigo:</label>
                                    <input type="number" readonly class="span3" required id="ide"  name="ide" >
                                </div>
                                <div class="controls">
                                    <label for="canti">Responsable:</label>
                                    <input type="text" class="span4" required id="nombre" minlength="1"  name="nombre" >
                                </div>
                                <div class="controls">
                                    <label for="canti">Cantidad:</label>
                                    <input type="number" readonly class="span3" required id="canti" min="0.001" steep="0.001"  name="canti" >
                                </div>

                                <p>Selecciona el centro de costo correspondiente:</p>
                                <div class="controls">
                                    <input list="centros"  type="text" class="span3" required id="centrocosto" name="centrocosto">
                                    <datalist id="centros">
                                        <option value=""></option>
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

                                </div><br><br>
                                <div class="controls">
                                        <button id="conf1" class="btn btn-primary" disabled type="submit">Confirmar</button>
                                        <a data-dismiss="modal" id="cancelar1" class="btn" href="#" onclick="location.reload()">Cancelar</a>                               </div>
                            </form>

                        </div>
                        </div>



                      <div id="myModal" class="modal hide"  data-backdrop="static" data-keyboard="false" aria-hidden="true" style="display: none;">
                          <div class="modal-header">
                              <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                              <h3>Operación realizada</h3>
                          </div>
                          <div class="modal-body">
                              <p id="titulo_final">Se han descontado el siguiente item del inventario:</p>
                              <p id="contenido_final"><i class="icon icon-bookmark"></i></p>
                          </div>
                      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 Desarrollo web- by leonel carreño <a href="">Universidad de Talca</a> </div>
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

<script language="JavaScript">
    //funcion para materiales


    $(".check").click(function () {
        $(this).closest("tr").find("input.cantidad").attr('disabled',false);
        $(".check").prop('disabled',true);
        var stock= $(this).closest("tr").find("td:eq(5)").text();
        $(this).closest("tr").find("input.cantidad").attr('max', stock);


        $(".cantidad").focus();
        $(".cantidad").change(function(){
            var cantidad=$(this).closest("tr").find("input.cantidad").val();

            if(parseFloat(cantidad) > parseFloat(stock)){
            
                $(this).val("");
            }else if(cantidad < 0.001){
                                $(this).val("");

            }else{
                $("#descontar").trigger("click");
            }
            var id= $(this).closest("tr").find("td:eq(1)").text();
            $("#ide").val(id);
            $("#canti").val(cantidad);

            var titulo="";
            if(cantidad<=1){
                titulo = "¿Desea extraer "+cantidad+" unidad del elemento :";

            } else{
                titulo = "¿Desea extraer "+cantidad+" unidades del elemento :";

            }
            var contenido = $(this).closest("tr").find("td:eq(3)").text();
            var ubicacion = $(this).closest("tr").find("td:eq(7)").text();
            document.getElementById("titulo").innerHTML = (titulo);
            document.getElementById("contenido").innerHTML = (contenido);

            var contenid;
            var titulo_fin="Salida de item :";
            contenid = "Se han descontado " + cantidad + " unidades de "+contenido+".";

            $("#nombre").focus();
             $("#nombre").change(function(){
                    if($(this).val() === ""){
                        $("#nombre").prop('readonly',false);
                    }else{
                        $("#nombre").prop('readonly',true);
                        $("#centrocosto").focus();
                    }                            
                 
             });
                            
            $("#centrocosto").change(function(){
                var desc=$(this).val();
                $.ajax({
                    type: "GET",
                    url: "comprobar.php",
                    data:"valor="+desc,
                    success: function(respuesta) {
                        if(respuesta.des = "si"){
                            $("#centrocosto").prop('readonly',true);
                            $("#conf1").prop('disabled',false);
                        }else{
                            alert("No existe tal centro de costo.");
                            $("#centrocosto").val("");
                            $("#conf1").prop('disabled',true);
                        }
                    }
                });

            });


        });

    });



</script>
</body>
</html>
