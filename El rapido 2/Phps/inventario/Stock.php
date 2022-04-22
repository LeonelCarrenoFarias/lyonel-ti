
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
<body style="zoom: 98%">

<!--Header-part-->
<div id="header">
  <h1><a href="../../index.php">El Rapido 2 - Inventario y requisiciones</a></h1>
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
          <li><a title="Informes"  href="../Facturas/facturas.php"><i class="icon icon-check"></i> <span>Facturas</span></a></li>
          <li><a title="Clientes"  href="../Centros/centros.php"><i class="icon icon-check"></i> <span>Clientes</span></a></li>
      </ul>
    </div>
    <div id="content">
          <div id="content-header">
            <div id="breadcrumb"> <a href="../../../index.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Stock</a>
            </div>
            <h1>Inventario de Repuestos-Materiales-Herramientas</h1>
          </div>
        <div class="container-fluid"><p style="font-size: 14px;">Detalle completo de las existencias en bodegas. La tabla cuenta con un buscador inteligente, solo escribe lo que buscas y listo.</p>
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
                                            <th style="font-size: 15px; text-align: center;">CODE 128</th>
                                            <th style="font-size: 15px; text-align: left;">ID SISTEMA</th>
                                            <th style="font-size: 15px; text-align: left;">CÓDIGO DE FABRICA</th>
                                            <th style="font-size: 15px; text-align: left;">DESCRIPCIÓN</th>
                                            <th style="font-size: 15px; text-align: left;">STOCK</th>
                                            <th style="font-size: 15px; text-align: center;">S.C.</th>
                                            <th style="font-size: 15px; text-align: center;">ESTADO</th>
                                            <th style="font-size: 15px; text-align: left;">MARCA</th>
                                            <th style="font-size: 15px; text-align: left;">CATEGORÍA</th>
                                            <th style="font-size: 15px; text-align: left;">UBICACIÓN</th>
                                            <th style="font-size: 15px; text-align: left;">UNIDAD</th>
                                            <th style="font-size: 15px; text-align: left;">PRECIO(Neto)</th>
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
                                            if(mysqli_num_rows($qx2)>0){
                                                $row2=mysqli_fetch_row($qx2);
                                                $nnm=number_format($row[5], 0, ',', '.');

                                                if($row[3]===0){
                                                    $color="#FFEBCD";
                                                    $estad="Crítico";
                                                }else if($row[3] >= $row2[2]){
                                                    $color="#F0FFFF";
                                                    $estad="Óptimo";
                                                }else{
                                                    $color="#FAFAD2";
                                                    $estad="Escaso";
                                                }
                                                
                                                $xx;
                                                if($row2[2]===""){
                                                                                           $xx=0;
        
                                                }else{
                                                    $xx=$row2[2];
                                                }
                                                            
                                        echo '<tr style="background-color: '.$color.'">
                                                    <td style="text-align: center"><button class="codigos"  data-toggle="modal" href="#myModal"><i class="icon icon-print icon-large" ></i></button></td>
                                                    <td>' . $row[0] . '</td>
                                                    <td>' . $row[1] . '</td>
                                                    <td style="font-size: 14px;">' . $row[2] . '</td>
                                                    <td>' . $row[3] . '</td> 
                                                    <td>' . $xx . '</td>
                                                    <td>' . $estad . '</td>
                                                    
                                                    <td style="text-align: center;">' . $row[4] . '</td>
                                                    <td style="text-align: center;">' . $row2[4] . '</td>
                                                    <td style="text-align: center;">' . $row[6] . '</td>
                                                    <td style="text-align: center;">' . $row2[1] . '</td>
                                                    <td style="text-align: right;" title="Modificar precio"><a class="precio" data-toggle="modal" href="#myModal2" >'. $row[5] .'</a></td>
                                                    <td style="text-align: center;">' . $row2[5] . '</td>
                                                   
                                                   </tr>';

                                            }else{
                                                
                                            $color="#F0FFFF";
                                            $estad="Óptimo";
                                            $xx=0;
                                            
                                            $nnm=number_format($row[5], 0, ',', '.');
                                            echo '<tr style="background-color: '.$color.'">
                                                    <td style="text-align: center"><button class="codigos"  data-toggle="modal" href="#myModal"><i class="icon icon-print icon-large" ></i></button></td>
                                                    <td>' . $row[0] . '</td>
                                                    <td>' . $row[1] . '</td>
                                                    <td style="font-size: 14px;">' . $row[2] . '</td>
                                                    <td>' . $row[3] . '</td> 
                                                    <td>' . $xx . '</td>
                                                    <td>' . $estad . '</td>
                                                    
                                                    <td style="text-align: center;">' . $row[4] . '</td>
                                                    <td style="text-align: center;">-</td>
                                                    <td style="text-align: center;">' . $row[6] . '</td>
                                                    <td style="text-align: center;">-</td>
                                                    <td style="text-align: right;" title="Modificar precio"><a class="precio" data-toggle="modal" href="#myModal2"> ' . $row[5] . '</a></td>
                                                    <td style="text-align: center;">-</td>
                                                   
                                                   </tr>';
                                            }

                                        }
                                        echo'</tbody>
                                      </table>';
                                        ?>

                                      
                                      
                                      
                                      
            <div id="myModal" data-controls-modal="myModal" data-backdrop="static" data-keyboard="false"  class="modal hide " aria-hidden="true" style="display: none;">
              <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">X</button>
                      <h3>Codigo de barras</h3>
                  </div>
                  <div class="modal-body" style="text-align: center;">
                    
                    <img  id="imagen1" src="" />
                  </div>
              </div>

                                    <div id="myModal2" data-controls-modal="myModal" data-backdrop="static" data-keyboard="false"  class="modal hide " aria-hidden="true" style="display: none;">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">X</button>
                                            <h3>Modoficación del precio unitario</h3>
                                        </div>
                                        <div class="modal-body" style="text-align: center;">

                                            <form >
                                                <div>
                                                <div class="controls" style="text-align: left;">
                                                    <label style="text-align: left;" for="id">Producto N°:</label>
                                                    <input  type="number" title="" readonly class="span3" required id="id"  name="id" >

                                                </div>
                                                <div class="controls" style="text-align: left;">
                                                    <label for="na" style="text-align: left;">Valor neto actual:</label>
                                                    <input  type="number" readonly class="span3" required id="na"  name="na" >
                                                </div>
                                                <div class="controls" style="text-align: left;">
                                                    <label for="niva" style="text-align: left;">VN + IVA:</label>
                                                    <input readonly type="text" class="span4" required id="niva" minlength="1"  name="niva" >
                                                </div>
                                                <div class="controls" style="text-align: left;">
                                                    <label for="canti" style="text-align: left;">% de utilidad(%U) sobre bruto:</label>
                                                    <input readonly type="number" class="span3" required id="uti" min="1.0" max="9.9" value="1.2" steep="000.1"  name="uti" >
                                                </div>
                                                <div class="controls" style="text-align: left;">
                                                    <label for="canti" style="text-align: left; ">Precio Final(VN+IVA+%U):</label>
                                                    <input type="number" readonly class="span3" required id="vfinal" min="1" name="vfinal" >
                                                </div>
                                                </div>
                                                <div class="controls">
                                                    <div style="float: left; ">
                                                        <p style="text-align: left;">Ingresa un nuevo precio neto(VN): </p>
                                                        <input style="margin-left: 4px;" type="number" class="span3" required id="newneto" min="1" max="9999999999" name="newneto" >
                                                    </div>
                                                </div>
                                                <div class="controls">
                                                    <div>
                                                        <button id="conf1" class="btn btn-primary" disabled type="button">Confirmar</button>
                                                        <a data-dismiss="modal" id="cancelar1" class="btn" href="#" onclick="location.reload()">Cancelar</a>                                   </div>
                                                </div>
                                            </form>
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

    $(document).click(function () {

       $(".codigo").click(function(){
       
            var valor=$(this).closest("tr").find("td:eq(1)").text();
            var text="https://barcode.tec-it.com/barcode.ashx?data="+valor+"&code=Code128&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False";
            $("#imagen1").prop("src",text);
       });





    });
