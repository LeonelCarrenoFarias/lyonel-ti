<?php
session_start();
ini_set("default_charset", "UTF-8");
require_once'Connect.php';
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
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom);?></span><b class="caret"> </b></a>
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
            <li><a class="sOutbox" title="" href="Bandeja_Salida.html"><i class="icon-arrow-up"></i> Bandeja Salida</a></li>
            <li class="divider"></li>
            <li><a class="sTrash" title="" href="Msj_eliminados.html"><i class="icon-trash"></i> Eliminados</a></li>
          </ul>
        </li>
        -->
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
        <li class="active"><a href="Orden.php"><i class="icon icon-edit"></i> <span>Orden de Compra</span></a> </li>
        <li><a href="NuevaObra.php"><i class="icon icon-building"></i> <span>Nueva Obra</span></a></li>
        <li><a href="Registros.php"><i class="icon icon-paper-clip"></i> <span>Registro de las Ordenes</span></a> </li>
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
        <div id="breadcrumb"> <a href="../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#">Orden De Compra</a>
            <h1>Crear Orden De Compra</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Validación de datos</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="GET" action="recibir_orden.php" name="basic_validate" id="basic_validate"  >
                                <div class="control-group">
                                    <label class="control-label">Tipo de Adquisición</label>
                                    <div class="controls">
                                        <select class="span6" name="select" id="select" required >
                                            <option value="0">Materiales</option>
                                            <option value="1" >Herramientas</option>
                                            <option value="2" >Servicios</option>
                                            <option value="3">Arriendos</option>
                                        </select>                </div>
                                </div>

                                <!--
                              <div class="control-group">
                                <label class="control-label">N° Factura</label>
                                <div class="controls">
                                  <input  class="span2"  type="number" name="fact" id="fact">
                                </div>
                              </div>-->
                                <div class="control-group">
                                    <label class="control-label">Obra</label>
                                    <div class="controls">
                                        <select required class="span3" name="obra" id="obra" >
                                            <option selected>-------</option>
                                            <?php

                                            $c1="SELECT `Nombre` FROM `obra` WHERE `Estado`=TRUE ";
                                            $q1=mysqli_query($dbc,$c1);
                                            $cc=1;
                                            if ($q1 === false) {
                                                die('Error SQL c1: ' . mysqli_error($dbc));
                                            }else {
                                                $n_o = 0;
                                                while ($r = mysqli_fetch_row($q1)) {
                                                    $n_o = utf8_decode($r[0]);
                                                    echo '
                        <option value="'.$n_o.'">' . utf8_encode($n_o) . '</option>
                        ';
                                                    $cc++;
                                                }
                                            }
                                            ?></select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">N° Orden</label>
                                    <div class="controls">
                                        <?php

                                        $c1="SELECT MAX(`Id_Adquisicion`) FROM `adquisicion`";
                                        $q1=mysqli_query($dbc,$c1);
                                        if ($q1 === false) {
                                            die('Error SQL c1: ' . mysqli_error($dbc));
                                        }else {
                                            $n_o = 0;
                                            while ($r = mysqli_fetch_row($q1)) {
                                                $n_o = $r[0] + 1;
                                            }
                                        }
                                        ?>
                                        <input  class="span2" readonly value="<?php echo $n_o;?>"  type="number" name="orden" id="orden">
                                    </div>
                                </div>
                                <!--
                              <div class="control-group">
                              <label class="control-label">N° Guia Despacho</label>
                              <div class="controls">
                                <input  class="span2"  type="number" name="guia" id="guia">
                              </div>
                            </div>
                -->
                                <div class="control-group">
                                    <label class="control-label">Proveedor</label>
                                    <div class="controls">
                                        <input list="proveedores" class="span4" maxlength="99" required type="text" name="prov" id="prov">
                                        <datalist id="proveedores">
                                            <?php

                                            $c1="SELECT `Id_Proveedor`, `Nombre`,`Direccion` FROM `proveedor` WHERE 1";
                                            $q1=mysqli_query($dbc,$c1);
                                            if ($q1 === false) {
                                                die('Error SQL c1: ' . mysqli_error($dbc));
                                            }else {

                                                while ($rr = mysqli_fetch_row($q1)) {
                                                    echo '<option value="' . $rr[1] . '"></option>';
                                                }
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Rut-Proveedor</label>
                                    <div class="controls">
                                        <input class="span4" minlength="8" maxlength="9" title="Sin puntos ni guión. Si termina en K, remplazalo po un 0." required type="number" name="rut_prov" id="rut_prov">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Dirección</label>
                                    <div class="controls">
                                        <input class="span8" maxlength="99" required type="text" name="dir" id="dir">


                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Ciudad</label>
                                    <div class="controls">
                                        <input class="span3" required type="text" name="city" id="city">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fono</label>
                                    <div class="controls">
                                        <input class="span3" required type="number" maxlength="9" minlength="9" name="fono" id="fono" title="Numero celular de 9 digitos.">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fecha</label>
                                    <div class="controls">
                                        <input class="span3"  value="<?php echo date('Y-m-d')?>" readonly required type="date" name="dat" id="dat">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fecha Necesitada</label>
                                    <div class="controls">
                                        <input class="span3"  value="<?php echo date('Y-m-d')?>" required type="date" name="needdate" id="needdate">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Vendedor</label>
                                    <div class="controls">
                                        <input class="span3"  maxlength="15" required type="text" name="ven" id="ven">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">N° Cotización</label>
                                    <div class="controls">
                                        <input class="span2" required type="number" minlength="8" placeholder="(8 dig. 00000001)" maxlength="8" name="cot" id="cot">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Condición de Pago</label>
                                    <div class="controls">
                                        <select required class="span3" name="pago" id="pago" >
                                            <option value="Contado">Contado</option>
                                            <option value="Crédito" >Crédito</option>
                                        </select>                   </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Fecha Entrega Estimada </label>
                                    <div class="controls">
                                        <input class="span3" required type="date" name="fechaentre" id="fechaentre">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Entrega</label>
                                    <div class="controls">
                                        <select required class="span3" name="despacho" id="despacho" >
                                            <option value="En Local">En Local</option>
                                            <option value="Despacho" >Despacho</option>
                                            <option value="A Convenir">A Convenir</option>

                                        </select>                   </div>
                                </div>




                                <div class="widget-box">
                                    <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>CANTIDAD</th>
                                                <th>NOMBRE</th>
                                                <th>DESCRIPCION</th>
                                                <th>PRECIO U.</th>
                                                <th>TOTAL NETO</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <!--FILA1-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti"  type="number" name="cant1" minlength="0" id="cant1"></td>
                                                <td style="width: 25%"><input list="nombres1" class="span12 nombre"   type="text" name="nombre1" id="nombre1"><datalist class="nombre" id="nombres1">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]); echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb2=utf8_decode($row[0]); echo '<option value="'.utf8_encode($nomb2).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones1" class="descrip span12"  type="text" name="descripcion1" id="descripcion1"><datalist id="descripciones1"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$descr=utf8_decode($row[0]);
                                                            echo '<option value="'.utf8_encode($descr).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$descr2=utf8_decode($row[0]);echo '<option value="'.utf8_encode($descr2).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$arr=utf8_decode($row[0]);echo '<option value="'.utf8_encode($arr).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$serv=utf8_decode($row[0]);echo '<option value="'.utf8_encode($serv).'"></option>';}  ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio1" id="precio1" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto1" id="Tneto1">
                                                </td>
                                            </tr>


                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant2" id="cant2"></td>
                                                <td style="width: 25%"><input list="nombres2" class="span12 nombre"   type="text" name="nombre2" id="nombre2"><datalist class="nombre" id="nombres2">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]); echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb2=utf8_decode($row[0]); echo '<option value="'.utf8_encode($nomb2).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones2" class="span12 descrip"  type="text" name="descripcion2" id="descripcion2"><datalist id="descripciones2"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$descr=utf8_decode($row[0]); echo '<option value="'.utf8_encode($descr).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$descr2=utf8_decode($row[0]);echo '<option value="'.utf8_encode($descr2).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$arri=utf8_decode($row[0]); echo '<option value="'.utf8_encode($arri).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$serv=utf8_decode($row[0]); echo '<option value="'.utf8_encode($serv).'"></option>';}  ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio2" id="precio2" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto2" id="Tneto2">
                                                </td>
                                            </tr>



                                            <!--FILA3-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0" type="number" name="cant3" id="cant3"></td>
                                                <td style="width: 25%"><input list="nombres3" class="span12 nombre"   type="text" name="nombre3" id="nombre3"><datalist class="nombre" id="nombres3">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]); echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb2=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb2).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones3" class="span12 descrip"  type="text" name="descripcion3" id="descripcion3"><datalist id="descripciones3"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$descr=utf8_decode($row[0]);echo '<option value="'.utf8_encode($descr).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$descr2=utf8_decode($row[0]);echo '<option value="'.utf8_encode($descr2).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$arr=utf8_decode($row[0]);echo '<option value="'.utf8_encode($arr).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$serv=utf8_decode($row[0]);echo '<option value="'.utf8_encode($serv).'"></option>';} ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio3" id="precio3" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto3" id="Tneto3">
                                                </td>
                                            </tr>


                                            <!--FILA4-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant4" id="cant4"></td>
                                                <td style="width: 25%"><input list="nombres4" class="span12 nombre"   type="text" name="nombre4" id="nombre4"><datalist class="nombre" id="nombres4">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones4" class="span12 descrip"  type="text" name="descripcion4" id="descripcion4"><datalist id="descripciones4"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}  ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio4" id="precio4" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto4" id="Tneto4">
                                                </td>
                                            </tr>


                                            <!--FILA5-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant5" id="cant5"></td>
                                                <td style="width: 25%"><input list="nombres5" class="span12 nombre"   type="text" name="nombre5" id="nombre5"><datalist class="nombre" id="nombres5">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones5" class="span12 descrip"  type="text" name="descripcion5" id="descripcion5"><datalist id="descripciones5"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio5" id="precio5" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto5" id="Tneto5">
                                                </td>
                                            </tr>


                                            <!--FILA6-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant6" id="cant6"></td>
                                                <td style="width: 25%"><input list="nombres6" class="span12 nombre"   type="text" name="nombre6" id="nombre6"><datalist class="nombre" id="nombres6">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones6" class="span12 descrip"  type="text" name="descripcion6" id="descripcion6"><datalist id="descripciones6"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_decode($nomb).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}  ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio6" id="precio6" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto6" id="Tneto6">
                                                </td>
                                            </tr>


                                            <!--FILA7-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant7" id="cant7"></td>
                                                <td style="width: 25%"><input list="nombres7" class="span12 nombre"   type="text" name="nombre7" id="nombre7"><datalist class="nombre" id="nombres7">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td><td style="width: 35%"><input list="descripciones7" class="span12 descrip"  type="text" name="descripcion7" id="descripcion7"><datalist id="descripciones7"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio7" id="precio7" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto7" id="Tneto7">
                                                </td>
                                            </tr>

                                            <!--FILA8-->
                                            <tr class="odd gradeX">
                                                <td style="width: 10%"><input class="span12 canti" minlength="0"  type="number" name="cant8" id="cant8"></td>
                                                <td style="width: 25%"><input list="nombres8" class="span12 nombre"   type="text" name="nombre8" id="nombre8"><datalist class="nombre8" id="nombres8">
                                                        <?php $consulta1="SELECT `Nombre` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Nombre` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} ?></datalist></td>
                                                <td style="width: 35%"><input list="descripciones8" class="span12 descrip"  type="text" name="descripcion8" id="descripcion8"><datalist id="descripciones8"><?php $consulta1="SELECT `Descripcion` FROM `material` WHERE `Estado`=TRUE ";$query=mysqli_query($dbc,$consulta1);while ($row=mysqli_fetch_row($query)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';}$consulta2="SELECT `Descripcion` FROM `herramienta` WHERE `Estado`=TRUE ";$query2=mysqli_query($dbc,$consulta2);while ($row=mysqli_fetch_row($query2)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta3="SELECT `Descripcion` FROM `arriendo` WHERE `Estado`=TRUE ";$query3=mysqli_query($dbc,$consulta3);while ($row=mysqli_fetch_row($query3)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} $consulta4="SELECT `Descripcion` FROM `servicio` WHERE `Estado`=TRUE ";$query4=mysqli_query($dbc,$consulta4);while ($row=mysqli_fetch_row($query4)) {$nomb=utf8_decode($row[0]);echo '<option value="'.utf8_encode($nomb).'"></option>';} mysqli_close($dbc);?>
                                                    </datalist></td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo" minlength="0"  type="number" name="precio8" id="precio8" >
                                                </td>
                                                <td style="width: 15%" class="center"><input class="span12 calculo2" readonly  type="number" name="Tneto8" id="Tneto8">
                                                </td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <br>
                                <div class="control-group">
                                    <label class="control-label">Observación</label>
                                    <div class="controls">
                                        <input class="span10 obs" maxlength="100" required type="text" name="obs" id="obs">
                                    </div>
                                </div> <br>

                                <!--
                                <div class="control-group">
                                  <label class="control-label">Total Neto</label>
                                  <div class="controls">
                                    <input class="span3" autocomplete="" required disabled type="number" name="tnet" id="tnet">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">Total Iva</label>
                                  <div class="controls">
                                    <input class="span3" autocomplete="" required disabled type="number" name="tiva" id="tiva">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">Total</label>
                                  <div class="controls">
                                    <input class="span3" autocomplete="" required disabled type="number" name="total" id="total">
                                  </div>
                                </div>-->

                                <div class="form-actions">
                                    <button type="submit"  value="Guardar" class="btn btn-warning btn-large" >Guardar</button>
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


    $("#select").change( function() {
        if ($(this).val() === "0") {
            $(".nombre").prop("disabled", false);
            $("#nombre").val("");
            $("#descripcion").val("");


        }
        else if ($(this).val() === "1") {
            $(".nombre").prop("disabled", false);
            $("#nombre").val("");
            $("#descripcion").val("");
        }
        else if ($(this).val() === "2") {
            $(".nombre").prop("disabled", true);
            $("#nombre").val("");
            $("#descripcion").val("");
        }
        else{
            $(".nombre").prop("disabled", true);
            $("#nombre").val("");
            $("#descripcion").val("");
        }

    });


    /* $("#fact").change(function(e){

     var fact=$("#fact").val();
     e.preventDefault();
     //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
     datos = {"fact":fact};
     $.ajax({
     url: "verificar_factura.php",
     type: "GET",
     data: datos
     }).done(function (data) {
     if (data.estado === "ok") {
     alert("Numero de factura ya existe en la base de datos");
     $("#fact").val(null);

     }
     });

     });*/

    //funciones para calculos de total neto.

    function ucfirst(string){
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    $("#prov").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $("#dir").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $("#ven").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $("#city").keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });



    $("#prov").change(function(e){
        var cont=0;

        var nom_prov=$(this).val();
        e.preventDefault();
        //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
        datos = {"nom":nom_prov};
        $.ajax({
            url: "obt_nom.php",
            type: "GET",
            data: datos
        }).done(function (respuesta) {
            console.log("success");
            $.each(respuesta, function(index, vale) {

                if(cont===0) {
                    $("#rut_prov").val(parseInt(vale));
                    $("#rut_prov").prop('readonly',true);
                }else if(cont===1){
                    $("#city").val(vale);
                    $("#city").prop('readonly',true);
                }else if(cont===2){
                    $("#dir").val(vale);
                    $("#dir").prop('readonly',true);
                }else{
                    $("#fono").val(parseInt(vale));
                    $("#fono").prop('readonly',true);
                }
                cont++;
            });
        });


    });



    $("#prov").keydown(function(e){
        $("#rut_prov").prop('readonly',false);
        $("#rut_prov").val(0);
        $("#city").prop('readonly',false);
        $("#city").val("");
        $("#dir").prop('readonly',false);
        $("#dir").val("");
        $("#fono").prop('readonly',false);
        $("#fono").val(0);
    });


    $(".canti").change(function(){
        var cantidad=$(this).closest("tr").find("input.canti").val();
        $(".calculo").change(function(){
            var valor=$(this).closest("tr").find("input.calculo").val();
            var total_neto=valor*cantidad;

            $(this).closest("tr").find("input.calculo2").val(total_neto);
        });

        $(this).closest("tr").find("input.nombre").prop('required',true);
        $(this).closest("tr").find("input.descrip").prop('required',true);
        $(this).closest("tr").find("input.calculo").prop('required',true);

        if($(".calculo").length <= 0 && $(".canti").length <= 0 && $(".descrip").length <= 0 && $(".nombre").length <= 0){

            $(this).closest("tr").find("input.descrip").prop('required',false);
            $(this).closest("tr").find("input.calculo2").val("");
            $(this).closest("tr").find("input.nombre").prop('required',false);
            $(this).closest("tr").find("input.calculo").prop('required',false);
            $(this).closest("tr").find("input.canti").prop('required',false);
        }
    });

    $(".calculo").change(function(){
        var valor=$(this).closest("tr").find("input.calculo").val();

        $(".canti").change(function(){
            var cantidad=$(this).closest("tr").find("input.canti").val();

            var total_neto=valor*cantidad;

            $(this).closest("tr").find("input.calculo2").val(total_neto);
        });

        $(this).closest("tr").find("input.nombre").prop('required',true);
        $(this).closest("tr").find("input.descrip").prop('required',true);
        $(this).closest("tr").find("input.canti").prop('required',true);

        if($(".calculo").length <= 0 && $(".canti").length <= 0 && $(".descrip").length <= 0 && $(".nombre").length <= 0){

            $(this).closest("tr").find("input.descrip").prop('required',false);
            $(this).closest("tr").find("input.calculo2").val("");
            $(this).closest("tr").find("input.nombre").prop('required',false);
            $(this).closest("tr").find("input.calculo").prop('required',false);
            $(this).closest("tr").find("input.canti").prop('required',false);
        }
    });


    $(".calculo2").change(function(){



        if($(".calculo").length <= 0 && $(".canti").length <= 0 && $(".descrip").length <= 0 && $(".nombre").length <= 0){

            $(this).closest("tr").find("input.descrip").prop('required',false);
            $(this).closest("tr").find("input.calculo2").val("");
            $(this).closest("tr").find("input.nombre").prop('required',false);
            $(this).closest("tr").find("input.calculo").prop('required',false);
            $(this).closest("tr").find("input.canti").prop('required',false);
        }
    });

    $('.nombre').keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });


    $('.descrip').keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });
    $('.obs').keyup(function(){
        // force: true to lower case all letter except first
        var cp_value= ucfirst($(this).val().toLowerCase(),true) ;
        // to capitalize all words
        $(this).val(cp_value );
    });

    $(".nombre").change(function(){

        $(this).closest("tr").find("input.calculo").prop('required',true);
        $(this).closest("tr").find("input.descrip").prop('required',true);
        $(this).closest("tr").find("input.canti").prop('required',true);

        if($(".calculo").length <= 0 && $(".canti").length <= 0 && $(".descrip").length <= 0 && $(".nombre").length <= 0){

            $(this).closest("tr").find("input.descrip").prop('required',false);
            $(this).closest("tr").find("input.calculo2").val("");
            $(this).closest("tr").find("input.nombre").prop('required',false);
            $(this).closest("tr").find("input.calculo").prop('required',false);
            $(this).closest("tr").find("input.canti").prop('required',false);
        }
    });

    $(".descrip").change(function(){

        $(this).closest("tr").find("input.calculo2").prop('required',true);
        $(this).closest("tr").find("input.nombre").prop('required',true);
        $(this).closest("tr").find("input.calculo").prop('required',true);
        $(this).closest("tr").find("input.canti").prop('required',true);

        if($(".calculo").length <= 0 && $(".canti").length <= 0 && $(".descrip").length <= 0 && $(".nombre").length <= 0){

            $(this).closest("tr").find("input.descrip").prop('required',false);
            $(this).closest("tr").find("input.calculo2").val("");
            $(this).closest("tr").find("input.nombre").prop('required',false);
            $(this).closest("tr").find("input.calculo").prop('required',false);
            $(this).closest("tr").find("input.canti").prop('required',false);
        }
    });




</script>


</body>
</html>
