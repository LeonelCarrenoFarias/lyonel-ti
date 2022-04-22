<?php
    $moneda=$_GET['moneda'];
    $monto=$_GET['monto'];
    $fecha=$_GET['fecha'];

    $url="https://si3.bcentral.cl/SieteRestWS/SieteRestWS.ashx?monto=".$monto."&fecha=".$fecha."&moneda=".$moneda."&dolardeldia=dolarhoy";
    $json=file_get_contents($url);
    $consumo=json_decode($json,true);

    for ($i=0; $i<count($consumo); $i++){
        $dolares=$consumo[$i]['monto'];
        $dolarhoy=$consumo[$i]['dolarhoy'];

        $tot=floatval(floatval($dolares)*floatval($dolarhoy));
        echo "En conversion a peso chileno=".$tot;
    }
?>
