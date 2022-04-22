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
                <li><a href="../../index.php"><i class="icon-key"></i> Salir</a></li>
            </ul>
        </li>
    </ul>
</div>


<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
    <ul>
        <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
        <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
        <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
        <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
        <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
        <li class="active" ><a href="Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisicion</span></a></li>
        <li><a href="Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
        <li><a href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>
        <li><a title="Facturas"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
        
        <li ><a title="Centros de costos"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Centros de costos</span></a></li>


    </ul>
</div>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Requerimiento</a> </div>
        <h1>Solicitar Stock</h1>
    </div>
    <div class="container-fluid">
        <div class="span11">
            <div class="row-fluid"><p style="font-size: 14px;">Completa el formulario para relizar una petición de consulta, envío o reserva de stock. </p> <p style="font-size: 13px;">1) Ingresa el nombre o parte de él en el campo habilitado. </p><p style="font-size: 13px;">2) Ingresa la cantidad a solicitar. </p><p style="font-size: 13px;">3) Para agregar a la lista oprime 'Agregar item'. </p><p style="font-size: 13px;">4) Cuando estes listo oprime solicitar al fondo del módulo. </p><hr>
                <div class="widget-content tab-content">
                    <div class="widget-content nopadding">

                        <div style="display: flex;">
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Fecha: </label>
                                <div class="controls">
                                    <input class="span10" value="<?php echo date('Y-m-d');; ?>" readonly required type="date" name="fecha" id="fecha">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">N° Requisición: </label>
                                <?php
                                include '../connect/Connect.php';
                                    $id6=20000;
                                $ca4="SELECT MAX(`Id_Solicitud`) FROM `solicitud`";
                                $qa4=mysqli_query($dbc,$ca4);
                                if ($qa4 == false) {
                                    die('Error SQL $qau4: ' . mysqli_error($dbc));
                                }else {
                                        while ($r6 = mysqli_fetch_row($qa4)) {
                                            if($r6[0]===null){
                                                $id6=20000;
                                            }else {
                                                $id6 = $r6[0];
                                            }
                                        }
                                        $id6 += 1;
                                }
    
                                ?>
                                <div class="controls">
                                    <input class="span12" value="<?php echo $id6; ?>" readonly required type="number" name="requisi" id="requisi">
                                </div>
                            </div>
                        </div>

                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Codigo: </label>
                                <div class="controls">
                                    <input class="span3 rst" readonly required type="text" name="code" id="code">
                                </div>
                            </div>
                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Descripción:</label>
                                <div class="controls">
                                    <datalist id="items">
                                        <?php
                                        require '../connect/Connect.php';

                                        $t1="SELECT `detalle` FROM `inventario` WHERE 1";
                                        $q1=mysqli_query($dbc,$t1);
                                        while($row=mysqli_fetch_row($q1)){
                                            echo'<option value="'.$row[0].'">'.$row[0].'</option>';
                                        }
                                        mysqli_close($dbc);
                                        ?>
                                    </datalist>
                                    <input maxlength="60" style="text-transform:uppercase;" list="items" class="span8 rst"  required type="text" name="desc" id="desc" >

                                </div>
                            </div>

                            <div class="control-group material herramienta arriendo servicio">
                                <label class="control-label">Cantidad a solicitar: </label>
                                <div class="controls">
                                    <input class="span3 rst" readonly required type="number" min="0" name="cant_soli" id="cant_soli">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls" >
                                    <button style="color: white" disabled id="agregar"  class="btn btn-success btn-large" >Agregar item</button>
                                    <button style="color: white" id="limpiar" class="btn btn-primary btn-large" >Limpiar</button>
                                </div>
                            </div><br>
                    </div>


                    <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered "  id="cuerpo">
                                    <thead>
                                    <tr>
                                        <th>*</th>
                                        <th style="font-size: 15px;">ID</th>
                                        <th style="font-size: 15px;">Detalle</th>
                                        <th style="font-size: 15px;">Cantidad solicitada</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <button class="btn btn-danger btn-large" id="solicitar" style="color: white" data-toggle="modal" href="#myAlert" disabled>Solicitar</button>

                    <div id="myAlert" class="modal hide " style="display: none;" data-backdrop="static" data-keyboard="false"  aria-hidden="true">

                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">X</button>
                            <h3>Confirmar requisición</h3>
                        </div>

                        <div class="modal-body">
                            <p id="titulo">¿Desea solicitar formalmente los elementos que fueron seleccionados?</p>
                        </div>

                        <div class="modal-footer">
                            <a data-dismiss="modal" id="conf1" class="btn btn-primary" data-toggle="modal" href="#myModal">Confirmar</a>
                            <a data-dismiss="modal" id="cancelar1" class="btn" href="#" onclick="location.reload()">Cancelar</a>
                        </div>

                    </div>




                    <div id="myModal" class="modal hide " aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button" onclick="location.reload()">X</button>
                            <h3>Operación realizada</h3>
                        </div>
                        <div class="modal-body">
                            <p id="titulo_final">Se han realizado la solicitud con exito.</p>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 Desarrollo web - by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
