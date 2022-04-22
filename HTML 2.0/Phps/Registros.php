<?php
session_start();
require_once 'Connect.php';
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>



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
  <button type="submit" class="tip-bottom" title="Buscar"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
    <ul>
        <li><a href="Indicadores.php"><i class="icon icon-dashboard"></i> <span>Indicadores</span></a> </li>
        <li ><a href="Orden.php"><i class="icon icon-edit"></i> <span>Orden de Compra</span></a> </li>
        <li><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
        <li class="active"><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
        <li><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
        <li ><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
        <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
        <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
        <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
        <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
        <li><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
    </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Registros</a> </div>
    <h1>Registros de ordenes de compra</h1>
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
              <h5>Compras de Materiales</h5>
              <!--<div class="span3" style="float: right">
                <select class="span11" style="display: none; ">
                  <option value="0">Obra</option>
                  <option value="0">Chimbarongo</option>
                  <option value="1">Sta. Cruz</option>
                  <option value="2">"Alamos"</option>
                  <option value="3">Essbio Talca</option>
                </select><br>
              </div>-->
            </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Descripción</th>
                    <th>Enlace</th>
                    <th>Fecha</th>
                      <th>Obra</th>
                      <th>Estado</th>
                    <th>#</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                  include'Connect.php';

                  $c="SELECT DISTINCT `Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `Estado`, `Id_Persona`,`Observacion` FROM `adquisicion` WHERE `Estado`=TRUE";
                  $q=mysqli_query($dbc,$c);

                  $nom_prov="";
                  $id=0;
                  $nom_obra="";
                    $nnn="";
                    $idaux=0;
                  while($r=mysqli_fetch_row($q)){
                      $id=$r[0];
                        $nnn=utf8_decode($r[8]);

                      $con="SELECT `Estado_Recepcion` FROM `adquisicion` WHERE `Id_Adquisicion`=$id";
                      $que=mysqli_query($dbc,$con);
                      $res=true;
                      $color="";
                      $estado="";
                      $href="#myAlert3";
                      $href2="#myAlert";
                      while($re=mysqli_fetch_row($que)){
                          $res=$re[0];

                          if($res==0){
                              $estado="Proceso De Compra";
                              $color="khaki";
                              $href="#myAlert3";
                              $href2="#myAlert";

                          }else{
                              $estado="Recibida";
                              $color="palegreen";
                              $href="";
                              $href2="";
                          }
                      }



                      $c2="SELECT `Nombre` FROM `proveedor` INNER JOIN `det_proveedor` WHERE `det_proveedor`.`Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";
                      $q2=mysqli_query($dbc,$c2);

                      while ($r2=mysqli_fetch_row($q2)){
                          $nom_prov=utf8_decode($r2[0]);
                      }

                      $c3="SELECT `Nombre` FROM `obra` WHERE `obra`.`Id_Obra`=$r[1]";
                      $q3=mysqli_query($dbc,$c3);
                        while($r3=mysqli_fetch_row($q3)){
                            $nom_obra=utf8_decode($r3[0]);
                        }

                      $idaux=$id;
                      echo'
                      <tr class="odd gradeX" style="background-color:'.$color.' ">
                        <td class="">'.$id.'</td> 
                        <td style="text-align: left" class="">'.utf8_encode($nom_prov).'</td>
                        <td style="text-align: left " class="center span3">'.utf8_encode($nnn).'</td>
                        <td style="text-align: center " class="center "><a href="../FPDF/Orden.php?idad='.$id.'" target="_blank">PDF</a></td>
                        <td style="text-align: center" class="">'.$r[2].'</td>
                        <td style="text-align: center" class="center">'.utf8_encode($nom_obra).'</td>
                        <td style="text-align: center" class="center" >'.utf8_encode($estado).'</td>
                        <td style="text-align: right" class="center " ><a class="anulacion" style="color: tomato" data-toggle="modal" href="'.$href2.'">Anular</a><br><a class="recepcion" style="color: green;" data-toggle="modal" href="'.$href.'">Recepcionar</a></td>
                      </tr>';

                  }
