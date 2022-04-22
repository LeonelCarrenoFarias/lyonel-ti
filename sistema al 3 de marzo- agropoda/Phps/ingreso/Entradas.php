<?php
session_start();
$rut=$_COOKIE['Id'];
$nom=utf8_decode($_COOKIE['Nombre']);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <li class="active"><a href="Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
    <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
    <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li ><a title="Solicitudes" href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciónes</span></a></li>
      <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
       <li><a title="Facturas"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
               <li ><a title="Centros de costos"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Centros de costos</span></a></li>


  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Entrada</a>
    <h1>Ingreso de un nuevo item</h1>
    </div>
  <div class="container-fluid"><p></p><hr>
      <button class="btn btn-danger btn-large" id="ing_aut" style="float:right;" data-toggle="modal" href="#automatico" >Ingreso Rápido</button>

      <div class="row-fluid"><p style="font-size: 14px;">Módulo para ingresar un nuevo item al inventario, un arriendo o servicio. </p><p>También puedes hacer un ingreso mediante codigos de barra, en la pestaña "INGRESO RAPIDO".</p>
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Nuevo</h5>
          </div>
          <div class="widget-content nopadding">
                    <form class="form-horizontal" method="GET" name="basic_validate" id="basic_validate" action="Entradas2.php">
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Fecha: </label>
                                <div class="controls">
                                    <input class="span3" required type="date" name="fecha" id="fecha">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tipo de item: </label>
                                <div class="controls">
                                  <select class="span3" id="seleccion" name="seleccion" required>
                                    <option id="area" selected value="0">--------</option>
                                    <option id="area1"  value="1">Material / Herramienta</option>
                                    <option id="area3" value="3">Servicio</option>
                                    <option id="area4" value="4">Arriendo</option>
                                  </select>
                                </div>
                              </div>

                              <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Descripción:</label>
                                <div class="controls">
                                    <datalist id="items">
                                        <?php
                                        require '../connect/Connect.php';

                                        $t1="SELECT `detalle`,`id_fabrica` FROM `inventario` WHERE 1";
                                        $q1=mysqli_query($dbc,$t1);
                                        while($row=mysqli_fetch_row($q1)){
                                            echo"<option value='".$row[0]."'>".$row[1]."</option>";
                                        }
                                        mysqli_close($dbc);
                                        ?>
                                    </datalist>
                                  <input maxlength="60" style="text-transform:uppercase;" list="items" class="span8 rst" readonly  required type="text" name="desc" id="desc" >

                                </div>
                              </div>

                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Codigo: </label>
                                <div class="controls">
                                    <input class="span3 rst" readonly required type="text" name="code" id="code">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Codigo de fábrica: </label>
                                <div class="controls">
                                    <input class="span3 rst" style="text-transform:uppercase;" readonly required type="text" name="code_fab" id="code_fab">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">N° Documento: </label>
                                <div class="controls">
                                    <input class="span3 rst" style="text-transform:uppercase;" maxlength="11" min="1"  required type="number" name="documento" id="documento">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Marca fabricante: </label>
                                <div class="controls">
                                    <input class="span4 rst nw" style="text-transform:uppercase;" readonly required type="text" name="marca" id="marca">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Categoria: </label>
                                <div class="controls">
                                    <datalist id="categorias">
                                        <?php
                                        require '../connect/Connect.php';

                                        $t1="SELECT * FROM `categorias` WHERE 1";
                                        $q1=mysqli_query($dbc,$t1);
                                        while($row=mysqli_fetch_row($q1)){
                                            echo'<option value="'.$row[1].'">'.$row[1].'</option>';
                                        }
                                        mysqli_close($dbc);

                                        ?>
                                    </datalist>
                                    <input list="categorias"  style="text-transform:uppercase;"  class="span8 rst nw" readonly required type="text" name="cat" id="cat" >
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Unidad de medida: </label>
                                <div class="controls">
                                    <input class="span3 rst nw" style="text-transform:uppercase;" readonly required list="tips" type="text" name="unidad" id="unidad">
                                    <datalist id=tips>
                                        <?php
                                        require '../connect/Connect.php';

                                        $t1="SELECT * FROM `medida` WHERE 1";
                                        $q1=mysqli_query($dbc,$t1);
                                        while($row=mysqli_fetch_row($q1)){
                                            echo'<option value="'.$row[1].'">'.$row[1].'</option>';
                                        }
                                        mysqli_close($dbc);

                                        ?>
                                    </datalist>
                                </div>
                            </div>



                            <div class="control-group ">
                                <label class="control-label">Bodega de destino: </label>
                                <div class="controls">
                                    <datalist id="bodegas">
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
                                    <input list="bodegas" style="text-transform:uppercase;" readonly class="span3 rst nw" name="select2" id="select2" required>
                                </div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label">Sección: </label>
                                <div class="controls">
                                    <datalist id="seccion">

                                    </datalist>
                                  <input list="seccion" style="text-transform:uppercase;" readonly class="span3 rst nw" name="select3" id="select3" required>

                                </div>
                            </div>

                            <div class="control-group  material herramienta ">
                                <label class="control-label">Dias de duración: </label>
                                <div class="controls" >
                                    <input class="rst span3" type="number" readonly name="dura" min="0" id="dura"  required/>
                                </div>
                            </div>
                            <div class="control-group material herramienta" id="cantidad">

                                <label class="control-label">Stock Crítico: </label>
                                <div class="controls">
                                    <input class="span2 rst nw" readonly required type="number" min="0" name="stock_opt" id="stock_opt" >
                                </div>
                                <label class="control-label">Cantidad: </label>
                                <div class="controls">
                                    <input class="span2 rst nw" readonly required type="number" step="0.001" min="0.001" name="cant" id="cant" >
                                </div>


                            </div>
                            <div class="control-group  material herramienta ">
                                <label class="control-label">Precio neto unitario: </label>
                                <div class="controls" >
                                    <input class="rst span3 nw" type="number"  name="precio" min="0" id="precio"  required/>
                                </div>
                            </div>

                                <div class="control-group arriendo servicio">
                                    <label class="control-label">Total Neto: </label>
                                    <div class="controls" >
                                        <input class="rst span4" type="number" readonly name="monto" minlength="0" min="0" id="monto" required/>
                                    </div>
                                </div>

                              <div class="control-group">
                                  <div class="controls" >
                                    <button style="color: white" disabled id="guardar"  class="btn btn-success btn-large"  type="submit">Guardar item</button>
                                  </div>
                              </div>
                    </form>








              <div id="automatico"  class="modal hide " aria-hidden="true" style="display: none;">

                  <div class="modal-header" >
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Ingreso automático de item</h3>
                  </div>
                  <div class="modal-body">
                      <form class="form-horizontal" method="GET" action="faster.php" >
                          <div class="control-group ">
                              <label class="control-label" >Fecha: </label>
                              <div class="controls">
                                  <input class="span6" value="<?php echo date('Y-m-d'); ?>" readonly required type="date" name="fecha2" id="fecha2">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Codigo: </label>
                              <div class="controls">
                                  <input class="span6" required type="number" name="code2" id="code2">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label">N° Documento:</label>
                              <div class="controls">
                                  <input maxlength="60" class="span6 rst" readonly required type="number" name="docu" id="docu" >
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Cantidad:</label>
                              <div class="controls">
                                  <input min="0" class="span5 " readonly required type="number" step="0.001" min="0.001"  name="cant2" id="cant2" >
                              </div>
                          </div>

                          <div class="control-group">
                              <label class="control-label">Descripción:</label>
                              <div class="controls">
                                  <input maxlength="60" class="span12" readonly  required type="text" name="desc2" id="desc2" >
                              </div>
                          </div>
                          <div class="control-group">
                              <div class="controls">
                                  <button style="color: white" disabled id="guardar2" class="btn btn-success " type="submit" >Guardar item</button>             <a data-dismiss="modal btn-danger" class="btn" href="#">Cancelar</a>
                              </div>
                          </div>
                      </form>


                  </div>

              </div>





              <div id="myModal" data-controls-modal="myModal" data-backdrop="static" data-keyboard="false"  class="modal hide " aria-hidden="true" style="display: none;">
                  <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">X</button>
                      <h3>Ingreso de item</h3>
                  </div>
                  <div class="modal-body">
                      <p style="font-size: 19px;">Ingreso realizado con éxito</p>
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
  <div id="footer" class="span12"> 2021 Desarrollo web - by leonel carreño <a href="http://themedesigner.in">Ingeniero de la Universidad de Talca</a> </div>
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

        $("#precio").change(function(){
            if($("#cant").val()>0){
                var v1=$("#precio").val();
                var v2=$("#cant").val();
                var v3=v1*v2;

                $("#monto").val(v3);
            }
        });

        $("#cant").change(function(){
            $("#guardar").prop("disabled", true);
            if($("#precio").val()>0){
                var v1=$("#cant").val();
                var v2=$("#precio").val();
                var v3=v1*v2;

                $("#monto").val(v3);
            }
            if($("#monto").val() > 0){
                $("#guardar").removeAttr("disabled");
            }
        });

        $("#ing_aut").click(function(){
            $("#code2").prop("readonly", false);
            $("#code2").val("");

            $("#desc2").val("");
            $("#docu").prop("readonly", true);
            $("#cant2").prop("readonly", true);
            $("#docu").val("");
            $("#cant2").val("");
        });


        $("#automatico").on('shown.bs.modal', function () {
            $("#code2").focus();
        });

        $("#documento").change( function(){
            $(this).prop("readonly", true);
        });

        $("#code_fab").change( function(){
            $("#guardar").prop("disabled", true);

            if($(this).val() > 0){
                $(this).prop("readonly",true);
            }
        });


        $("#code2").change( function(){
            $("#code2").prop("readonly", true);
            var cc=$(this).val();
            $.ajax({
                type: "GET",
                url: "get_desc.php",
                data:"code="+cc,
                success: function(respuesta) {
                    if(respuesta.ds===""){
                        alert("Elemento nuevo. Se debe registrar de forma manual.");
                        window.location.href = 'Entradas.php';
                    }else{
                        $("#desc2").val(respuesta.ds);
                        $(this).prop("readonly",true);
                        $("#docu").prop("readonly", false);
                        $("#docu").focus();
                        if(this.val()===0){
                            $("#docu").prop("readonly", true);
                        }
                    }
                }
            });

        });

        $("#docu").change(function(){
            $("#code2").prop("readonly", true);
            $("#docu").prop("readonly", true);
            $("#cant2").prop("readonly", false);
            $("#cant2").focus();

        });

        $("#cant2").change(function(){
            $("#guardar2").prop("disabled",false);
        });


        $("#cat").change( function(){
            $(this).prop("readonly", true);
        });

        $("#unidad").change( function(){
            $(this).prop("readonly", true);
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }
        });
        $("#cant").change( function(){
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }
        });
        $("#stock_opt").change( function(){
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }
        });
        $("#marca").change( function(){
            if($(this).val() === ""){
                $(this).prop("readonly", false);
                $("#guardar").prop("disabled", true);
            }else{
                $(this).prop("readonly", true);

            }
        });
        $("#dura").change( function(){
            $(this).prop("readonly", true);
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }
        });
        $("#code_fab").change( function(){
            $(this).prop("readonly", true);
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }
        });


        $("#precio").change( function(){
            if($(this).val() === ""){
                $("#guardar").prop("disabled", true);
            }else{
                $("#guardar").prop("disabled", false);
            }
        });

        $("#select2").change( function(){
            $("#select2").prop("readonly",true);
            var bod=$(this).val();
                $.ajax ({
                    type: "GET",
                    url: "get_seccion.php",
                    data:"bod="+bod,
                    success: function(html){
                        $("#seccion").html(html);
                        $("#select3").prop("readonly",false);
                    }
                });
        });

        $("#select3").change( function(){
            $(this).prop("readonly",true);
        });



        $("#seleccion").change( function() {
            $(".rst").val("");
            $("#code").prop("readonly", true);
            $("#code_fab").prop("readonly", true);
            $("#desc").prop("readonly", true);
            $("#dura").prop("readonly", true);
            $("#cat").prop("readonly", true);
            $("#unidad").prop("readonly", true);
            $("#cant").prop("readonly", true);
            $("#monto").prop("readonly", true);
            $("#precio").prop("readonly", false);
            $("#select2").prop("readonly", true);
            $("#select3").prop("readonly", true);
            $("#guardar").prop("readonly", true);
            if ($(this).val() === "1") {
                $(".rst").prop("value",'');
                $("#code").prop("readonly", true);
                $("#desc").prop("readonly", false);


               $("#desc").change(function(){
                       var desc=$(this).val();
                       $.ajax({
                           type: "GET",
                           url: "get_code.php",
                           data:"desc="+desc,
                           success: function(respuesta) {
                               if(respuesta.estado==='yes') {
                                   $("#code").val(respuesta.nm);
                                   $("#desc").prop("readonly", true);
                                   if (respuesta.mc === "") {
                                       $("#marca").val("");
                                       $("#marca").prop("readonly", false);
                                   } else {
                                       $("#marca").val(respuesta.mc);
                                       $("#marca").prop("readonly", true);

                                   }
                                   if (respuesta.cf === "") {
                                       $("#code_fab").val("");
                                       $("#code_fab").prop("readonly", false);
                                   } else {
                                       $("#code_fab").val(respuesta.cf);
                                       $("#code_fab").prop("readonly", true);

                                   }

                                   if (respuesta.ub1 === "") {
                                       $("#select2").val("");
                                       $("#select2").prop("readonly", false);
                                       $("#select3").val("");
                                       $("#select3").prop("readonly", false);
                                   } else {
                                       $("#select2").val(respuesta.ub1);
                                       $("#select3").val(respuesta.ub2);
                                       $("#select2").prop("readonly", true);
                                       $("#select3").prop("readonly", true);
                                   }

                                   if (respuesta.md === "") {
                                       $("#unidad").val("");
                                       $("#unidad").prop("readonly", false);
                                   } else {
                                       $("#unidad").val(respuesta.md);
                                       $("#unidad").prop("readonly", true);

                                   }
                                   if (respuesta.sop === "") {
                                       $("#stock_opt").val("");
                                       $("#stock_opt").prop("readonly", false);
                                   } else {
                                       $("#stock_opt").val(respuesta.sop);
                                       $("#stock_opt").prop("readonly", true);

                                   }
                                   if (respuesta.ct === "") {
                                       $("#cat").val("");
                                       $("#cat").prop("readonly", false);
                                   } else {
                                       $("#cat").val(respuesta.ct);
                                       $("#cat").prop("readonly", true);

                                   }
                               }else{
                                   $("#code").val(respuesta.cod);
                                   $("#desc").prop("readonly", true);
                                   $("#marca").prop("readonly", false);
                                   $("#code_fab").prop("readonly", false);
                                   $("#precio").prop("readonly", false);
                                   $("#select2").prop("readonly", false);
                                   $("#select3").prop("readonly", false);
                                   $("#unidad").prop("readonly", false);
                                   $("#stock_opt").prop("readonly", false);
                                   $("#cat").prop("readonly", false);
                               }
                           }
                       });

                   $("#dura").prop("disabled", true);
                   $("#cant").prop("readonly", false);
                   $("#precio").prop("readonly", false);

               });

            } else if ($(this).val() === "3") {
                $(".rst").prop("value",'');
                $("#code").prop("readonly", true);
                $("#dura").prop("readonly", false);
                $("#code_fab").prop("disabled", true);
                $("#desc").prop("readonly", false);
                $("#marca").prop("disabled", true);
                $("#cat").prop("disabled", true);
                $("#unidad").prop("disabled", true);
                $("#cant").prop("readonly", false);
                $("#stock_opt").prop("disabled", true);
                $("#select2").prop("disabled", true);
                $("#select3").prop("disabled", true);
                $("#precio").prop("readonly", false);
                $("#monto").prop("readonly", true);

                $("#desc").change(function(){
                    var desc=$(this).val();
                    $.ajax({
                        type: "GET",
                        url: "get_code3.php",
                        data:"desc="+desc,
                        success: function(respuesta) {
                            $("#code").val(respuesta.cod3);
                        }
                    });
                });

            }else if ($(this).val() === "4") {
                $("#code").prop("readonly", false);
                $(".rst").prop("value",'');
                $("#dura").prop("readonly", false);
                $("#code_fab").prop("disabled", true);
                $("#code").prop("readonly", true);
                $("#marca").prop("disabled", true);
                $("#desc").prop("readonly", false);
                $("#cat").prop("disabled", true);
                $("#unidad").prop("disabled", true);
                $("#stock_opt").prop("disabled", true);
                $("#cant").prop("readonly", false);
                $("#monto").prop("readonly", true);
                $("#select2").prop("disabled", true);
                $("#select3").prop("disabled", true);
                $("#precio").prop("readonly", false);

                $("#desc").change(function(){
                    var desc=$(this).val();
                    $.ajax({
                        type: "GET",
                        url: "get_code2.php",
                        data:"desc="+desc,
                        success: function(respuesta) {
                            $("#code").val(respuesta.cod2);
                        }
                    });
                });


            }else{
                $(".rst").prop("value",'');
                $("#code").prop("readonly", true);
                $("#marca").prop("readonly", true);
                $("#code_fab").prop("readonly", true);
                $("#desc").prop("readonly", true);
                $("#cat").prop("readonly", true);
                $("#unidad").prop("readonly", true);
                $("#cant").prop("readonly", true);
                $("#monto").prop("readonly", true);
                $("#select2").prop("readonly", true);
                $("#precio").prop("readonly", true);
                $("#guardar").prop("readonly", true);
                $("#dura").prop("readonly", true);

            }

        });

    });
</script>

<script>

    function formatNumber(num) {
        if (!num || num === 'NaN') return '-';
        if (num === 'Infinity') return '&#x221e;';
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num === (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
            num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
        return (((sign) ? '' : '-') + num + ',' + cents);
    }

</script>


</body>
</html>
