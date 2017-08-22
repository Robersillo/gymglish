<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learning Centre Centro de enseñanza-aprendizaje de lengua extranjera. Los idiomas también se ejercitan">
    <title>Gymglish - Learning Centre Centro de enseñanza-aprendizaje de lengua extranjera. Los idiomas también se ejercitan</title>
    <link rel="icon" href="logo/gymglish.jpg" type="image/jpg">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'>
</head>

<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="c1"><a href="index.html">Inicio</a></li>
                <li class="c2"><a href="nosotros.html">Nosotros</a></li>
                <li class="c3"><a href="inscripcion.html">Inscripción</a></li>
                <li class="c4"><a href="horarios.html">Horarios</a></li>
                <li class="c5"><a href="galeria.html">Galeria</a></li>
                <li class="c7"><a href="contacto.php">Contacto</a></li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<header id="head" class="secondary">
    <div class="container">
        <h1>

        <?php
        if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
            $email_to = "info@gymglishve.com";
            $email_subject = "Contacto desde GYMGLISHVE";

// Aquí se deberían validar los datos ingresados por el usuario
            if(!isset($_POST['name']) ||
                !isset($_POST['email']) ||
                !isset($_POST['telefono']) ||
                !isset($_POST['asunto']) ||
                !isset($_POST['message'])) {

                echo "Ocurrió un error y el formulario no ha sido enviado --- ";
                echo "Por favor, vuelva atrás y verifique la información ingresada";
                die();
            }

            $email_message = "Mensaje desde WEB GymglishVE:\n\n";
            $email_message .= "Tema: " . $_POST['asunto'] . "\n";
            $email_message .= "Nombre: " . $_POST['name'] . "\n";
            $email_message .= "Teléfono: " . $_POST['telefono'] . "\n";
            $email_message .= "Email: " . $_POST['email'] . "\n\n";
            $email_message .= "Mensaje: " . $_POST['message'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
            $headers = 'From: GYMGLISH-VE < info@gymglishve.com > '.$email_from."\r\n".
                'Reply-To: '.$email_from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);

            echo "Datos Enviados Exitosamente";
        }
        ?>
        </h1>
    </div>
</header>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="footerbottom">

                <center>
                    <div>
                        <a href="contacto.html"><h4 style="color: white;"><em>Contacto</em></h4></a>
                        <p><i class="fa fa-map-marker"> Carabobo, Valencia Urb. Trigal Centro, calle pocaterra Nro 92-65. </i> </p>
                        <p><i class="fa fa-phone"> / 0241-814.22.18 – 0414-413.70.73 - 0412-216.24.66</i> </p>
                        <p><i class="fa fa-envelope-o"> gymglish.info@gmail.com</i> </p>
                    </div>
            </div><!-- end widget -->
        </div>
        </center>
    </div>
    </div>
    <div class="social text-center">
        <a href="https://www.instagram.com/gymglishve/" target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="https://www.facebook.com/gymglish.learningcentre" target="_blank"><i class="fa fa-facebook"></i></a>
    </div>

    <div class="clear"></div>
    <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="simplenav">
                            <a href="index.html">Inicio</a> |
                            <a href="nosotros.html">Nosotros</a> |
                            <a href="inscripcion.html">Inscripción</a> |
                            <a href="horarios.html">Horarios</a> |
                            <a href="galeria.html">Galeria</a> |
                            <a href="contacto.php">Contacto</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="text-right">
                            Copyright 2016 | All Rights Reserved - GYMGLISHVE
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
