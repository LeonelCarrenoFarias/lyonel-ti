<?php
include '../../connect/connect.php';

$id= $_GET['id'];
$text="SELECT `id_variedad`, `nombre` FROM `variedad` WHERE `id_especie`=$id AND `estado`=1";
$combociudad = mysqli_query($dbc,$text);
?>
<option selected disabled>Seleccione una variedad</option>
<?php
while ($row=mysqli_fetch_row($combociudad)) {
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
?>
