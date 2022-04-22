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
        <li><a href="../../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>
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
    <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
    <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
    <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li class="active"><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
      <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
             <li><a title="Facturas"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
                     <li ><a title="Centros de costos"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Centros de costos</span></a></li>



  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Solicitudes</a> </div>
    <h1>Listado de requisiciones</h1>
      <br>
  </div>
    <div class="container-fluid">      <p style="font-size: 14px;">Listado de las requisiciones realizadas por los usuarios del sistema.</p><p> La tabla contiene un link en la columna número de folio, en donde puedes visualizar el documento en formato PDF.</p>

      <hr>
    <div class="span11">
    <div class="row-fluid">
      <div class="widget-content tab-content" style="margin-top: -30px;">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Listado de requisiciones</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th style="font-size: 14px;">N° folio</th>
                  <th style="font-size: 14px;">Solicitante</th>
                  <th style="font-size: 14px;">Fecha (A-M-D)</th>
                  <th style="font-size: 14px;">Descripción</th>
                    <th style="font-size: 14px;">Cantidad</th>
                    <th style="font-size: 14px;">Stock</th>
                  <th style="font-size: 14px;">Borrar</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include '../connect/Connect.php';

                $c2="SELECT `Id_Solicitud`, `Responsable`, `Fecha`, `Estado` FROM `solicitud` WHERE `Estado`=1";
                $q2=mysqli_query($dbc,$c2);
                if($q2==true) {
                    while ($r2 = mysqli_fetch_row($q2)) {


                        $id_soli = $r2[0];
                        $fecha_soli = $r2[2];
                        $solicitante = utf8_decode($r2[1]);

                        $c3 = "SELECT `Id_Det_Solicitud`, `Id_Solicitud`, `Codigo`, `Detalle`, `Cantidad`, `Estado` FROM `det_soli_mat` WHERE `Id_Solicitud`=$id_soli AND `Estado`=1";
                        if ($id_soli == NULL) {
                        } else {
                            $q3 = mysqli_query($dbc, $c3);
                            $nomb = "";
                            $det = "";
                            $cant = 0;
                            $id_mat = 0;
                            while ($r3 = mysqli_fetch_row($q3)) {
                                $id_mat = $r3[2];
                                $nomb = utf8_decode($r3[3]);
                                $cant = $r3[4];
                            }

                            $c4 = "SELECT `cantidad` FROM `inventario` WHERE `code`=$id_mat";
                            $q4 = mysqli_query($dbc, $c4);
                            $st = 0;
                            while ($rrr = mysqli_fetch_row($q4)) {
                                $st = $rrr[0];
                            }

                            echo '
                            <tr class="gradeX">
                              <td class="center" style="font-size: 13px;"><a target="_blank" href="../../FPDF/Requisicion.php?idad='.$id_soli.'">' . $id_soli . '</a></td>
                              <td class="center" style="font-size: 13px;">' . utf8_encode($solicitante) . '</td>
                              <td class="center" style="font-size: 13px;">' . $fecha_soli . '</td>
                              <td class="center" style="font-size: 13px;">' . utf8_encode($nomb).'</td>
                              <td class="center" style="font-size: 13px;">' . $cant . '</td>
                              <td class="center" style="font-size: 13px;">' . $st . '</td>
                                <td class="center" style="font-size: 13px;"><a class="ocultar" href="#myAlert" data-toggle="modal" style="font-style: Bold; color: tomato">Eliminar</a></td>

                            </tr>
                        ';

                        }
                    }
                }else{

                }
                ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>



          <div id="myAlert" class="modal hide " aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">

              <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3>Confirmación</h3>
              </div>

              <div class="modal-body">
                  <p> ¿Desea eliminar la siguiente solicitud? :</p>

                          <p id="ide2"> </p>
                          <p id="soli2"> </p>
                          <p id="date2"> </p>
                          <p id="nomb2"> </p>
                          <p id="cant2"> </p>

              </div>
              <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" data-toggle="modal" href="#myModal" id="confir">Confirmar</a> <a data-dismiss="modal" class="btn" href="#" onclick="location.reload()">Cancelar</a> </div>
          </div>

          <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">
              <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                  <h3>Eliminar solicitud</h3>
              </div>
              <div class="modal-body">
                  <p>La solicitud ha sido eliminada con éxito.</p>
              </div>
          </div>
      </div>

    </div>
    </div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 Desarrollo web - by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
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

        $(".ocultar").click(function(){
            var id_soli= $(this).closest("tr").find("td:eq(0)").text();
            var solicitante= $(this).closest("tr").find("td:eq(1)").text();
            var fecha= $(this).closest("tr").find("td:eq(2)").text();
            var desc= $(this).closest("tr").find("td:eq(3)").text();
            var cant= $(this).closest("tr").find("td:eq(4)").text();


            document.getElementById("ide2").innerHTML = ("ID           :"+id_soli);
            document.getElementById("date2").innerHTML = ("Solicitante :"+solicitante);
            document.getElementById("soli2").innerHTML = ("Fecha       :"+fecha);
            document.getElementById("nomb2").innerHTML = ("Descripción  :"+desc);
            document.getElementById("cant2").innerHTML = ("Cantidad    :"+cant);

            var id= $(this).closest("tr").find("td:eq(0)").text();


            $("#confir").click(function(e){
                e.preventDefault();
                //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
                datos = {"id":id};
                $.ajax({
                    url: "ocultar_soli_mat.php",
                    type: "GET",
                    data: datos
                }).done(function (respuesta) {
                    if (respuesta.estado = "ok") {
                    }
                });

            });



        });

        //funcion para herramientas

        $(".ocultar2").click(function(){

            var id_soli= $(this).closest("tr").find("td:eq(0)").text();
            var solicitante= $(this).closest("tr").find("td:eq(1)").text();
            var fecha= $(this).closest("tr").find("td:eq(2)").text();
            var desc= $(this).closest("tr").find("td:eq(3)").text();
            var cant= $(this).closest("tr").find("td:eq(4)").text();


            document.getElementById("ide2").innerHTML = ("ID           :"+id_soli);
            document.getElementById("date2").innerHTML = ("Solicitante :"+solicitante);
            document.getElementById("soli2").innerHTML = ("Fecha       :"+fecha);
            document.getElementById("nomb2").innerHTML = ("Descripción  :"+desc);
            document.getElementById("cant2").innerHTML = ("Cantidad    :"+cant);

            $("#confir").click(function(e){
                e.preventDefault();
                //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
                datos = {"id":id_soli,"soli":solicitante};
                $.ajax({
                    url: "ocultar_soli_herr.php",
                    type: "GET",
                    data: datos
                }).done(function (respuesta) {
                    if (respuesta.estado = "ok") {
                        console.log(JSON.stringify(respuesta));

                        var id = respuesta.iden;

                        if (id > 0) {
                            alert("Json efectivo");
                        }
                    }
                });

            });




        });
    </script>

</body>
</html>
