<?php
require 'Connect.php';


$fact=$_GET['fact'];
header('Content-Type: application/json');


   $c1="SELECT `Id_Factura` FROM `factura`";
   $q1=mysqli_query($dbc,$c1);
    $boo=0;
   $des=0;
   while($r=mysqli_fetch_row($q1)) {
       $des = $r[0];

       if ($des==$fact) {
           $boo = 1;

       }
   }


   if($boo==1){
       $datos = array(
           'estado' => 'ok');
   }else{
   $datos = array(
       'estado' => 'no');
   }
echo json_encode($datos, JSON_FORCE_OBJECT);