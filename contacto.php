<?php
$your_email ='roberestopa600@hotmail.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$telefono = '';
$asunto = '';
$user_message = '';

if(isset($_POST['submit']))
{

    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $user_message = $_POST['message'];
    ///------------Do Validations-------------
    if(empty($name)||empty($visitor_email))
    {
        $errors .= "\n Name and Email are required fields. ";
    }
    if(IsInjected($visitor_email))
    {
        $errors .= "\n Bad email value!";
    }
    if(empty($_SESSION['6_letters_code'] ) ||
        strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
    {
        //Note: the captcha code is compared case insensitively.
        //if you want case sensitive match, probando, update the check above to
        // strcmp()
        $errors .= "\n La imagen de verificacion no concuerda con el texto";
    }

    if(empty($errors))
    {
        //send the email
        $to = $your_email;
        $subject="Envio de formulario GYMGLISHVE";
        $from = 'roberestopa600@hotmail.com';
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

        $body = " $name te envio una solicitud de contacto:\n\n".
            "Asunto: $asunto\n".
            "Name: $name\n".
            "Telefono: $telefono\n".
            "Email: $visitor_email \n\n".
            "Message: \n ".
            "$user_message\n\n".
            "IP: $ip\n";

        $headers = "From: $from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";

        mail($to, $subject, $body,$headers);

        header('Location: guardado.html');
    }
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
    $injections = array('(\n+)',
        '(\r+)',
        '(\t+)',
        '(%0A+)',
        '(%0D+)',
        '(%08+)',
        '(%09+)'
    );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>


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

<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>

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
					<li class="c7 active"><a href="contacto.php">Contacto</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Contáctanos</h1>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p> -->
                </div>
    </header>


	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">Llenar Formulario</h3>

						<b>
						<font color="red">
								<?php
								if(!empty($errors)){
								echo "<p class='err'>".nl2br($errors)."</p>";
								}
								?>


						<div id='contact_form_errorloc' class='err'></div>
						</font>
						</b>
						<form class="form-light mt-20" role="form" name="contact_form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
							<div class="form-group">
								<label>Nombre</label>
								<input name="name" id="name" type="text" class="form-control" placeholder="Su Nombre">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input name="email" id="email" type="email" class="form-control" placeholder="Dirección de Correo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Telefono</label>
										<input name="telefono" id="telefono" type="text" class="form-control" placeholder="Numero de Telefono">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Asunto</label>
								<input name="asunto" id="asunto" type="text" class="form-control" placeholder="asunto">
							</div>
							<div class="form-group">
								<label>Mensaje</label>
								<textarea class="form-control" name="message" id="message" placeholder="Escribe tu mensaje aqui..." style="height:100px;"></textarea>
							</div>

                            <br>
                            <p>
                                <label>Imagen de Verificacion</label><br>
                                <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br><br>
                                <label for='message'>Ingresa codigo de verificacion aqui :</label><br>
                                <input id="6_letters_code" name="6_letters_code" type="text"><br>
                                <small>no puedes leer la imagen? click <a href='javascript: refreshCaptcha();'>aqui</a> para cambiar</small>
                            </p>
                            <br>
                            <br>

							<button name='submit' value="Submit" type="submit" class="btn btn-two">Enviar Mensaje</button><p><br/></p>
						</form>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Ubícanos</h3>
								<div class="contact-info">
									<h5>Direccion</h5>
									<p>Carabobo/Valencia - Urb. Trigal Centro, calle pocaterra Nro 92-65.</p>

									<h5>Email</h5>
									<p>gymglish.info@gmail.com</p>

									<h5>Telefonos</h5>
									<p>0241-814.22.18</p>
									<p>0414-413.70.73</p>
									<p>0412-216.24.66</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
					<h3 class="section-title">Mapa</h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.5751174456245!2d-68.00100878471251!3d10.21511699270389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e805d75e91bda7d%3A0xe893aab43cd54bf8!2sGymglish+Learning+Centre!5e0!3m2!1ses!2sve!4v1473357700288" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" style="border:0;box-shadow: 2px 2px 16px black;" allowfullscreen></iframe>
					</div>
				</div>
			</div>
	<!-- /container -->

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

<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Campo de Nombre --- REQUERIDO");
frmvalidator.addValidation("email","req","Campo de Email --- REQUERIDO");
frmvalidator.addValidation("email","email","Por favor inserta una direccion de Email valida");
frmvalidator.addValidation("telefono","req","Campo de Telefono --- REQUERIDO");
frmvalidator.addValidation("asunto","req","Campo de Asunto --- REQUERIDO");
frmvalidator.addValidation("message","req","Campo de Mensaje --- REQUERIDO");
</script>

<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
