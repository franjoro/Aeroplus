<?php 

require '../../../../conexion.php';
// $sql = mysqli_query($conexion,"SELECT * sesiones");
// $rsql=mysqli_fetch_array($sql);
// if ($rsql[0]==732) {
// 	$variable="123";
// }elseif($rsql[0]!=732){
// 	$variable="732";
// }
// $popo = mysqli_query($conexion, "UPDATE SET sesiones WHERE user = $variable")
?>




<?php 
if (isset($_POST['abc'])) {
	echo "Bye";
	$sql = mysqli_query($conexion, "SELECT user FROM sesiones");
$rsql=mysqli_fetch_array($sql);
if ($rsql[0]==732) {
	$variable="123";
}elseif($rsql[0]!=732){
	$variable="732";
}
$popo = mysqli_query($conexion, "UPDATE sesiones SET user = $variable");
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Lo sentimos</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style type="text/css">
	.pop{
		background: url(assets/img/8.jpg);
		width: 100%;
		height: 100vh;
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.pip{
		background-color: rgba(0, 0, 0,0.8);
		text-align: center;
		color: snow;
		font-weight: bold;
		font-family: 'Poppins';
		vertical-align: middle;
		padding: 5px;
		border-radius: 2px;

	}
</style>
</head>
<body>

<header class="pop">
<div class="col md-12">
<div class="container">
	<br><br><br>
<div class="pip">
<!-- <img style="opacity: 1" width="200" height="auto" src="assets/img/1.png"> -->
<br>
<!-- <div><h1>Lo sentimos, la plataforma no está disponible en estos momentos.</h1><br><br> -->
<form action="aplicados.php" method="POST">
	<button class="button" name="abc">BOOOOM</button>
</form>
</div>

</div>
</div>
</div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html><?php 

require '../../../../conexion.php';
// $sql = mysqli_query($conexion,"SELECT * sesiones");
// $rsql=mysqli_fetch_array($sql);
// if ($rsql[0]==732) {
// 	$variable="123";
// }elseif($rsql[0]!=732){
// 	$variable="732";
// }
// $popo = mysqli_query($conexion, "UPDATE SET sesiones WHERE user = $variable")
?>




<?php 
if (isset($_POST['abc'])) {
	echo "Bye";
	$sql = mysqli_query($conexion, "SELECT user FROM sesiones");
$rsql=mysqli_fetch_array($sql);
if ($rsql[0]==732) {
	$variable="123";
}elseif($rsql[0]!=732){
	$variable="732";
}
$popo = mysqli_query($conexion, "UPDATE sesiones SET user = $variable");
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Lo sentimos</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style type="text/css">
	.pop{
		background: url(assets/img/8.jpg);
		width: 100%;
		height: 100vh;
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.pip{
		background-color: rgba(0, 0, 0,0.8);
		text-align: center;
		color: snow;
		font-weight: bold;
		font-family: 'Poppins';
		vertical-align: middle;
		padding: 5px;
		border-radius: 2px;

	}
</style>
</head>
<body>

<header class="pop">
<div class="col md-12">
<div class="container">
	<br><br><br>
<div class="pip">
<!-- <img style="opacity: 1" width="200" height="auto" src="assets/img/1.png"> -->
<br>
<!-- <div><h1>Lo sentimos, la plataforma no está disponible en estos momentos.</h1><br><br> -->
<form action="aplicados.php" method="POST">
	<button class="button" name="abc">Clictodo</button>
</form>
</div>

</div>
</div>
</div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
