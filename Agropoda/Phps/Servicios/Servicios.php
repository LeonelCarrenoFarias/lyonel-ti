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
  <h1><a href="../inventario/Stock.php">Agropoda - Inventario y requisiciones</a></h1>
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

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Buscar Aqui..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Menú</a>
  <ul>
    <li><a href="../ingreso/Entradas.php"><i class="icon icon-bookmark"></i> <span>Ingreso</span></a> </li>
    <li ><a href="../Salidas/Salida.php"><i class="icon icon-fullscreen"></i> <span>Salida</span></a></li>
    <li ><a href="../inventario/Stock.php"><i class="icon icon-file"></i> <span>Inventario</span></a></li>
    <li ><a href="../Arriendos/Arriendos.php"><i class="icon icon-credit-card"></i> <span>Arriendos</span></a></li>
    <li class="active"><a href="Servicios.php"><i class="icon icon-share"></i> <span>Servicios</span></a></li>
    <li ><a href="../Requisiciones/Solicitar.php"><i class="icon icon-columns"></i> <span>Nueva requisición</span></a></li>
    <li><a href="../Requisiciones/Solicitudes.php"><i class="icon icon-check"></i> <span>Requisiciones</span></a></li>
      <li><a title="Informes"  href="../Informes/Menu_informes.php"><i class="icon icon-check"></i> <span>Informes</span></a></li>

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../inventario/Stock.php" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a> <a href="#" class="current">Servicios</a> </div>
    <h1>Servicios</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="span11">
      <div class="row-fluid"><p style="font-size: 14px;">Sección donde se detalla mediante la tabla, el informe de los servicios efectuados. Para cambiar el estado (finalizar) de los servicios presiona el botón "FIN"</p>
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Gestión de Servicios Adquiridos</h5>
              </div>
              <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                      <thead>
                      <tr>
                          <th>Id Servicio</th>
                          <th>Detalle</th>
                          <th>Monto</th>
                          <th>Duración</th>
                          <th>Documento</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Término</th>
                          <th>Estado</th>
                          <th>Finalizar</th>
                      </tr>
                      </thead>

                      <tbody>
                      <?php

                      include '../connect/Connect.php';

                      $c3="SELECT `Id_Servicio`, `Descripcion`, `Duracion`, `Valor`, `Estado` FROM `servicio`";
                      $q3=mysqli_query($dbc,$c3);

                      while($row=mysqli_fetch_row($q3)) {
                          $Id_A=$row[0];
                          $descrip=$row[1];
                          $valor=$row[2];
                          $duracion=$row[3];

                          $c4="SELECT `Id_Servicio`, `Id_Det_Servicio`, `Item`, `Total_Neto`, `Cantidad`, `Fecha_Inicio`, `Fecha_Termino`, `documento_asoc`, `Estado` FROM `det_servicio` WHERE `Id_Servicio`=$Id_A";
                          $q5=mysqli_query($dbc,$c4);

                          $cantidad=0;
                          $monto=0;
                          $doc=0;
                          $f_ini="";
                          $f_Dev="";
                          $est="";
                          while ($row4=mysqli_fetch_row($q5)){
                              $cantidad=$row4[4];
                              $monto=$row4[3];
                              $f_ini=$row4[5];
                              $f_Dev=$row4[6];
                              $doc=$row4[7];
                              $est=$row4[8];
                          }
                          $desc=utf8_decode($row[1]);
                          $dd="";

                          if($est==1){
                              $dd="Vigente";
                          }else{
                              $dd="Finalizado";
                          }
                          $ff="";
                          if($f_Dev===""){
                              $ff="-";
                          }else{
                              $ff=$f_Dev;
                          }



                          echo '                    
                        <tr class="gradeX">
                          <td class="center"><a href="">'.$Id_A.'</a></td>
                          <td class="left">'.$descrip.'</td>
                          <td class="right">'.$monto.'</td>
                          <td class="right">'.$duracion.'</td>
                          <td class="right">'.$doc.'</td>
                          <td class="center">'.$f_ini.'</td>
                          <td class="center fin">'.$ff.'</td>                    
                          <td class="left">'.$dd.'</td> 
                          <td class="center" style="font-size: 17px; text-align: center;"><button class="btn btn-danger cerrar" data-dismiss="modal" data-toggle="modal" href="#myModal" >Fin</button></td>
                        
                        </tr>
';
                      }
                      ?>
                      </tbody>
                  </table>




                  <div id="myModal" data-controls-modal="myModal" data-keyboard="false"  class="modal hide " aria-hidden="true" style="display: none;">
                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">X</button>
                          <h3>Término de servicio</h3>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 19px;">¿Desea finalizar el servicio seleccionado?</p>
                          <p style="font-size: 14px;">- La fecha de término es la actual, y el centro de costos en el cual se asocian las salidas se denominó: "Servicios".</p>
                          <p style="font-size: 14px;"></p>

                      </div>
                      <div class="modal-footer">
                          <button style="color: white" id="si" class="btn btn-success " type="button" data-dismiss="modal" data-toggle="modal" href="#myModal2">Finalizar</button>
                          <button style="color: white" id="no" data-dismiss="modal" class="btn btn-primary " type="button" onclick="close();" >Salir</button>
                      </div>
                  </div>




                  <div id="myModal2" data-controls-modal="myModal" data-backdrop="static" data-keyboard="false"  class="modal hide " aria-hidden="true" style="display: none;">
                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button" title="Salir" onclick="location.href='Servicios.php';">X</button>
                          <h3>Finalizar Servicio</h3>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 19px;">Servicio finalizado !!</p>
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
  <div id="footer" class="span12"> 2021 Desarrollo Web-by leonel carreño <a href="http://themedesigner.in">Universidad de Talca</a> </div>
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
    $(document).ready(function(){

        $(".cerrar").hover(function (){
            var row = $(this).closest(" tr ");
            var text = row.find("td:nth-child(7)").text();

            if(text ===""){
                $(this).prop("disabled",false);
            }else{
                $(this).prop("disabled",true);

            }
        });



        $(".cerrar").click(function(){
            var row = $(this).closest(" tr ");

            $("#si").click(function (){
                var id = row.find("td:nth-child(1)").text();
                var monto = row.find("td:nth-child(3)").text();
                var detalle = row.find("td:nth-child(2)").text();

                $.ajax({
                    type: "GET",
                    url: "set_salida2.php",
                    data:{"id":id, "monto":monto, "detalle":detalle },
                    success: function(respuesta) {
                        var des=respuesta.ds;
                        if(des===0){
                            alert("no se pudo actualizar la información");
                        }
                    }
                });
            });

        });



    });


</script>





</body>
</html>