</div>
<!--end-Footer-part-->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery.ui.custom.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.uniform.js"></script>
<script src="../../js/select2.min.js"></script>
<script src="../../js/jquery.dataTables.min.js"></script>
<script src="../../js/matrix.js"></script>
<script src="../../js/matrix.tables.js">    </script>


<script language="JavaScript">
    //funcion para materiales

    $("#desc").change(function() {

        $("#cant_soli").prop('readonly',false);
        var desc = $(this).val();
        $.ajax({
            type: "GET",
            url: "get_code.php",
            data: "desc=" + desc,
            success: function (respuesta) {
                if(respuesta.estado==='yes') {
                    $("#code").val(respuesta.cod);
                    $("#desc").prop("readonly", true);
                }else{
                    $("#desc").val("");
                    $("#desc").prop("readonly", false);
                }
            }
        });
    });

    $("#cant_soli").change(function(){
        $(this).prop('readonly',true);
        $("#agregar").prop('disabled',false);
    });


    $("#agregar").click(function(){

        var v1=$("#code").val();
        var v2=$("#desc").val();
        var v3=$("#cant_soli").val();



        var html='<tr><td class="center cod" style="font-size: 13px; text-align: center;"><a class="cerrar" href="" style="color: red;">Eliminar</a></td><td class="center cod" style="font-size: 15px;">'+v1+'</td><td class="center" style="font-size: 15px;">'+v2+'</td><td class="center cant" style="font-size: 15px;">'+v3+'</td></tr>';

        $(" table ").find("tbody tr:last").after(html);

        $("#solicitar").prop('disabled',false);
        $("#cant_soli").val("");
        $("#desc").val("");
        $("#code").val("");
        $("#desc").prop("readonly", false);
        $("#canti").prop("readonly", true);
        $("#agregar").prop('disabled',true);


    });

    $("#limpiar").click(function () {
        $("#cant_soli").val("");
        $("#desc").val("");
        $("#code").val("");
        $("#desc").prop("readonly", false);
        $("#canti").prop("readonly", true);
    });

    $(".cerrar").click(function(){
        $(this).closest("tr").remove();
    });


    $("#conf1").click(function(){

        $('table tbody tr').each(function () {

            var req=$("#requisi").val();
            var date=$("#fecha").val();
            var id = $(this).find("td").eq(1).html();
            var nombre = $(this).find("td").eq(2).html();
            var cantidad = $(this).find("td").eq(3).html();

            datos={"id": id, "nombre":nombre, "cantidad":cantidad, "req":req, "date":date};

            $.ajax({
                type: "GET",
                url: "grabar_fila.php",
                data: datos,
                success: function (respuesta) {
                    if(respuesta.estado==='ok') {
                    }
                }
            });

        });
    });


</script>
</body>
</html>