?>
                  </tbody>
                </table>








                  <div id="myAlert" class="modal hide " aria-hidden="true" style="display: none;">

                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Confirmación</h3>
                  </div>

                  <div class="modal-body">
                    <p> ¿Desea anular la siguiente orden de compra de materiales? Nota: esto es definitivo :</p>
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Proveedor</th>
                          <th>Descripción</th>
                          <th>Fecha</th>
                          <th>Obra</th>
                      </tr>
                      </thead>
                        <tbody>
                         <tr>
                            <td id="iden1"></td>
                            <td id="prov1"></td>
                            <td id="descr1"></td>
                            <td id="date1"></td>
                            <td id="obra1"></td>
                         </tr>
                        </tbody>
                    </table>
                  </div>
                  <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" data-toggle="modal" href="#myModal" id="confirmar1">Confirmar</a> <a data-dismiss="modal" class="btn" href="#">Cancelar</a> </div>
                </div>




                <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" id="cerrar1" type="button">×</button>
                    <h3>Eliminar Orden de Compra</h3>
                  </div>
                  <div class="modal-body">
                    <p>La orden ha sido eliminada con éxito.</p>
                  </div>
                </div>






                <!-- lista la parte de anular orden de compra de materiales-->








                <div id="myAlert3" class="modal hide" aria-hidden="true" style="display: none; width: 60%; align-self: center; text-align: left;">

                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Recepción de pedido</h3>
                  </div>

                  <div class="modal-body">
                    <p> Ingresa datos solicitados:</p>
                    <form class="form-horizontal" method="GET"  action="recepcion_pedido.php" name="basic_validate" id="basic_validate">
                        <div class="control-group">
                            <label class="control-label">N° Orden de compra:</label>
                            <div class="controls">
                                <input class="span4"  required readonly type="number" name="orden1" id="orden1" value="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">N° Factura:</label>
                            <div class="controls">
                                <input class="span4"   minlength="0" type="number" name="fact1" id=fact1" value="0">
                            </div>
                        </div>
                      <div class="control-group">
                          <label class="control-label">N° Guia Despacho:</label>
                          <div class="controls">
                              <input class="span4"  minlength="0" type="number" name="guia1" id="guia1" value="0">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Fecha Recepción:</label>
                          <div class="controls">
                              <input class="span4" required value="<?php echo date("Y-m-d");?>" type="date" name="f_rec1" id="f_rec1">
                          </div>
                      </div>
                        <div class="control-group">
                            <label class="control-label">Ciudad origen:</label>
                            <div class="controls">
                                <input class="span6" required type="text" name="city1" id="city1">
                            </div>
                        </div>
                      <div class="control-group">
                          <label class="control-label">Ciudad destino:</label>
                          <div class="controls">
                              <input class="span6" required type="text" name="dest1" id="dest1">
                              <input type="hidden" name="lista" id="lista">

                          </div>
                      </div>
                        <div class="control-group">

                        <table  class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID item</th>
                                <th>Producto</th>
                                <th>Fecha Venc.</th>
                                <th>N° Lote</th>
                                <th>Unidad</th>

                            </tr>
                            </thead>
                            <tbody id="tabla1" >


                            </tbody>
                        </table>
                        </div>
