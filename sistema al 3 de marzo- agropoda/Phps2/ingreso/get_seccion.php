<?php

    include '../connect/Connect.php';

    $bod=$_GET['bod'];

    $tx="SELECT `id`, `nombre` FROM `seccion_bod` WHERE `id_bodega`='$bod'";
    $combociudad = mysqli_query($dbc,$tx);
?>
<option selected disabled>Seleccione una sección</option>
<?php
while ($row=mysqli_fetch_row($combociudad)) {
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
?>


mysqli_close($dbc);