<?php
session_start();
session_destroy();
$img = rand(1,5);


if ($img=='1') {
	$img1='https://live.staticflickr.com/65535/48327403196_e3ecfbb301_z.jpg';
}
if ($img=='2') {
	$img1='https://live.staticflickr.com/65535/48327532262_1d4a8ec3c5_z.jpg';
}
if ($img=='3') {
	$img1='https://live.staticflickr.com/65535/48327404091_a7a4b31c26_z.jpg';
}
if ($img=='4') {
	$img1='https://live.staticflickr.com/65535/48327404241_0148d5ee1d_z.jpg';
}
if ($img=='5') {
	$img1='https://live.staticflickr.com/65535/48327533497_ffa41647d9_z.jpg';
}


include("conexion.php");
$diaSemana=date('W');
$diaSemana=$diaSemana;
$se=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM semana WHERE Semana='$diaSemana' AND Role='1' "));
if ($se[0]==0) {
mysqli_query($conexion,"UPDATE semana SET Semana='$diaSemana' WHERE Role='1'");
$diaSemana=$diaSemana+1;
mysqli_query($conexion,"UPDATE semana SET Semana='$diaSemana' WHERE Role='2'");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Iniciar sesión **</title>
		<!-- CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		
		
	</head>
	<body class="w3-animate-opacity">
		<style type="text/css">
		body {
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		font-weight: 300;
		color: #888;
		line-height: 30px;
		text-align: center;
		background: url('<?php echo $img1 ?>');
		background-position: top;
		background-repeat: no-repeat;
		background-size: 100% 100%;
		background-attachment: fixed;
		overflow: hidden;
		}
		</style>
		<!-- Top content -->
		<div class="top-content">




			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<!-- <div class="col-sm-8 col-sm-offset-2 text">
								<h1 style="margin-top: -30px;"><strong>Login <br></strong>Colegio Granada Juan Bosco</h1>
								<div class="description">
											<p>
														
											</p>
								</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 form-box">
							<div class="form-top">
								<div class="form-top-left">
									<strong><h3>Inicia sesión</h3>
									<p>Llena los datos para ingresar</p></strong>
								</div>
								<div class="form-top-right">
									<!-- <i style="color: #000; font-size: 40px;" class="fa fa-users"></i> -->
									<img height="90px;" src="img/logo.png">
									
								</div>
							</div>
							<div class="form-bottom">
								<form>
								<div class="form-group">
									<label class="sr-only">Usuario</label>
									<input type="text" name="idU" placeholder="Usuario" class="form-username form-control" id="form-username">
								</div>
								<div class="form-group">
									<label class="sr-only">Contraseña</label>
									<input type="password" name="password" placeholder="Contraseña" class="form-password form-control" id="form-password">
								</div>
								</form>
								<button style="width: 100%" type="submit" id="sub" class="btn">Ingresar</button>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
		<script src="assets/js/fun.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
			<script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>

	</body>
</html>
