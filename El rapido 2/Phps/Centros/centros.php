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
    <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li ><a href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
      <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
      <li><a title="Facturas"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
      <li class="active"><a title="Clientes"  href="centros.php"><i class="icon icon-check"></i> <span>Clientes</span></a></li>

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Clientes</a> </div>
    <h1>Clientes registrados en el sistema</h1>
      <br>
  </div>
    <div class="container-fluid">      <p style="font-size: 14px;">Listado de clientes en los cuales funcionan como un centro de costo, acumuland las salidas del sistema, obteniendo un informe concreto de compras, y segmentado en base a nuestra necesidad, ya sea rango de fecha o consolidado.</p>
        <p style="font-size: 14px;"><strong>NOTA 1:</strong> Eliminar clientes puede perjudicar el buen funcionamiento del sistema, ya que NO podrás visualizar informes de compras de este mismo.</p>
        <p style="font-size: 14px;"><strong>NOTA 1:</strong> Visualiza el ingreso total presionando código del cliente.</p>

      <hr>
    <div class="span11">
    <div class="row-fluid">
      <div class="widget-content tab-content" style="margin-top: -50px;"> <button id="nuevo" style="float: right; margin: 0.3%;" class=" btn-danger btn-primary span2" data-dismiss="modal" data-toggle="modal" href="#myAlert2"><i style="margin-right: 10px;" class="icon-arrow-up"></i> Nuevo Cliente</button><br>
          <div class="widget-box">
            <div class="widget-title" style="display: flex"> <span class="icon-3x" style="margin-left: 2px;"><i class="icon-th"></i></span>
              <h4 style="margin-left: 5px; margin-right: 65%;">Clientes</h4>



            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th style="font-size: 14px;">Codigo</th>
                  <th style="font-size: 14px;">Nombre del cliente</th>
                  <th style="font-size: 14px;">Total inversión</th>
                  <th style="font-size: 14px;">Borrar registro</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include '../connect/Connect.php';

                $text="SELECT `Id_Centro`, `Nombre`, `Caja`, `Estado` FROM `centrocosto` WHERE 1";
                $querry=mysqli_query($dbc,$text);
                while($row=mysqli_fetch_row($querry)) {

                    $id_soli=$row[0];
                    $fecha_soli=$row[1];
                    $nomb=$row[2];
                    $st=$row[3];

                    echo '
                            <tr class="gradeX">
                              <td class="center" style="font-size: 13px;"><a title="Consolidado de inversión" target="_blank" href="../../FPDF/VentasTotalxcliente.php?centrocosto=' . $id_soli . '">' . $id_soli . '</a></td>
                              <td class="center" style="font-size: 13px;">' . $fecha_soli . '</td>
                              <td class="center" style="font-size: 13px; text-align: right;">' . $nomb . '</td>
                                <td class="center" style="font-size: 13px;  text-align: center;"><a class="borrar" href="#myAlert" data-toggle="modal" style=" font-style: Bold; color: tomato">Eliminar</a></td>

                            </tr>
                        

                
                   ';
                }
                mysqli_close($dbc);
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
                  <p> ¿Desea eliminar el centro de costo?, los datos se eliminaran de la base de datos.</p>

                          <p id="ide2"> </p>
                          <p id="soli2"> </p>
                          <p id="date2"> </p>
                          <p id="cant2"> </p>

              </div>
              <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary confirm" data-toggle="modal" id="confirm" href="#myModal">Confirmar</a> <a data-dismiss="modal" class="btn" href="#" >Cancelar</a> </div>
          </div>

          <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">
              <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                  <h3>Eliminar registro cliente</h3>
              </div>
              <div class="modal-body">
                  <p>Ha sido eliminado con éxito.</p>
              </div>
          </div>







        <div id="myAlert2" class="modal hide " aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">

            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Agregar cliente</h3>
            </div>

            <div class="modal-body">
                <h3> Ingrese los datos solicitados</h3>

                <form class="form-horizontal" name="basic_validate" id="basic_validate" method="GET" action="nuevo.php" >
                    <div class="control-group material herramienta arriendo servicio" style="text-align: left">
                        <label class="control-label" style="text-align: left">Ingrese un codigo </label>
                        <div class="controls">
                            <input class="span7" max="11" min="4" required type="text" placeholder="Ingrese un valor de min. 4" name="code" id="code">
                        </div>
                    </div>
                    <div class="control-group material herramienta arriendo servicio" >
                        <label class="control-label" style="text-align: left">Nombre del cliente</label>
                        <div class="controls">
                            <input disabled class="span12" min="6" max="50" placeholder="Ingrese el nombre de min. 6 caracteres."  required type="text" name="nom" id="nom">
                        </div>
                    </div>
                    <div class="modal-footer"> <button data-dismiss="modal" class="btn btn-primary confirm2" type="submit" data-toggle="modal"  href="#myModal2" disabled id="confirm2" >Confirmar</button> <button data-dismiss="modal" class="btn" href="#" id="canc" >Cancelar</button> </div>
            </div>
                </form>
            </div>
        <div id="myModal2" class="modal hide" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">X</button>
                <h3>Confirmación</h3>
            </div>
            <div class="modal-body">
                <p>Centro de cliente creado con éxito.</p>
            </div>
        </div>


      </div>
    </div>
    </div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2022 Desarrollo web - by leonel carreño <a>Universidad de Talca</a> </div>
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

        var id_soli;
        $(".borrar").click(function(){
            id_soli= $(this).closest("tr").find("td:eq(0)").text();
            var solicitante= $(this).closest("tr").find("td:eq(1)").text();
            var fecha= $(this).closest("tr").find("td:eq(2)").text();
            var desc= $(this).closest("tr").find("td:eq(3)").text();


            document.getElementById("ide2").innerHTML = ("ID           :"+id_soli);
            document.getElementById("date2").innerHTML = ("Nombre :"+solicitante);
            document.getElementById("soli2").innerHTML = ("Total Inversión       :"+fecha);
            document.getElementById("nomb2").innerHTML = ("Descripción  :"+desc);


        });

        $(".confirm").click(function(){
            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
            $.ajax({
                type: "GET",
                url: "ocultar_soli_mat.php",
                data: "id="+id_soli,
                success: function (respuesta) {
                    if (respuesta.estado === 'ok') {

                    }
                }

            });
        });

        var des1;
        var des2;
        var codigo;
        var nombre;
        $("#code").change(function(){
           codigo=$(this).val();

            $.ajax({
                type: "GET",
                url: "ver1.php",
                data: "v1="+codigo,
                success: function (respuesta) {
                    if (respuesta.estado === 'ok') {
                        alert("Este codigo ya existe.");
                        $("#code").val("");
                        $("#code").focus();

                    }else{
                        $("#nom").prop('disabled',false);
                        $("#nom").focus();

                        if($("#code").val()===""){
                            $("#nom").prop('disabled',true);
                            $("#nom").val("");

                        }
                    }
                }

            });

        });
        $("#code").keyup(function(){
            codigo=$(this).val();

            $.ajax({
                type: "GET",
                url: "ver1.php",
                data: "v1="+codigo,
                success: function (respuesta) {
                    if (respuesta.estado === 'ok') {
                        $("#nom").prop('disabled',true);
                    }else{
                        $("#nom").prop('disabled',false);
                    }
                }

            });

        });
        $("#nom").change(function(){
            nombre=$(this).val();
            $.ajax({
                type: "GET",
                url: "ver2.php",
                data: "v1="+nombre,
                success: function (respuesta) {
                    if (respuesta.estado === 'ok') {
                        alert("Este nombre ya existe.");
                        $("#nom").val("");
                        $("#nom").focus();
                    }else if (respuesta.estado === 'no'){
                        $("#confirm2").prop('disabled',false);

                    }
                }

            });
        });

        $("#confirm2").click(function(){
            var valor1=$("#code").val();
            var valor2=$("#nom").val();
            $.ajax({
                type: "GET",
                url: "nuevo.php",
                data: {"code":valor1, "nom":valor2},
                success: function (respuesta) {
                    if (respuesta.estado === 'ok') {
                    }
                }

            });

        });



    </script>

</body>
</html>
