<!DOCTYPE html>

<html lang="en">
    
<head>
        <title>Ingesaf - GOCYS</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script language="JavaScript">
        document.getElementById("form1").reset();
    </script>
    </head>
    <body>
        <div id="loginbox" style="margin-top: -100px;">
            <form class="form-vertical" id="form1" method="get" action="Phps/Login2.php">
				 <div class="control-group "> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="number" maxlength="9" minlength="9" placeholder="Rut" name="rut" id="rut" required title="Ingresa tu rut sin puntos ni guines. Si termina en K, remplazalo por 0.">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-envelope"></i></span><input type="email" placeholder="Dirección de correo" required name="email" id="email">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Contraseña" maxlength="8" minlength="8" required name="pass" id="pass" title="Ingresa tu contraseña de 8 digitos" >
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <input class="btn btn-success" id="ingreso" type="submit" value="ingresar" >
                </div>
            </form>
        </div>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.ui.custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.uniform.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/matrix.js"></script>
        <script src="js/matrix.form_validation.js"></script>


    </body>

</html>