<br>
                  <div class="control-group">
                      <button type="submit" class="btn btn-primary" id="aceptar" >Confirmar</button>
                      <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
                  </div>
                    </form>
                  </div>
                </div>



              </div>
          </div>
        </div>
        <div id="tab2" class="tab-pane">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Compras de Herramientas</h5>
                <!--<div class="span3" style="float: right">
                  <select class="span11" style="display: none; ">
                    <option value="0">Obra</option>
                    <option value="1">Chimbarongo</option>
                    <option value="2">Sta. Cruz</option>
                    <option value="3">"Alamos"</option>
                    <option value="4">Essbio Talca</option>
                  </select><br>
                </div>-->
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  <thead>
                  <tr>
                    <th>ID Orden</th>
                    <th>Proveedor</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Enlace</th>
                      <th>Obra</th>
                      <th>Estado</th>
                    <th>#</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                  include'Connect.php';

                  $c="SELECT `adquisicion`.`Id_Adquisicion`, `Id_Obra`, `Fecha_Adqui`, `Fecha_Necesitada`, `Monto_Bruto`, `Monto_Neto`, `adquisicion`.`Estado`, `Id_Persona`,`Observacion` FROM `adquisicion` INNER JOIN `det_herramienta` WHERE `adquisicion`.`Id_Adquisicion`=`det_herramienta`.`Id_Adqui` AND `adquisicion`.`Estado`=true";
                  $q=mysqli_query($dbc,$c);

                  $nom_prov="";
                  $id=0;
                  $nom_obra="";

                  while($r=mysqli_fetch_row($q)){
                      $id=$r[0];


                      $con="SELECT `Id_Guia` FROM `det_despacho` WHERE `det_despacho`.`Id_Adqui`=$id";
                      $que=mysqli_query($dbc,$con);

                      $res=true;
                      $color="";
                      $estado="";
                      $href="#myAlert2";
                      $href2="#myAlert4";
                      while($re=mysqli_fetch_row($que)){
                          $res=$re[0];

                          if($res=null or $res=0){
                              $estado="Proceso Compra";
                              $color="khaki";
                              $href="#myAlert2";
                              $href2="#myAlert4";

                          }else{
                              $estado="Recibida";
                              $color="palegreen";
                              $href="";
                              $href2="";
                          }
                      }



                      $c2="SELECT `Nombre` FROM `proveedor` INNER JOIN `det_proveedor` WHERE `det_proveedor`.`Id_Adquisicion`=$id AND `det_proveedor`.`Id_Proveedor`=`proveedor`.`Id_Proveedor`";
                      $q2=mysqli_query($dbc,$c2);

                      while ($r2=mysqli_fetch_row($q2)){
                          $nom_prov=$r2[0];
                      }

                      $c3="SELECT `Nombre` FROM `obra` WHERE `obra`.`Id_Obra`=$r[1]";
                      $q3=mysqli_query($dbc,$c3);
                      while($r3=mysqli_fetch_row($q3)){
                          $nom_obra=$r3[0];
                      }


                      echo'
                      <tr class="odd gradeX" style="background-color:'.$color.' ">
                        <td>'.$id.'</td>
                        <td>'.utf8_decode($nom_prov).'</td>
                        <td>'.utf8_decode($r[8]).'</td>
                        <td>'.utf8_decode($r[3]).'</td>
                        <td class="center"><a href="../FPDF/Orden.php?id='.$id.'" target="_blank">Documento PDF</a></td>
                        <td class="center">'.utf8_decode($nom_obra).'</td>
                        <td class="center" >'.utf8_decode($estado).'</td>
                        <td class="center" ><a class="anulacion2" style="color: tomato" data-toggle="modal" href="'.$href2.'">Anular</a><br><a class="recepcion2" style="color: green" data-toggle="modal" href="'.$href.'">Recepcionar</a></td>
                      </tr>';


                  }
                  ?>
                  </tbody>
                </table>









                <div id="myAlert2" class="modal hide " aria-hidden="true" style="display: none;">

                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Confirmación</h3>
                  </div>

                  <div class="modal-body">
                    <p> ¿Desea anular la siguiente orden de compra de Herramientas? Nota: esto es definitivo :</p>
                    <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Proveedor</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Obra</th>
                      </tr>
                      </thead>
                      <tbody>

                      <tr class="odd gradeX">
                          <td id="iden2"></td>
                          <td id="prov2"></td>
                          <td id="descr2"></td>
                          <td id="date2"></td>
                          <td id="obra2"></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" data-toggle="modal" href="#myModal2" id="confirmar2">Confirmar</a> <a data-dismiss="modal" class="btn" href="#">Cancelar</a> </div>
                </div>

                <div id="myModal2" class="modal hide " aria-hidden="true" style="display: none;">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" id="cerrar2" type="button">×</button>
                    <h3>Eliminar Orden de Compra</h3>
                  </div>
                  <div class="modal-body">
                    <p>La orden ha sido eliminada con éxito.</p>
                  </div>
                </div>



                <div id="myAlert4" class="modal hide " aria-hidden="true" style="display: none;">

                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                    <h3>Ingreso</h3>
                  </div>

                  <div class="modal-body">
                    <p> Ingresa el N° de la Guia de Despacho</p>
                    <form class="form-horizontal" method="post"  name="basic_validate" id="basic_validate2" >
                        <div class="control-group">
                            <label class="control-label">N° Guia Despacho:</label>
                            <div class="controls">
                                <input required type="number" name="guia2" id="guia2" value="0">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Ciudad:</label>
                            <div class="controls">
                                <input required  type="text" name="city2" id="city2">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Fecha Recepción:</label>
                            <div class="controls">
                                <input value="<?php echo date("Y-m-d");?>" type="date" name="f_rec2" id="f_rec2">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Lote:</label>
                            <div class="controls">
                                <input  type="number" name="lote2" id="lote2">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">F. Vencimiento:</label>
                            <div class="controls">
                                <input  type="date" name="venc2" id="venc2">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Destino:</label>
                            <div class="controls">
                                <input required type="text" name="dest2" id="dest2">
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer"> <button data-dismiss="modal" class="btn btn-primary" id="aceptar2" disabled data-toggle="modal" href="#myModal4">Confirmar</button> <a data-dismiss="modal" class="btn" href="#" onclick="location.reload()">Cancelar</a> </div>
                </div>


                <div id="myModal4" class="modal hide " aria-hidden="true" style="display: none;">
                  <div class="modal-header">
                    <button data-dismiss="modal" id="btn2" class="close" type="button" onclick="location.reload()">×</button>
                    <h3>Recepcion del pedido</h3>
                  </div>
                  <div class="modal-body">
                    <p>Guia de despacho ingresada con exito.</p>
                  </div>
                </div>



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



