<?php
session_start();
include("../conexion.php");
if (isset($_SESSION['session_id']) &&  $_SESSION['session_id']=='0') {
?>
<!DOCTYPE html>
<html>
	<title>Panel de control</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Roboto", sans-serif};
	</style>
	<style type="text/css">
	.ecolor{
	background-color: #3D8FFF;
	}
	.ecolor2{
	background-color: #001046;
	}
	</style>
	<body class="w3-light-grey">
		<!-- Top container -->
		<div class="w3-bar w3-top ecolor2 w3-large" style="z-index:4">
			<button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
			<span class="w3-bar-item w3-right">-</span>
		</div>
		<!-- Sidebar/menu -->
		<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
			<div class="w3-container w3-row">
				<div class="w3-col s4">
					<img src="../img/logo.png" class="w3-circle w3-margin-right" style="width:46px">
				</div>
				<div class="w3-col s8 w3-bar">
					<span>Bienvenido <strong>administrador</strong></span><br>
				</div>
			</div>
			<hr>
			<div class="w3-container">
				<h5>Panel de control</h5>
			</div>
			<div class="w3-bar-block">
				<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
				<a href="aeronaves.php" class="w3-bar-item w3-button w3-padding "><i class="fas fa-plane fa-fw"></i> Aeronaves y combustible</a>
				<a href="alumnos.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-user-tie fa-fw"></i> Alumnos</a>
				<a href="instructores.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Instructores</a>
				<a href="bitacora.php" class="w3-bar-item w3-button w3-padding" ><i class="fas fa-plane-departure fa-fw"></i> Programa de vuelo general</a>
				<a href="planillas.php" class="w3-bar-item w3-button w3-padding  ecolor2  w3-text-white"><i class="fas fa-gem fa-fw"></i> Planillas</a>
				<a href="calendario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Calendario</a>
				<a href="user.php" class="w3-bar-item w3-button w3-padding " ><i class="fas fa-users fa-fw"></i> Usuarios</a>
				<a href="../destroy.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt fa-fw"></i> Cerrar sesión</a>
			</div>
		</nav>
		<!-- Overlay effect when opening sidebar on small screens -->
		<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
		<!-- !PAGE CONTENT! -->
		<div class="w3-main" style="margin-left:300px;margin-top:43px;">
			<!-- Header -->
			<div class="w3-container w3-responsive" id="all">
				<h3>Planillas del mes actual</h3>
				<div id="table_all"></div>
			</div>
			<div class="w3-container w3-responsive w3-border" id="detalle" style="display: none">
				<span style="cursor: pointer;" onclick="$('#detalle').css('display','none'); $('#all').css('display','block');"><b><i class="fas fa-arrow-left"></i>Atrás</b></span>
				<p id="id_hide" style="display: none">0</p>
				<div class="w3-panel">
					<button class="w3-button w3-green" onclick="
					$('#add').css('display','block');
					"><i class="fas fa-plus"></i> Agregar pago</button>
					<label>Cambiar mes:</label>
					<select class="w3-select" name="se" style="width: 50px">
						<option value="01" id="o1">1</option>
						<option value="02" id="o2">2</option>
						<option value="03" id="o3">3</option>
						<option value="04" id="o4">4</option>
						<option value="05" id="o5">5</option>
						<option value="06" id="o6">6</option>
						<option value="07" id="o7">7</option>
						<option value="08" id="o8">8</option>
						<option value="09" id="o9">9</option>
						<option value="10" id="o10">10</option>
						<option value="11" id="o11">11</option>
						<option value="12" id="o12">12</option>
					</select>
					<button class="w3-button">Generar reporte</button>
				</div>
				<div id="table_de"></div>
			</div>
			<!-- ====================================MODAL -->
			<!-- ====================================MODAL -->
		</div>
		<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script>
		function cargar_mes_op(){
		var mes_a=<?php echo date("m"); ?>;
		var i=1;
		while(i<=12){
		if (mes_a == $("#o"+i).val()) {
		$("#o"+i).attr("selected","");
		}
		i=i+1;
		}
		}
		function obtener_all(){
		$.ajax({
		url:"fun/planillas/table_all.php",
		method: "POST",
		success: function(data){
		$("#table_all").html(data);
		}
		})
		}
		function obtener_de(mes,ins){
		$.ajax({
		url:"fun/planillas/table_de.php",
		method: "POST",
		data:{mes:mes,ins:ins},
		success: function(data){
		$("#table_de").html(data);
		}
		})
		}
		function campos(){
		$.alert({
		title: '¡Atención!',
		content: 'Debes rellenar todos los campos.',
		theme: 'modern',
		type:'orange',
		icon: 'far fa-keyboard',
		});
		}
		$(document).on("click", "#new_p",function(){
		var id =$("#id_hide").text();
		var valor =$("#valor").val();
		var motivo =$("#motivo").val();
		if (valor!="" || motivo!="") {
		$.confirm({
		title: '¿Agregar pago a planilla?',
		content: 'Nota:Se registrara un pago al mes actual',
		theme: 'modern',
		type: 'green',
		icon: 'fas fa-money-bill-alt',
		buttons: {
		confirm: function () {
		$.ajax({
		url:"fun/planillas/new_p.php",
		method: "POST",
		data:{id:id,valor:valor,motivo:motivo},
		success: function(data){
		var me =$('select[name=se]').val();
		obtener_de(me,id);
		}
		})
		},
		cancel: function () {
		
		},
		}
		});
		}else{
		campos();
		}
		})
		$(document).on("click", "#selec",function(){
		$("#all").css("display","none");
		var id = $(this).data("id");
		$("#id_hide").text(id)
		$("#detalle").css("display","block");
		var me =$('select[name=se]').val();
		obtener_de(me,id);
		})
		$("select[name=se]").change(function(){
		var id =$("#id_hide").text();
		var me =$('select[name=se]').val();
		obtener_de(me,id);
		})
		$(document).ready( function () {
		cargar_mes_op();
		var me =$('select[name=se]').val();
		obtener_all();
		obtener_de(me);
		} );
		// Get the Sidebar
		var mySidebar = document.getElementById("mySidebar");
		// Get the DIV with overlay effect
		var overlayBg = document.getElementById("myOverlay");
		// Toggle between showing and hiding the sidebar, and add overlay effect
		function w3_open() {
		if (mySidebar.style.display === 'block') {
		mySidebar.style.display = 'none';
		overlayBg.style.display = "none";
		} else {
		mySidebar.style.display = 'block';
		overlayBg.style.display = "block";
		}
		}
		// Close the sidebar with the close button
		function w3_close() {
		mySidebar.style.display = "none";
		overlayBg.style.display = "none";
		}
		</script>
	</body>
</html>
<?php
}else{
header("location:../destroy.php");
}
?>