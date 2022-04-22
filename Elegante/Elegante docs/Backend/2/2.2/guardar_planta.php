<?php
session_start();
$nom=utf8_decode($_SESSION["nombre"]);
$rut=$_SESSION["rut"];
$id_cuaderno=$_SESSION["cuaderno"];


include '../../connect/connect.php';

$cuartel=$_GET['cuartel'];
$patron=$_GET['patron'];
$categoria=$_GET['categoria'];
$especie=$_GET['especies'];
$variedad1=$_GET['variedad1'];
$año=$_GET['año'];
$patron=$_GET['patron'];
$has=$_GET['has'];
$densidad=$_GET['densidad'];
$densidad2=$_GET['densidad2'];
$plantas_has=$_GET['plantas_has'];
$plantas=$_GET['plantas'];






$text1="SELECT `num_cuartel` FROM `cuartel` WHERE `id_cuaderno`=$id_cuaderno";
$querry=mysqli_query($dbc,$text1);
$des=0;
while($row=mysqli_fetch_row($querry)){
    if($row[0]==$cuartel){
        $des=1;
    }
}




if($des==1){

    $text5="SELECT `id_plantacion` FROM `plantacion` ORDER BY `id_plantacion` ASC";
    $querry5=mysqli_query($dbc,$text5);
    $last=0;
    while($row=mysqli_fetch_row($querry5)){
        $last=$row[0];
    }
    $last+=1;


    $text7="SELECT `id_cuartel` FROM `cuartel` WHERE `num_cuartel`=$cuartel";
    $querry7=mysqli_query($dbc,$text7);
    $id=0;
    while($row=mysqli_fetch_row($querry7)){
        $id=$row[0];
    }



    $tt2="SELECT `nombre` FROM `variedad` WHERE `id_variedad`=$variedad1";
    $qq2=mysqli_query($dbc,$tt2);
    $var="";
    while($rw=mysqli_fetch_row($qq2)){
        $var=$rw[0];
    }

    $tt3="SELECT `nombre` FROM `patron` WHERE `id_patron`=$patron";
    $qq3=mysqli_query($dbc,$tt3);
    $patr="";
    while($rw=mysqli_fetch_row($qq3)){
        $patr=$rw[0];
    }






    $text6="INSERT INTO `plantacion`(`id_plantacion`, `id_cuartel`, `año`, `variedad`, `patron`, `categoria`, `has`, `densidad`,`densidad2`, `plantas_ha`, `plantas`) VALUES ($last,$id,'$año','$var','$patr',$categoria,$has,$densidad,$densidad2,$plantas_has,$plantas)";

    if($categoria===1){

        $t1="SELECT `id_pomaceas` FROM `feno_pomaceas` ORDER BY `id_pomaceas` ASC";
        $q1=mysqli_query($dbc,$t1);
        $lst1=0;
        while($rw1=mysqli_fetch_row($q1)){
            $lst1=$rw1[0];
        }
        $lst1+=1;
        $tt1="INSERT INTO `feno_pomaceas`(`id_pomaceas`, `id_plantacion`) VALUES ($lst1,$last)";
        $qt1=mysqli_query($dbc,$tt1);

    }elseif($categoria===2){

        $t2="SELECT `id_carozos` FROM `feno_carozos` ORDER BY `id_carozos` ASC";
        $q2=mysqli_query($dbc,$t2);
        $lst=0;
        while($rw=mysqli_fetch_row($q2)){
            $lst=$rw[0];
        }
        $lst+=1;
        $tt2="INSERT INTO `feno_carozos`(`id_carozos`, `id_plantacion`) VALUES ($lst,$last)";
        $qt2=mysqli_query($dbc,$tt2);

    }else{

        $t3="SELECT `id_kiwi` FROM `feno_kiwi` ORDER BY `id_kiwi` ASC";
        $q3=mysqli_query($dbc,$t3);
        $lst3=0;
        while($rw=mysqli_fetch_row($q3)){
            $lst3=$rw[0];
        }
        $lst3+=1;
        $tt3="INSERT INTO `feno_kiwi`(`id_kiwi`, `id_plantacion`) VALUES ($lst3,$last)";
        $qt3=mysqli_query($dbc,$tt3);

    }



    $querry6=mysqli_query($dbc,$text6);


    $text4="SELECT SUM(`has`) FROM `plantacion` WHERE `id_cuartel`=$id";
    $querry4=mysqli_query($dbc,$text4);
    $t_has=0;
    while($row=mysqli_fetch_row($querry4)){
        $t_has+=$row[0];
    }

    $text8="UPDATE `cuartel` SET `total_has`=$t_has WHERE `id_cuartel`=$id";
    $querry8=mysqli_query($dbc,$text8);


    if($querry6 && $querry8){

        echo "<script>
                alert('Plantación registrada con éxito !!');
                window.location= 'agregar_planta.php'</script>";
    }



}else{

    $text2="SELECT `id_cuartel` FROM `cuartel` ORDER BY `id_cuartel` ASC"  ;
    $querry2=mysqli_query($dbc,$text2);
    $cuart=0;
    while($row=mysqli_fetch_row($querry2)){
        $cuart=$row[0];
    }

    $cuart+=1;


    $riego="";

    $checkbox1 =0;
    $checkbox2 =0;
    $checkbox3 =0;



    if(!empty($_GET['checkbox1'])){
        $checkbox1 = $_GET['checkbox1'];
    }
    if(!empty($_GET['checkbox2'])){
        $checkbox2 = $_GET['checkbox2'];
    }
    if(!empty($_GET['checkbox3'])){
        $checkbox3 = $_GET['checkbox3'];
    }




    if($checkbox1==1){
        $pal="Aspersión/";
        $riego=$riego.$pal;
    }
    if($checkbox2==2){
        $pal="Goteo/";
        $riego=$riego.$pal;
    }
    if($checkbox3==3){
        $pal="Tradicional";
        $riego=$riego.$pal;
    }



    $text5="SELECT `id_plantacion` FROM `plantacion` ORDER BY `id_plantacion` ASC";
    $querry5=mysqli_query($dbc,$text5);
    $last=0;
    while($row=mysqli_fetch_row($querry5)){
        $last=$row[0];
    }
    $last+=1;



    $tt2="SELECT `nombre` FROM `variedad` WHERE `id_variedad`=$variedad1";
    $qq2=mysqli_query($dbc,$tt2);
    $var="";
    while($rw=mysqli_fetch_row($qq2)){
        $var=$rw[0];
    }

    $tt3="SELECT `nombre` FROM `patron` WHERE `id_patron`=$patron";
    $qq3=mysqli_query($dbc,$tt3);
    $patr="";
    while($rw=mysqli_fetch_row($qq3)){
        $patr=$rw[0];
    }






    $text6="INSERT INTO `plantacion`(`id_plantacion`, `id_cuartel`, `año`, `variedad`, `patron`, `categoria`, `has`, `densidad`,`densidad2`, `plantas_ha`, `plantas`) VALUES ($last,$cuart,'$año','$var','$patr',$categoria,$has,$densidad,$densidad2,$plantas_has,$plantas)";



    $querry6=mysqli_query($dbc,$text6);

    if($categoria===1){

        $t1="SELECT `id_pomaceas` FROM `feno_pomaceas` ORDER BY `id_pomaceas` ASC";
        $q1=mysqli_query($dbc,$t1);
        $lst1=0;
        while($rw1=mysqli_fetch_row($q1)){
            $lst1=$rw1[0];
        }
        $lst1+=1;
        $tt1="INSERT INTO `feno_pomaceas`(`id_pomaceas`, `id_plantacion`) VALUES ($lst1,$last)";
        $qt1=mysqli_query($dbc,$tt1);

    }elseif($categoria===2){

        $t2="SELECT `id_carozos` FROM `feno_carozos` ORDER BY `id_carozos` ASC";
        $q2=mysqli_query($dbc,$t2);
        $lst=0;
        while($rw=mysqli_fetch_row($q2)){
            $lst=$rw[0];
        }
        $lst+=1;
        $tt2="INSERT INTO `feno_carozos`(`id_carozos`, `id_plantacion`) VALUES ($lst,$last)";
        $qt2=mysqli_query($dbc,$tt2);

    }else{

        $t3="SELECT `id_kiwi` FROM `feno_kiwi` ORDER BY `id_kiwi` ASC";
        $q3=mysqli_query($dbc,$t3);
        $lst3=0;
        while($rw=mysqli_fetch_row($q3)){
            $lst3=$rw[0];
        }
        $lst3+=1;
        $tt3="INSERT INTO `feno_kiwi`(`id_kiwi`, `id_plantacion`) VALUES ($lst3,$last)";
        $qt3=mysqli_query($dbc,$tt3);

    }

    $tt="SELECT `nombre_especie` FROM `especie` WHERE `id_especie`=$especie";
    $qq=mysqli_query($dbc,$tt);
    $nm="";
    while($rw=mysqli_fetch_row($qq)){
        $nm=$rw[0];
    }



    $text3="INSERT INTO `cuartel`(`id_cuartel`, `id_cuaderno`, `especie`, `num_cuartel`, `riego`, `total_has`) VALUES ($cuart,$id_cuaderno,'$nm',$cuartel,'$riego',$has)";

    $querry3=mysqli_query($dbc,$text3);

    if($querry6 && $querry3){

        echo "<script>
                alert('Plantación y cuartel ingresados con éxito !!');
                window.location= 'agregar_planta.php'</script>";    }
}
