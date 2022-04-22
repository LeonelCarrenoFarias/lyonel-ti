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
    </li><!--
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
    <li class="active"><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Entradas</span></a> </li>
    <li ><a href="Salida.php"><i class="icon icon-fullscreen"></i> <span>Salidas</span></a></li>
    <li ><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Solicitar Stock</span></a></li>
    <li ><a title="Solicitudes" href="Solicitudes.php"><i class="icon icon-check"></i> <span>Solicitudes</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Entradas</a>
    <h1>Nueva Entrada</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Nuevo Item</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="GET" name="basic_validate" id="basic_validate">
                  <div class="control-group">
                    <label class="control-label">Item: </label>
                    <div class="controls">
                      <select class="span3" id="seleccion" name="seleccion" required>
                        <option id="area" selected value="0">--------</option>
                        <option id="area1"  value="1">Material</option>
                        <option id="area2" value="2">Herramienta</option>
                        <option id="area3" value="3">Servicio</option>
                        <option id="area4" value="4">Arriendo</option>
                      </select>
                    </div>
                  </div>
                <div class="control-group material herramienta arriendo servicio">
                    <label class="control-label">Nombre: </label>
                    <div class="controls">
                        <input class="span4 rst" disabled required type="text" name="nom" id="nom" />
                    </div>
                </div>
                  <div class="control-group material herramienta arriendo servicio">
                    <label class="control-label">Descripción técnica: </label>
                    <div class="controls">
                      <input class="span6 rst" disabled required type="text" name="desc" id="desc" />
                    </div>
                  </div>
                <div class="control-group material herramienta arriendo servicio">
                    <label class="control-label">Categoria: </label>
                    <div class="controls">
                        <input class="span6 rst" disabled required type="text" name="cat" id="cat" />
                    </div>
                </div>
                <div class="control-group material herramienta arriendo servicio">
                    <label class="control-label">Unidad de medida: </label>
                    <div class="controls">
                        <input class="span3" required list="tips" type="text" name="unidad" id="unidad">
                        <datalist id=tips>
                            <option value="Kilo"></option><option value="Tira"></option><option value="Carga"></option><option value="Paquete"></option><option value="Litro"></option><option value="Plancha"></option><option value="Unidad"></option><option value="Saco"></option><option value="Barra"></option><option value="Tonelada">
                        </datalist>
                    </div>
                </div>

                  <div class="control-group material herramienta" id="cantidad">
                    <label class="control-label">Cantidad: </label>
                    <div class="controls">
                      <input class="span2 rst" disabled required type="number" minlength="0" name="cant" id="cant" />
                    </div>

                    <label class="control-label">Stock Óptimo: </label>
                    <div class="controls">
                      <input class="span2 rst" disabled required type="number" minlength="0" name="stock_opt" id="stock_opt" />
                    </div>
                  </div>

                  <div class="control-group material herramienta arriendo servicio" id="destino">
                    <label class="control-label">Destino: </label>
                    <div class="controls">
                      <select class="span3" name="select2" id="select2" required>
                        <option value="0"  >Obra</option>
                        <option value="1" selected>Bodega</option>
                        <option value="1" >Casa Matriz</option>
                      </select>
                    </div>
                  </div>


                <div class="control-group herramienta">
                    <label class="control-label">Duración en días: </label>
                    <div class="controls">
                        <input class="rst span2 " disabled type="number" minlength="0"  name="dur" id="dur"  required/>
                    </div>
                </div>

                <div class="control-group material herramienta">
                    <label class="control-label">Fecha Vencimiento: </label>
                    <div class="controls" >
                        <input class="rst span3" type="date" disabled name="date2" id="date2"  required/>
                    </div>
                </div>
                <div class="control-group material herramienta">
                    <label class="control-label">N° Lote: </label>
                    <div class="controls" >
                        <input class="rst span4" type="number" disabled minlength="0" name="n_lote" id="n_lote"  required/>
                    </div>
                </div>

                <div class="control-group arriendo servicio">
                        <label class="control-label">Monto: </label>
                        <div class="controls" >
                          <input class="rst span4" type="number" disabled name="monto" minlength="0" id="monto" required/>
                        </div>
                  </div>

                  <div class="control-group  material herramienta ">
                        <label class="control-label">Precio unitario: </label>
                        <div class="controls" >
                          <input class="rst span3" type="number" disabled name="precio" minlength="0" id="precio"  required/>
                        </div>
                  </div>

                  <div class="form-actions material herramienta arriendo servicio">
                    <button type="submit" style="color: black" disabled value="Guardar" id="guardar" data-toggle="modal" class="btn btn-warning btn-large" href="#myAlert" >Guardar</button>
                  </div>




                      <div id="myAlert" class="modal hide " aria-hidden="true" style="display: none;">

                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Confirmación de Entrada</h3>
                        </div>

                        <div class="modal-body">
                          <p> ¿Desea ingresar al inventario el siguiente item?... </p>
                            <p id="contenido_alert1"><i class="icon icon-arrow-right"></i>  </p>
                            <p id="contenido_alert2"><i class="icon icon-arrow-right"></i>  </p>
                            <p id="contenido_alert3"><i class="icon icon-arrow-right"></i>  </p>
                        </div>
                        <div class="modal-footer"> <a id="conf1" data-dismiss="modal" class="btn btn-primary" data-toggle="modal" href="#myModal">Confirmar</a> <a data-dismiss="modal" class="btn" href="#">Cancelar</a> </div>
                      </div>





                      <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;">
                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">×</button>
                          <h3>Ingreso de item</h3>
                        </div>
                        <div class="modal-body">
                          <p>Ingreso realizado con éxito</p>
                          <p id="contenido_resumen"><i class="icon icon-bookmark"></i></p>
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
<script language="JavaScript">
    $( function() {


        function ucfirst(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        $("#nom").keyup(function(){
            // force: true to lower case all letter except first
            var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
            // to capitalize all words
            $(this).val(cp_value );
        });

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



        $("#seleccion").change( function() {
            if ($(this).val() === "1") {
                $(".rst").prop("value",'');
                $("#nom").prop("disabled", false);
                $("#desc").prop("disabled", false);
                $("#cat").prop("disabled", true);
                $("#cat").val("vacio");
                $("#unidad").prop("disabled", false);
                $("#cant").prop("disabled", false);
                $("#stock_opt").prop("disabled", false);
                $("#n_lote").prop("disabled", false);
                $("#dur").prop("disabled", true);
                $("#dur").val(0);
                $("#date2").prop("disabled", false);
                $("#monto").prop("disabled", true);
                $("#monto").val(0);
                $("#precio").prop("disabled", true);
                $("#precio").val(0);

                $("#date2").change( function(){
                    $("#guardar").prop("disabled", false);
                });


            } else if ($(this).val() === "2") {
                $(".rst").prop("value",'');

                $("#nom").prop("disabled", false);
                $("#desc").prop("disabled", false);
                $("#cat").prop("disabled", false);
                $("#unidad").prop("disabled", true);
                $("#unidad").val("vacio");
                $("#cant").prop("disabled", false);
                $("#stock_opt").prop("disabled", true);
                $("#stock_opt").val(0);
                $("#n_lote").prop("disabled", true);
                $("#n_lote").val(1001);
                $("#dur").prop("disabled", true);
                $("#dur").val(0);
                $("#date2").prop("disabled", false);
                $("#monto").prop("disabled", true);
                $("#monto").val(0);
                $("#precio").prop("disabled", false);

                $("#precio").change( function(){
                    $("#guardar").prop("disabled", false);
                });

            }else if ($(this).val() === "3") {
                $(".rst").prop("value",'');

                $("#nom").prop("disabled", true);
                $("#nom").val("vacío");
                $("#desc").prop("disabled", false);
                $("#cat").prop("disabled", false);
                $("#unidad").prop("disabled", true);
                $("#unidad").val("vacío");
                $("#cant").prop("disabled", true);
                $("#cant").val(0);
                $("#stock_opt").prop("disabled", true);
                $("#stock_opt").val(0);
                $("#n_lote").prop("disabled", true);
                $("#n_lote").val(1001);
                $("#dur").prop("disabled", false);
                $("#date2").prop("disabled", true);
                $("#date2").val("");
                $("#monto").prop("disabled", true);
                $("#monto").val(0);
                $("#precio").prop("disabled", true);
                $("#precio").val(0);

                $("#dur").change( function(){
                    $("#guardar").prop("disabled", false);
                });

            }else if ($(this).val() === "4") {
                $(".rst").prop("value",'');

                $("#nom").prop("disabled", true);
                $("#nom").val("vacío");
                $("#desc").prop("disabled", false);
                $("#cat").prop("disabled", true);
                $("#cat").val(0);
                $("#unidad").prop("disabled", true);
                $("#unidad").val("vacío");
                $("#cant").prop("disabled", false);
                $("#stock_opt").prop("disabled", true);
                $("#stock_opt").val(0);
                $("#n_lote").prop("disabled", true);
                $("#n_lote").val(1001);
                $("#dur").prop("disabled", false);
                $("#date2").prop("disabled", true);
                $("#date2").val("");
                $("#monto").prop("disabled", false);
                $("#precio").prop("disabled", true);
                $("#precio").val(0);


                $("#monto").change( function(){
                    $("#guardar").prop("disabled", false);
                });
            }else{
                $(".rst").prop("value",'');

                $("#nom").prop("disabled", true);
                $("#desc").prop("disabled", true);
                $("#cat").prop("disabled", true);
                $("#unidad").prop("disabled", true);
                $("#cant").prop("disabled", true);
                $("#stock_opt").prop("disabled", true);
                $("#dur").prop("disabled", true);
                $("#date2").prop("disabled", true);
                $("#monto").prop("disabled", true);
                $("#precio").prop("disabled", true);
                $("#guardar").prop("disabled", true);
            }
        });


        if($("#seleccion").val() ===0){
            $("#guardar").prop("disabled", true);
        }


    });
</script>
<script>

    $("#guardar").click(function(e) {

        e.preventDefault();


        var tipo= $("#seleccion").val();
        var nom,des,can,monto,dur,cat;
        if(tipo<=1){
            nom=$("#nom").val();
            des=$("#desc").val();
            can=$("#cant").val();

            document.getElementById("contenido_alert1").innerHTML=('Nombre:'+nom);
            document.getElementById("contenido_alert2").innerHTML=('Descripción:'+des);
            document.getElementById("contenido_alert3").innerHTML=('Cantidad:'+can);


        }else if(tipo<=2){
            nom=$("#nom").val();
            cat=$("#cat").val();
            can=$("#cant").val();

            document.getElementById("contenido_alert1").innerHTML=('Nombre:'+nom);
            document.getElementById("contenido_alert2").innerHTML=('Categoria:'+cat);
            document.getElementById("contenido_alert3").innerHTML=('Cantidad:'+can);



        }else if(tipo<=3){
            des=$("#desc").val();
            cat=$("#cat").val();
            dur=$("#dur").val();

            document.getElementById("contenido_alert1").innerHTML=('Descripción:'+des);
            document.getElementById("contenido_alert2").innerHTML=('Categoria:'+cat);
            document.getElementById("contenido_alert3").innerHTML=('Duración:'+dur);



        }else{
            des=$("#desc").val();
            monto=$("#monto").val();
            can=$("#cant").val();

            document.getElementById("contenido_alert1").innerHTML=('Descripción:'+des);
            document.getElementById("contenido_alert2").innerHTML=('Monto:'+monto);
            document.getElementById("contenido_alert3").innerHTML=('Cantidad:'+can);



        }



    });

    $("#conf1").click(function (e) {


        e.preventDefault();
        var seleccion=$("#seleccion").val();
        var nom=$("#nom").val();
        var desc=$("#desc").val();
        var cat=$("#cat").val();
        var unidad=$("#unidad").val();
        var cant=$("#cant").val();
        var stock_opt=$("#stock_opt").val();
        var n_lote=$("#n_lote").val();
        var dur=$("#dur").val();
        var date2=$("#date2").val();
        var monto=$("#monto").val();
        var precio=$("#precio").val();
        var dest=$("#select2").val();

        if(nom ===""){
            document.getElementById("contenido_resumen").innerHTML=('Descripción:'+desc);
        }else{
            document.getElementById("contenido_resumen").innerHTML=('Nombre:'+nom);
        }

        //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
        datos = {"seleccion":seleccion,"nom":nom,"desc":desc,"cat":cat,"unidad":unidad,"cant":cant,"n_lote":n_lote,"stock_opt":stock_opt,"dur":dur,"date2":date2,"monto":monto,"precio":precio,"dest":dest};
        $.ajax({
            url: "Entradas2.php",
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

</script>


</body>
</html>