<script language="JavaScript">
    /**
     $(".anulacion").click(function(e) {
                                    e.preventDefault();

                                    var nombre = $("#nombre").val(),
                                        apellido = $("#apellido").val(),
                                        edad = $("#edad").val(),

                                        //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
                                        datos = {"nombre":nombre, "apellido":apellido,"edad":edad};

                                    $.ajax({
                                        url: "datos.php",
                                        type: "POST",
                                        data: datos
                                    }).done(function(respuesta){
                                        if (respuesta.estado === "ok") {
                                            console.log(JSON.stringify(respuesta));

                                            var nombre = respuesta.nombre,
                                                apellido = respuesta.apellido,
                                                edad = respuesta.edad;

                                            $(".respuesta").html("Servidor:<br><pre>"+JSON.stringify(respuesta, null, 2)+"</pre>");
                                        }
                                    });
                                });
     **/

    $(".anulacion").click(function(e) {
        e.preventDefault();

        var ide = $(this).closest("tr").find("td:eq(0)").text();
        var prove = $(this).closest("tr").find("td:eq(1)").text();
        var descripcion = $(this).closest("tr").find("td:eq(2)").text();
        var fecha = $(this).closest("tr").find("td:eq(4)").text();
        var obra = $(this).closest("tr").find("td:eq(5)").text();


        document.getElementById("iden1").innerHTML=(ide);
        document.getElementById("prov1").innerHTML=(prove);
        document.getElementById("descr1").innerHTML=(descripcion);
        document.getElementById("date1").innerHTML=(fecha);
        document.getElementById("obra1").innerHTML=(obra);


    });

    $(".anulacion2").click(function(e) {
        e.preventDefault();

        var ide = $(this).closest("tr").find("td:eq(0)").text();
        var prove = $(this).closest("tr").find("td:eq(1)").text();
        var descripcion = $(this).closest("tr").find("td:eq(2)").text();
        var fecha = $(this).closest("tr").find("td:eq(4)").text();
        var obra = $(this).closest("tr").find("td:eq(5)").text();


        document.getElementById("iden2").innerHTML=(ide);
        document.getElementById("prov2").innerHTML=(prove);
        document.getElementById("descr2").innerHTML=(descripcion);
        document.getElementById("date2").innerHTML=(fecha);
        document.getElementById("obra2").innerHTML=(obra);


    });

    $("#confirmar1").click(function (e) {

        e.preventDefault();
        var ident1=$("#iden1").text();
            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
            datos = {"iden":ident1};
        $.ajax({
            url: "anular.php",
            type: "GET",
            data: datos
        }).done(function(respuesta){
            if (respuesta.estado = "ok") {
                console.log(JSON.stringify(respuesta));

                var id = respuesta.iden;

                if(id > 0){
                    alert("Json efectivo");
                }
            }
        });
    });

    $("#confirmar2").click(function (e) {

        e.preventDefault();
        var ident1=$("#iden2").text();
        //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
        datos = {"iden":ident1};
        $.ajax({
            url: "anular2.php",
            type: "GET",
            data: datos
        }).done(function(respuesta){
            if (respuesta.estado = "ok") {
                console.log(JSON.stringify(respuesta));

                var id = respuesta.iden;

                if(id > 0){
                    alert("Json efectivo");
                }
            }
        });
    });

    $("#cerrar1").click(function(){
        window.location.replace("Registros.php")
    });

    $("#cerrar2").click(function(){
        window.location.replace("Registros.php")
    });


    function ucfirst(string){
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    $("#city1").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $("#dest1").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });

    $(".recepcion").click(function(e){
        e.preventDefault();
        $("#tabla1").empty();

        var ide = $(this).closest("tr").find("td:eq(0)").text();

        $("#orden1").val(ide);

        var n1="ident";
        var n2="nom_item";
        var n3="venc";
        var n4="lote";
        var n5="unidad";
        var cont=1;
        var i=n1+cont;
        var n= n2+cont;
        var v=n3+cont;
        var l=n4+cont;
        var u=n5+cont;
        var valor1=0;
        var valor2=0;
        e.preventDefault();
        //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
        datos = {"id":ide};
        $.ajax({
            url: "detalle_recepcion.php",
            type: "GET",
            data: datos
        }).done(function (respuesta) {
            console.log("success");
            $.each(respuesta, function(index, val) {

                    $("tbody#tabla1").append('<tr><td class="span2"><input class="span12" readonly type="number" name='+i+' id='+i+' value='+parseInt(val[0])+'></td><td class="span5"><input class="span12" type="text" readonly name='+n+' id='+n+' value='+val[1]+'></td><td class="span2"><input class="span12" type="date" name='+v+' id='+v+'></td><td class="span3"><input class="span12" required type="number" value="10101" maxlength="11" name='+l+' id='+l+'></td><td class="span3"><input class="span12" required list="tips" type="text" name='+u+' id='+u+'><datalist id=tips><option value="Kilo"></option><option value="Tira"></option><option value="Carga"></option><option value="Paquete"></option><option value="Litro"></option><option value="Plancha"></option><option value="Unidad"></option><option value="Saco"></option><option value="Barra"></option></option><option value="Tonelada"></datalist></td></tr>');

                    cont++;
                    i=n1+cont;
                    n=n2+cont;
                    v=n3+cont;
                    l=n4+cont;
                    u=n5+cont;
            });
            cont=cont-1;
            $("#lista").val(cont);
        });


    });



    //recepcion de guia de despacho de materiales


    /*$(".recepcion").click(function(e){
            e.preventDefault();
            var ide = $(this).closest("tr").find("td:eq(0)").text();

        $("#aceptar").click(function(e){

            e.preventDefault();
            var guia=$("#guia1").val();
            var ciudad=$("#city").val();
            var fecha=$("#f_rec1").val();
            var lote=$("#lote1").val();
            var venc=$("#venc1").val();
            var destino=$("#dest1").val();

            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)

            datos = {"id":ide,"g":guia,"c":ciudad,"f":fecha,"l":lote,"d":destino,"v":venc};

            $.ajax({
                url: "recepcion_pedido.php",
                type: "GET",
                data: datos
            }).done(function(respuesta){
                if (respuesta.estado = "ok") {
                    console.log(JSON.stringify(respuesta));

                    var id = respuesta.iden;

                    if(id > 0){
                        alert("Json efectivo");
                    }
                }
            });

        });
    });
**/
    $(".recepcion").click(function(e){
        $("#aceptar").prop('disabled',true);
        e.preventDefault();

        $("#guia1").change(function(){
            $("#aceptar").prop('disabled',false);
        });

    });


    $("#city1").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $("#dest1").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });


    $(".recepcion2").click(function(e){
        e.preventDefault();
        var ide = $(this).closest("tr").find("td:eq(0)").text();


        $("#guia2").keydown(function () {

            $("#aceptar").prop('disabled',false);

        });

        $("#aceptar").click(function(e){

            e.preventDefault();
            var guia=$("#guia2").val();
            var ciudad=$("#city2").val();
            var fecha=$("#date2").val();
            var lote=$("#lote2").val();
            var venc=$("#venc2").val();
            var destino=$("#dest2").val();

            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)

            datos = {"id":ide,"g":guia,"c":ciudad,"f":fecha,"l":lote,"d":destino,"v":venc};

            $.ajax({
                url: "recepcion_pedido2.php",
                type: "GET",
                data: datos
            }).done(function(respuesta){
                if (respuesta.estado = "ok") {
                    console.log(JSON.stringify(respuesta));

                    var id = respuesta.iden;

                    if(id > 0){
                        alert("Json efectivo");
                    }
                }
            });

        });
    });


    $("#btn1").click(function(){
        window.location.replace("Registros.php")
    });
    $("#btn2").click(function(){
        window.location.replace("Registros.php")
    });

</script>


</body>
</html>
