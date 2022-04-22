<?php
require "../connect/Connect.php";

$id=$_GET['id'];

header('Content-Type: application/json');

$c1="SELECT `Id_Centro` FROM `centrocosto` WHERE `Id_Centro`='$id'";
$q1=mysqli_query($dbc,$c1);
$id2=0;

while($row=mysqli_fetch_row($q1)){
    $id2=$row[0];
}
$r=mysqli_num_rows($q1);


if($r>0) {

    $c2 = "DELETE FROM `centrocosto` WHERE `Id_Centro`='$id2'";
    $q2 = mysqli_query($dbc, $c2);

    if ($q2===0) {

        $datos = array(
            'estado' => 'ok',
            'ident' => $id
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);
    } else {
        $datos = array(
            'estado' => 'no',
            'ident' => $id
        );
        echo json_encode($datos, JSON_FORCE_OBJECT);    }
}else{
    $datos = array(
        'estado' => 'error',
        'ident' => $id
    );
    echo json_encode($datos, JSON_FORCE_OBJECT);
}
mysqli_close($dbc);