
<?php
session_start();
require '../connect/Connect.php';
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
<div id="user-nav" class="navbar navbar-inverse" style="float: left;">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages"  ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido Don: <?php echo utf8_encode($nom) ?></span><b class="caret"> </b></a>
      <ul class="dropdown-menu">
        <li><a href=""><i class="icon-user"></i> Mi Perfil</a></li>
        <li class="divider"></li>
        <li><a href="../../index.php"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>

  </ul>
</div>

<!--close-top-serch--> 

<!--sidebar-menu-->

    <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
      <ul>
        <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
        <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
        <li class="active"><a href="Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
        <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
        <li><a href="../Servicios/Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
        <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
        <li><a href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
          <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>

      </ul>
    </div>
    <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="../../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Stock</a>
            </div>
            <h1>Inventario de Repuestos-Materiales-Herramientas</h1>
          </div>
        <div class="container-fluid"><p style="font-size: 14px;">Detalle completo de las existencias en bodegas de la empresa. La tabla cuenta con un buscador inteligente, solo esribe lo que buscas y listo.</p>
            <div class="span12">
                    <div class="widget-content tab-content" style="margin-top: -20px;">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                  <h5>Inventario consolidado</h5>
                                </div>
                                <div class="widget-content nopadding">
                                      <table id="tabla1" class="table table-bordered data-table" ">
                                        <thead>
                                        <tr>
                                            <th style="font-size: 15px; text-align: left;">CODE39</th>
                                            <th style="font-size: 15px; text-align: left;">ID SISTEMA</th>
                                            <th style="font-size: 15px; text-align: left;">CÓDIGO DE FABRICA</th>
                                            <th style="font-size: 15px; text-align: left;">NOMBRE Y DESCRIPCIÓN</th>
                                            <th style="font-size: 15px; text-align: left;">STOCK</th>
                                            <th style="font-size: 15px; text-align: left;">MARCA</th>
                                            <th style="font-size: 15px; text-align: left;">CATEGORÍA</th>
                                            <th style="font-size: 15px; text-align: left;">UBICACIÓN</th>
                                            <th style="font-size: 15px; text-align: left;">UNIDAD</th>
                                            <th style="font-size: 15px; text-align: left;">PRECIO($)</th>
                                            <th style="font-size: 15px; text-align: center;">ÚLTIMO INGRESO</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        include '../connect/Connect.php';

                                        $tx1="SELECT `code`,`id_fabrica`, `detalle`, `cantidad`, `marca`, `valor`, `ubicacion` FROM `inventario` WHERE 1";
                                        $qx1=mysqli_query($dbc,$tx1);
                                        while($row=mysqli_fetch_row($qx1)){

                                            $tx2="SELECT `Code`, `Medida`, `Stock_Optimo`, `Monto`, `Categoria`, `Fecha_Ingreso`, `Estado` FROM `det_material` WHERE `code`=$row[0] ORDER BY `Id_Detalle_Material` DESC ";
                                            $qx2=mysqli_query($dbc,$tx2);
                                            if($qx2){
                                                $row2=mysqli_fetch_row($qx2);
                                                $nnm=number_format($row[5], 0, ',', '.');

                                                    echo '<tr>
                                                    <td style="text-align: center"><a target="_blank" href="php-barcode-master/Codigo_Barra.php?code='.$row[0].'"><i class="icon icon-print icon-large" ></i></a></td>
                                                    <td>' . $row[0] . '</td>
                                                    <td>' . $row[1] . '</td>
                                                    <td>' . $row[2] . '</td>
                                                    <td>' . $row[3] . '</td>
                                                    <td style="text-align: center;">' . $row[4] . '</td>
                                                    <td style="text-align: center;">' . $row2[4] . '</td>
                                                    <td style="text-align: center;">' . $row[6] . '</td>
                                                    <td style="text-align: center;">' . $row2[1] . '</td>
                                                    <td style="text-align: right;">' . $nnm . '</td>
                                                    <td style="text-align: center;">' . $row2[5] . '</td>
                                                   
                                                   </tr>';

                                            }else{
                                                $nnm=number_format($row[5], 0, ',', '.');
                                                echo '<tr>
                                                    <td>' . $row[0] . '</td>
                                                    <td>' . $row[1] . '</td>
                                                    <td>' . $row[2] . '</td>
                                                    <td>' . $row[3] . '</td>
                                                    <td style="text-align: center;">' . $row[4] . '</td>
                                                    <td style="text-align: center;">-</td>
                                                    <td style="text-align: center;">' . $row[6] . '</td>
                                                    <td style="text-align: center;">-</td>
                                                    <td style="text-align: right;">' . $nnm . '</td>
                                                    <td style="text-align: center;">-</td>
                                                   
                                                   </tr>';
                                            }

                                        }
                                        ?>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 Desarrollo web- by leonel carreño <a href="">Universidad de Talca</a> </div>
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
<script>

    $(document).ready(function () {

    });
</script>
</body>
</html>
