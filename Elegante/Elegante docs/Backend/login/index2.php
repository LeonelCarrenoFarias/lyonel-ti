<?php
session_start();
ini_set("default_charset", "UTF-8");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGROGAP - Libro de campo </title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->




</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="../../images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form  action="logueo2.php"  method="GET" >
                        <div class="card">
                            <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <select required name="select1" id="select1" class="form-control" data-placeholder="Seleccionar Temporada">
                                                <option id="paloblanco" value="0" selected>-- Seleccione la temporada --</option>
                                                <?php
                                                include '../connect/connect.php';
                                                $rt=$_SESSION['rut'];
                                                $text1="SELECT `id_cuaderno`, `rut_razon`, `temporada` FROM `cuaderno` WHERE `rut_razon`=$rt";
                                                $querry1=mysqli_query($dbc,$text1);

                                                while($row=mysqli_fetch_row($querry1)){
                                                    echo '<option value="'.$row[0].'">Libro Temporada: '.$row[2].'</option>
';
                                                }
                                                ?>
                                            </select>                                        </div>
                                    </div>

                            </div>
                            <button type="submit" disabled name="entrar" class="btn btn-success btn-sm">Entrar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){

            $("#select1").change(function(e) {
                e.preventDefault();

                var value=$(this).val();
                if(value==="0"){
                    $("button[name=entrar]").prop('disabled', true);
                }else{
                    $("button[name=entrar]").prop('disabled', false);
                }

            });

            $("#paloblanco")



        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>
</html>
