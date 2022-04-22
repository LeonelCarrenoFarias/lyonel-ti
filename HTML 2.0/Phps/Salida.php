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
       <!-- <li><a href="Perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
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
    <li><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
    <li><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
    <li><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
    <li class="active"><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li ><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Salida</a> </div>
    <h1>Salida</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="span11">
    <div class="row-fluid">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Materiales</a></li>
        <li><a data-toggle="tab" href="#tab2">Herramientas</a></li>
        <li><a data-toggle="tab" href="#tab3">Servicios</a></li>
        <li><a data-toggle="tab" href="#tab4">Arriendos</a></li>
      </ul>
      <div class="widget-content tab-content">



        <div id="tab1" class="tab-pane active">
          <div class="widget-box">
            <div class="widget-title">
              <span class="icon"><i class="icon-th"></i></span>
              <h5>Salida de Materiales</h5>
            </div>



            <div class="widget-content nopadding">
              <table class="table table-bordered data-table ">
                <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ubicacion</th>
                  <th>Stock</th>
                  <th>Fecha Compra</th>
                  <th class="span3">Cantidad</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include_once 'Connect.php';

                    $c1="SELECT `Id_Material`, `Nombre`, `Descripcion`, `Unidad`, `Stock`, `Ubicacion`, `Estado_Entrega`, `Estado`,`Stock_Optimo` FROM `material` WHERE `Estado`=true AND `Stock` > 0 ";
                    $q1=mysqli_query($dbc,$c1);
                    while($r1=mysqli_fetch_row($q1)){


                        $c2="SELECT `Fecha_Adqui` FROM `adquisicion` INNER JOIN `det_material` WHERE `adquisicion`.`Id_Adquisicion`=`det_material`.`Id_Adqui` AND `det_material`.`Id_Material`=$r1[0]";
                        $q2=mysqli_query($dbc,$c2);
                        $F_Ad="";
                        while ($r2=mysqli_fetch_row($q2)){
                            $F_Ad=$r2[0];
                        }

                        $stock_opt=$r1[8];
                        $estad="";
                        $color="";

                        if($r1[6]==0){
                            $estad="Proceso de Compra";
                            $color="khaki";
                        }
                        else if($r1[4]<($stock_opt)){
                            $estad="Nivel Escaso";
                            $color="lightcoral";
                        }else{
                            $estad="Nivel Optimo";
                            $color="palegreen";

                        }

                        $nn1=utf8_decode($r1[1]);
                        $dd1=utf8_decode($r1[2]);
                        $cc1=utf8_decode($r1[5]);

                        echo'
                            <tr class="gradeX">
                <td class="center" style="background-color: '.$color.'"><input type="checkbox" class="check" /></td>
                <td class="center" style="background-color: '.$color.'">'.$r1[0].'</td>
                <td class="center" style="background-color: '.$color.'">'.utf8_encode($nn1).'</td>
                <td class="center" style="background-color: '.$color.'">'.utf8_encode($dd1).'</td>
                <td class="center" style="background-color: '.$color.'">'.utf8_encode($cc1).'</td>
                <td class="center" style="background-color: '.$color.'">'.$r1[4].'</td>
                <td class="center" style="background-color: '.$color.'">'.$F_Ad.'</td>
                <td class="center" style="background-color: '.$color.'"><input class=" controls cantidad" disabled type="number"></td>
                </tr>
                ';
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
              <h5>Salida de Herramientas</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Ubicación</th>
                  <th>Stock</th>
                  <th>Estado</th>
                  <th class="span2">Cantidad</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c2="SELECT `Id_Herramienta`, `Nombre`, `Categoria`, `Stock`, `Descripcion`, `Valor`, `Ubicacion`, `Estado_Herr`, `Estado` FROM `herramienta` WHERE `Estado`=true AND `Stock` > 0 ";
                $q2=mysqli_query($dbc,$c2);
                while($r2=mysqli_fetch_row($q2)){


                    $c3="SELECT `Fecha_Adqui` FROM `adquisicion` INNER JOIN `det_herramienta` WHERE `adquisicion`.`Id_Adquisicion`=`det_herramienta`.`Id_Adqui` AND `det_herramienta`.`Id_Herramienta`=$r2[0]";
                    $q3=mysqli_query($dbc,$c3);
                    $F_Ad="";
                    while ($r3=mysqli_fetch_row($q3)){
                        $F_Ad=$r3[0];
                    }

                    $estad="";
                    $color="";

                    if($r2[7]=="No Operativa"){
                        $estad="No operativa";
                        $color="lightcoral";
                    }else{
                        $estad="Operativa";
                        $color="palegreen";

                    }

                    $nn1=utf8_decode($r2[1]);
                    $dd1=utf8_decode($r2[2]);
                    $cc1=utf8_decode($r2[6]);

                    echo'
                            <tr class="gradeX">
                              <td class="center" ><input type="checkbox" class="check2" /></td>
                              <td class="center" >'.$r2[0].'</td>
                              <td class="center" >'.utf8_encode($nn1).'</td>
                              <td class="center" >'.utf8_encode($dd1).'</td>
                              <td class="center" >'.utf8_encode($cc1).'</td>
                              <td class="center" >'.$r2[3].'</td>
                              <td class="center" style="color: '.$color.'">'.$estad.'</td>
                              <td class="center" ><input class=" controls cantidad2" disabled type="number"></td>
                             
                            </tr>
                        ';
                }

                ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="tab3" class="tab-pane">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Término de Servicios</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                    <th>ID</th>
                    <th>Descripcion</th>
                  <th>Proveedor</th>
                  <th>Fecha Adquisicion</th>
                  <th>Fecha Termino</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c3="SELECT `Id_Servicio`, `Descripcion`, `Tipo`, `Duracion`, `Lugar`, `Estado` FROM `servicio` WHERE `estado`=true";
                $q3=mysqli_query($dbc,$c3);



                while($row=mysqli_fetch_row($q3)) {
                    $Id_S=$row[0];
                    $c4="SELECT `p`.`Id_Obra`,`p`.`Id_Adquisicion`,`Fecha_Adqui`,`Valor` FROM `adquisicion` AS `p` INNER JOIN `det_servicio` AS `c` ON `p`.`Id_Adquisicion`=`c`.`Id_Adqui` AND `c`.`Id_Servicio`=$Id_S";
                    $q5=mysqli_query($dbc,$c4);

                    $Id_O=0;
                    $Id_Adq=0;
                    $F_Adq="";
                    $F_Dev="";
                    $valor=0;
                    while ($row4=mysqli_fetch_row($q5)){
                        $Id_O=$row4[0];
                        $Id_Adq=$row4[1];
                        $F_Adq=$row4[2];
                        $valor=$row4[3];
                    }


                    $c5="SELECT `Nombre` FROM `obra` WHERE `Id_Obra`=$Id_O";
                    $q5=mysqli_query($dbc,$c5);
                    $nom="";
                    while($row5=mysqli_fetch_row($q5)){
                        $nom=utf8_decode($row5[0]);
                    }

                    $c6="SELECT `Nombre` FROM `proveedor` AS `P` INNER JOIN `det_proveedor` AS `DET` ON `P`.`Id_Proveedor`= `DET`.`Id_Proveedor` AND `DET`.`Id_Adquisicion`=$Id_Adq";
                    $q6=mysqli_query($dbc,$c6);
                    $name="";
                    while($r6=mysqli_fetch_row($q6)){
                        $name=utf8_decode($r6[0]);
                    }


                    $nn1=utf8_decode($row[1]);

                    echo '                    
                    <tr class="gradeX">
                      <td class="center" ><input type="checkbox" class="check_s" /></td>
                      <td>'.$Id_S.'</td>
                      <td>'.utf8_encode($nn1).'</td>
                      <td>'.utf8_encode($name).'</td>
                      <td>'.$F_Adq.'</td>
                      <td class="center">'.$F_Dev.'</td>
                    </tr>
';
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="tab4" class="tab-pane">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Término de Arriendos</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                    <th>ID</th>
                    <th>Detalle</th>
                  <th>Monto</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Termino</th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Connect.php';

                $c3="SELECT `Id_Arriendo`, `Descripcion`, `Stock`, `Monto`,`Lugar`,`Estado` FROM `arriendo` WHERE `Estado`=true";
                $q3=mysqli_query($dbc,$c3);



                while($row=mysqli_fetch_row($q3)) {
                    $Id_A=$row[0];
                    $c4="SELECT `p`.`Id_Obra`,`p`.`Id_Adquisicion`,`Fecha_Adqui`,`Fecha_Devolucion` FROM `adquisicion` AS `p` INNER JOIN `det_arriendo` AS `c` ON `p`.`Id_Adquisicion`=`c`.`Id_Adquisicion` AND `c`.`Id_Arriendo`=$Id_A";
                    $q5=mysqli_query($dbc,$c4);

                    $Id_O=0;
                    $Id_Adq=0;
                    $F_Adq="";
                    $F_Dev="";
                    while ($row4=mysqli_fetch_row($q5)){
                        $Id_O=$row4[0];
                        $Id_Adq=$row4[1];
                        $F_Adq=$row4[2];
                        $F_Dev=$row4[3];
                    }


                    $c5="SELECT `Nombre` FROM `obra` WHERE `Id_Obra`=$Id_O";
                    $q5=mysqli_query($dbc,$c5);
                    $nom="";
                    while($row5=mysqli_fetch_row($q5)){
                        $nom=utf8_decode($row5[0]);
                    }

                    $c6="SELECT `Nombre` FROM `proveedor` AS `P` INNER JOIN `det_proveedor` AS `DET` ON `P`.`Id_Proveedor`= `DET`.`Id_Proveedor` AND `DET`.`Id_Adquisicion`=$Id_Adq";
                    $q6=mysqli_query($dbc,$c6);
                    $name="";
                    while($r6=mysqli_fetch_row($q6)){
                        $name=utf8_decode($r6[0]);
                    }



                    $nn1=utf8_decode($row[1]);

                    echo '                    
                    <tr class="gradeX">
                      <td class="center" ><input type="checkbox" class="check_a" /></td>
                      <td>'.$Id_A.'</td>
                      <td>'.utf8_encode($nn1).'</td>
                      <td>'.$row[3].'</td>
                      <td class="center">'.$F_Adq.'</td>
                      <td class="center">'.$F_Dev.'</td>                    </tr>
';
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <a class="btn btn-warning btn-large" id="descontar" style="color: white" data-toggle="modal" href="#myAlert" disabled>Descontar Stock</a>

          <div id="myAlert" class="modal hide " aria-hidden="true" style="display: none;">

            <div class="modal-header">
              <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
              <h3>Confirmar Salida del inventario</h3>
            </div>

            <div class="modal-body">
              <p id="titulo"></p>
              <p id="contenido"><i class="icon icon-check"></i> </p>
            </div>
            <div class="modal-footer"> <a data-dismiss="modal" id="conf1" class="btn btn-primary" data-toggle="modal" href="#myModal">Confirmar</a> <a data-dismiss="modal" id="cancelar1" class="btn" href="#" onclick="location.reload()">Cancelar</a> </div>
          </div>




        <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;">
          <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
            <h3>Operación realizada</h3>
          </div>
          <div class="modal-body">
            <p id="titulo_final">Se han descontado el siguiente arriendo del inventario:</p>
            <p id="contenido_final"><i class="icon icon-bookmark"></i></p>
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

    //funcion para materiales


    $(".check").click(function () {
        $(this).closest("tr").find("input.cantidad").attr('disabled',false);

        $(".cantidad").change(function(){
            var cantidad=$(this).closest("tr").find("input.cantidad").val();
            var id= $(this).closest("tr").find("td:eq(1)").text();
            var stock_actual=$(this).closest("tr").find("td:eq(5)").text();

            if(parseInt(stock_actual) >= parseInt(cantidad)) {

                $("#descontar").trigger("click");
                var titulo = "¿Desea descontar "+cantidad+" unidades al stock actual ("+stock_actual+")? :";
                var contenido = $(this).closest("tr").find("td:eq(2)").text();

                document.getElementById("titulo").innerHTML = (titulo);
                document.getElementById("contenido").innerHTML = (contenido);

                var contenid;
                var titulo_fin="Inventario de materiales:";
                if(parseInt(stock_actual) >= parseInt(cantidad)) {
                    contenid = "se han descontado " + cantidad + " unidades del stock.";
                }else{
                    contenid = "se han descontado la totalidad del stock.";
                }


                $("#conf1").click(function (e) {

                    e.preventDefault();
                    document.getElementById("titulo_final").innerHTML = (titulo_fin);
                    document.getElementById("contenido_final").innerHTML = (contenid);

                    //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
                    datos = {"id": id,"cantidad":cantidad};
                    $.ajax({
                        url: "salida_material.php",
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
            }else{
                alert("La cantidad solicitada excede el stock actual, intente nuevamente.");
                location.reload();
            }
        });


    });

    //funcion para herramientas


    $(".check2").click(function () {
        $(this).closest("tr").find("input.cantidad2").attr('disabled',false);

        $(".cantidad2").change(function(){
            var cantidad=$(this).closest("tr").find("input.cantidad2").val();
            var id= $(this).closest("tr").find("td:eq(1)").text();
            var stock_actual=$(this).closest("tr").find("td:eq(5)").text();

            if(parseInt(stock_actual) >= parseInt(cantidad)) {

                $("#descontar").trigger("click");
                var titulo = "¿Desea descontar "+cantidad+" unidades al stock actual ("+stock_actual+")? :";
                var contenido = $(this).closest("tr").find("td:eq(2)").text();

                document.getElementById("titulo").innerHTML = (titulo);
                document.getElementById("contenido").innerHTML = (contenido);

                var contenid;
                var titulo_fin="Inventario de herramientas:";
                if(parseInt(stock_actual) >= parseInt(cantidad)) {
                    contenid = "se han descontado " + cantidad + " unidades del stock.";
                }else{
                    contenid = "se han descontado la totalidad del stock.";
                }


                $("#conf1").click(function (e) {

                    e.preventDefault();
                    document.getElementById("titulo_final").innerHTML = (titulo_fin);
                    document.getElementById("contenido_final").innerHTML = (contenid);

                    //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
                    datos = {"id": id,"cantidad":cantidad};
                    $.ajax({
                        url: "salida_herramienta.php",
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
            }else{
                alert("La cantidad solicitada excede el stock actual, intente nuevamente.");
                location.reload();
            }
        });


    });






    //funcion para arriendos

    $('.check_a').click(function() {
        var id=$(this).closest("tr").find("td:eq(1)").text();
        $("#descontar").trigger("click");
        var titulo="¿Desea finalizar el siguiente arriendo? :";
        var titulo_fin="Inventario de lo arriendos solicitados :";
        var contenido=$(this).closest("tr").find("td:eq(2)").text();

        document.getElementById("titulo").innerHTML=(titulo);
        document.getElementById("contenido").innerHTML=(contenido);


        $("#conf1").click(function (e) {

            e.preventDefault();
            document.getElementById("titulo_final").innerHTML=(titulo_fin);
            document.getElementById("contenido_final").innerHTML=(contenido);

            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
            datos = {"id":id};
            $.ajax({
                url: "salida_arriendo.php",
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



    $('.check_s').click(function() {
        var id=$(this).closest("tr").find("td:eq(1)").text();
        $("#descontar").trigger("click");
        var titulo="¿Desea finalizar el siguiente servicio? :";
        var titulo_fin="Inventario de lo servicios adquiridos :";
        var contenido=$(this).closest("tr").find("td:eq(2)").text();

        document.getElementById("titulo").innerHTML=(titulo);
        document.getElementById("contenido").innerHTML=(contenido);


        $("#conf1").click(function (e) {

            e.preventDefault();
            document.getElementById("titulo_final").innerHTML=(titulo_fin);
            document.getElementById("contenido_final").innerHTML=(contenido);

            //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
            datos = {"id":id};
            $.ajax({
                url: "salida_servicio.php",
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
</script>
</body>
</html>