</script>
<script language="JavaScript">
    $( function() {

        $(".precio").click(function () {
            var id= $(this).closest("tr").find("td:eq(1)").text();
            var valor_ant= $(this).closest("tr").find("td:eq(11)").text();

            $("#id").val(parseInt(id));
            $("#uti").val(parseFloat("1.20"));
            $("#na").val(parseInt(valor_ant));
            var niva=parseInt(parseFloat(valor_ant)*parseFloat(1.19));
            $("#niva").val(niva);
            var valor_2=$("#uti").val();
            var vf=parseInt(parseFloat(niva)*parseFloat(valor_2));
            $("#vfinal").val(vf);


            $("#newneto").focus();

                $("#newneto").change(function(){

                    var new_neto=$(this).val();
                    if(new_neto >0) {
                        $("#na").val(new_neto);
                        var niva=parseInt(new_neto * 1.19);
                        $("#niva").val(niva);
                        var valor_2=$("#uti").val();
                        var vf=parseInt(niva*valor_2);
                        $("#vfinal").val(vf);

                        $("#conf1").prop("disabled",false);

                        $("#conf1").click(function () {
                            $.ajax({
                                type: "GET",
                                url: "modificar_precio.php",
                                data: {"id":id, "new_neto":new_neto},
                                success: function (respuesta) {
                                    if (respuesta.estado === "si") {
                                        alert("Precio neto modificado con éxito.");
                                        location.reload();
                                    } else {
                                        alert("Error al actualizar la base de datos. Los datos no fueron procesados.");
                                    }
                                }
                            });

                        });
                    }else{
                        alert("El valor ingresado debe ser mayor a 0");
                        $("#newneto").val("");
                        $("#newneto").focus();

                    }
                });
        });

    });


</script>
</body>
</html>
