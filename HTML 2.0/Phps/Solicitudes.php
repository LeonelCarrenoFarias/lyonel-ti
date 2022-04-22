<?php
session_start();
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
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li class="active"><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Solicitudes</a> </div>
    <h1>Solicitudes de stock</h1>
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
              <h5>Solicitudes de Materiales</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>N° folio</th>
                  <th>Solicitante</th>
                  <th>Fecha (A-M-D)</th>
                  <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Stock</th>
                  <th>Borrar</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c2="SELECT `Id_Solicitud`,`Id_Sol_Mat`,`Solicitante`,`Fecha`,`Estado` FROM `solicitud` WHERE `Estado`=true";
                $q2=mysqli_query($dbc,$c2);

                if($q2==1) {
                    while ($r2 = mysqli_fetch_row($q2)) {


                        $id_soli = $r2[0];
                        $id_det = $r2[1];
                        $fecha_soli = $r2[2];
                        $solicitante = utf8_decode($r2[2]);

                        $c3 = "SELECT `Id_Det_Soli_Mat`, `Id_Material`, `Nombre`, `Detalle`, `Unidad`, `Cantidad`, `Estado` FROM `det_soli_mat` WHERE `Id_Det_Soli_Mat`=$id_det AND `Estado`=true";
                        if ($id_det == NULL) {
                        } else {
                            $q3 = mysqli_query($dbc, $c3);
                            $nomb = "";
                            $det = "";
                            $cant = 0;
                            $id_mat = 0;
                            while ($r3 = mysqli_fetch_row($q3)) {
                                $id_mat = $r3[1];
                                $nomb = utf8_decode($r3[2]);
                                $cant = $r3[5];
                                $det = utf8_decode($r3[3]);
                            }

                            $c4 = "SELECT `Stock` FROM `material` WHERE `Id_Material`=$id_mat";
                            $q4 = mysqli_query($dbc, $c4);
                            $st = 0;
                            while ($rrr = mysqli_fetch_row($q4)) {
                                $st = $rrr[0];
                            }

                            echo '
                            <tr class="gradeX">
                              <td class="center" >' . $id_soli . '</td>
                              <td class="center" >' . utf8_encode($solicitante) . '</td>
                              <td class="center" >' . $fecha_soli . '</td>
                              <td class="center" >' . utf8_encode($nomb) . ' - ' . utf8_encode($det) . '</td>
                              <td class="center" >' . $cant . '</td>
                              <td class="center" >' . $st . '</td>
                                <td class="center"><a class="ocultar" href="#myAlert" data-toggle="modal" style="font-style: Bold; color: tomato">Eliminar</a></td>

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

        <div id="tab2" class="tab-pane">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Inventario de Herramientas</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>N° folio</th>
                  <th>Solicitante</th>
                  <th>Fecha (A-M-D)</th>
                  <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Stock</th>
                  <th>Borrar</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c2="SELECT `Id_Solicitud`,`Id_Sol_Herr`,`Solicitante`,`Fecha`,`Estado` FROM `solicitud` WHERE `Estado`=TRUE";
                $q2=mysqli_query($dbc,$c2);
                while($r2=mysqli_fetch_row($q2)){


                    $id_soli=$r2[0];
                    $id_det=$r2[1];
                    $fecha_soli=$r2[2];
                    $solicitante=utf8_decode($r2[2]);


                    $c3="SELECT `Id_Det_Soli_Herr`, `Id_Herramienta`, `Nombre`, `Categoria`, `Cantidad`, `Estado` FROM `det_soli_herr` WHERE `Id_Det_Soli_Herr`=$id_det AND `Estado`=TRUE ";
                if($id_det==NULL) {
                }else {
                    $q3 = mysqli_query($dbc, $c3);
                    $nomb = "";
                    $det = "";
                    $cant = 0;
                    $id_herr = 0;
                    while ($r3 = mysqli_fetch_row($q3)) {
                        $id_herr = $r3[1];
                        $nomb = utf8_decode($r3[2]);
                        $cant = $r3[4];
                        $det = utf8_decode($r3[3]);
                    }

                    $c4="SELECT `Stock` FROM `herramienta` WHERE `Id_Herramienta`=$id_herr";
                    $q4=mysqli_query($dbc,$c4);
                    $st=0;
                    while($rrr=mysqli_fetch_row($q4)){
                        $st=$rrr[0];
                    }



                    echo '
                            <tr class="gradeX">
                              <td id="ide" class="center" >' . $id_soli . '</td>
                              <td id="date" class="center" >'.utf8_encode($solicitante).'</td>
                              <td id="soli" class="center" >' . $fecha_soli . '</td>
                              <td id="nom" class="center" >' . utf8_encode($nomb) . ' - ' . utf8_encode($det) . '</td>
                              <td id="cant"  class="center" >' . $cant . '</td>
                              <td id="cant"  class="center" >' . $st . '</td>
                                <td class="center"><a class="ocultar2" href="#myAlert" data-toggle="modal" style="font-style: Bold; color: tomato">Eliminar</a></td>

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

          <div id="myAlert" class="modal hide " aria-hidden="true" style="display: none;">

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

          <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;">
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
                datos = {"id":id,"soli":solicitante};
                $.ajax({
                    url: "ocultar_soli_mat.php",
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
