<?php
session_start();
include('../conexion.php');
$id=$_SESSION['user'];
$sql= mysqli_query($conexion,"SELECT * FROM instructor WHERE id_user='$id' ");
$sqll=mysqli_fetch_array($sql);
if (isset($_SESSION['session_id']) &&  $_SESSION['session_id']=='1' ) {
?>
<!DOCTYPE html>
<html>
	<title>Bitacora de horas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<style>
	html, body, h1, h2, h3, h4, h5 {font-family: 'Roboto', sans-serif;}
	a:link
	{
	text-decoration:none;
	}
	</style>
	<body class="w3-theme-l5">
		<!-- Navbar -->
		<div class="w3-top" >
			<div class="w3-bar w3-left-align w3-large" style="background-color: #355C7D">
				<a href="index.php"><span class="w3-bar-item w3-button w3-padding-large  w3-text-white"><i class="fas fa-arrow-left"></i></span></a>
			</div>
		</div>
		<!-- Navbar on small screens -->
		<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
			<a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
		</div>
		<!-- Page Container -->
		<div class="w3-container " style="margin-top:80px">
			<?php
			$nu=mysqli_query($conexion,"SELECT * FROM union_ WHERE Who_='$id' AND Role='3' ");
			while ($query=mysqli_fetch_array($nu)) {
			$pl=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM plane WHERE Matricula='$query[1]'"));
			?>
			<div class="w3-row-padding">
				<div class="w3-col m9" >
					<div class="w3-container w3-responsive w3-card w3-white w3-round w3-padding">
						<h4>Bitacora de vuelo <b><?php echo $query[1] ?></b>:</h4>
						<table class="w3-table-all" id="tabla_<?php echo $query[0] ?>">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Instructor</th>
									<th>Alumno</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$a=mysqli_query($conexion,"SELECT * FROM horas WHERE idPlane='$pl[0]' AND Role='3' ");
								$num =mysqli_num_rows($a);
								while($e=mysqli_fetch_array($a)) {
								$in=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$e[6]'"));
								$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$e[5]'"));
								?>
								<tr>
									<td><?php echo $e[8] ?></td>
									<td><?php echo $in[0] ?></td>
									<td><?php echo $alu[0] ?></td>
								</tr>
								<?php
								}
								$dd=mysqli_fetch_array($aa=mysqli_query($conexion,"SELECT * FROM disc WHERE idplane='$pl[0]' AND (Role='1' OR Role='2' OR Role='3' ) "));
								$numm=mysqli_num_rows($aa);
								// $btn='<button class="w3-button w3-block w3-teal" data-ma='.$query[1].' data-id='.$pl[0].' id="re">Reportar discrepancia</button>' ;
								if ($numm=='0') {
								$btn='<button class="w3-button w3-block w3-teal" data-ma='.$query[1].' data-id='.$pl[0].' id="re">Reportar discrepancia</button>' ;
								} else {
								if ($dd[4]=='1'){
								$btn='<div class="w3-panel w3-red"><p>Discrepancia reportada, esperando autorización del administrador para pasar a mantenimiento.</p></div>' ;
								}
								if ($dd[4]=='2'){
								$btn='<button class="w3-button w3-block w3-green" data-ma='.$query[1].' data-id='.$dd[0].' id="mant" >Ingresar mantenimiento</button>' ;
								}
								if ($dd[4]=='3'){
								$btn='<div class="w3-panel w3-blue"><p>Discrepancia solucionada espere cierre del administrador</p></div>' ;
								}
								}
								$t_a=$pl[4];
								$t25=$pl[5];
								$t50=$pl[6];
								$t100=$pl[7];
								$color1='blue';
								$color2='blue';
								$color3='blue';
								$i1='<i class="fas fa-check-circle"></i>';
								$i2='<i class="fas fa-check-circle"></i>';
								$i3='<i class="fas fa-check-circle"></i>';
								if($t25-$t_a<200 && $t25-$t_a>100){$color1='yellow'; $i1='<i class="fas fa-exclamation"></i>'; }
								if($t25-$t_a<100){$color1='red'; $i1='<i class="fas fa-exclamation-triangle"></i>';}
								if($t50-$t_a<200 && $t50-$t_a>100){$color2='yellow'; $i2='<i class="fas fa-exclamation"></i>';}
								if($t50-$t_a<100){$color2='red'; $i2='<i class="fas fa-exclamation-triangle"></i>';}
								if($t25-$t_a<200 && $t25-$t_a>100){$color1='yellow'; $i3='<i class="fas fa-exclamation"></i>';}
								if($t25-$t_a<100){$color1='red'; $i3='<i class="fas fa-exclamation-triangle"></i>';}
								?>
							</tbody>
						</table>
						<div class="w3-panel w3-pale-<?php echo $color1 ?> w3-leftbar w3-border-<?php echo $color1 ?>">
							<p>Mantenimiento 25 hrs (Tacómetro en: <?php echo $t25 ?>) <?php echo $i1 ?></p>
						</div>
						<div class="w3-panel w3-pale-<?php echo $color2 ?> w3-leftbar w3-border-<?php echo $color2 ?>">
							<p>Mantenimiento 50 hrs (Tacómetro en: <?php echo $t50 ?>) <?php echo $i2 ?></p>
						</div>
						<div class="w3-panel w3-pale-<?php echo $color3 ?> w3-leftbar w3-border-<?php echo $color3 ?>">
							<p>Mantenimiento 100 hrs (Tacómetro en: <?php echo $t100 ?>) <?php echo $i3 ?></p>
						</div>
					</div>
				</div>
				<div class="w3-col m3" >
					<div class="w3-container w3-card w3-white w3-round w3-padding">
						<h3>Información de la aeronave:</h3>
						<p><strong>Matricula: </strong><?php echo $query[1] ?></p>
						<h5><strong>Total horas: </strong><?php echo $num ?>hrs</h5>
						<h5><strong>Tacómetro actual: </strong><?php echo $t_a ?></h5>
						<?php echo $btn ?>
						<button class="w3-button w3-blue w3-block" id="btn_ma" data-id='<?php echo $pl[0] ?>'  data-t1='<?php echo $t25 ?>' data-t2='<?php echo $t50 ?>'  data-t3='<?php echo $t100 ?>' >Editar mantenimientos</button>
					</div>
				</div>
			</div>
			<hr>
			<script type="text/javascript">
			function tabla_<?php echo $query[0] ?>(){
			$('#tabla_<?php echo $query[0] ?>').DataTable();
			}
			tabla_<?php echo $query[0]?>()
			</script>
			<?php
			}
			?>
		</div>
		<!-- ======================== -->
		<div id="id04" class="w3-modal">
			<div class="w3-modal-content w3-animate-top w3-card-4">
				<header class="w3-container w3-text-white" style="background-color: #355C7D">
					<span onclick="document.getElementById('id04').style.display='none'"
					class="w3-button w3-display-topright">&times;</span>
					<span id="hide_ae" style="display: none"></span>
					<h2>Reportar discrepancia<a/h2>
					</header>
					<div class="w3-container w3-padding">
						<h3>Aeronave: <b><span id="ae"></span></b></h3>
						<label>Escribir reporte, anomalia o discrepancia que requiera mantenimiento:</label>
						<textarea class="w3-input w3-border" id="repp" style="width: 100%; max-width: 100%; min-width: 100%;  height: 150px;"></textarea>
						<br>
						<button class="w3-button w3-right w3-green" id="disc">Reportar</button>
					</div>
				</div>
			</div>
			<!-- ======================== -->
			<div id="id01" class="w3-modal">
				<div class="w3-modal-content w3-animate-top w3-card-4">
					<header class="w3-container w3-text-white" style="background-color: #355C7D">
						<span onclick="document.getElementById('id01').style.display='none'"
						class="w3-button w3-display-topright">&times;</span>
						<span id="hide_ae1" style="display: none"></span>
						<h2>Reportar mantenimiento<a/h2>
						</header>
						<div class="w3-container w3-padding">
							<h3>Aeronave: <b><span id="ae1"></span></b></h3>
							<label>Escribir solución del mantenimiento para la discrepancia existente</label>
							<textarea class="w3-input w3-border" id="repp1" style="width: 100%; max-width: 100%; min-width: 100%;  height: 150px;"></textarea>
							<br>
							<button class="w3-button w3-right w3-green" id="disc1">Reportar</button>
						</div>
					</div>
				</div>
				<!-- ======================== -->
				<div id="id0m" class="w3-modal" >
					<div class="w3-modal-content w3-animate-top w3-card-4">
						<header class="w3-container w3-text-white" style="background-color: #355C7D">
							<span onclick="document.getElementById('id0m').style.display='none'"
							class="w3-button w3-display-topright">&times;</span>
							<span id="hide_ma" style="display: none"></span>
							<h2>Editar tacómetro del proximo mantenimiento<a/h2>
							</header>
							<div class="w3-container ">
								<div class="w3-row-padding">
									<div class="w3-third">
										<label>25 hrs:</label>
										<input class="w3-input w3-border validanumericos" id="t11" type="text">
									</div>
									<div class="w3-third">
										<label>50 hrs:</label>
										<input class="w3-input w3-border validanumericos" id="t22" type="text">
									</div>
									<div class="w3-third">
										<label>100 hrs:</label>
										<input class="w3-input w3-border validanumericos" id="t33" type="text">
									</div>
								</div><br>
								<button class="w3-button w3-green w3-right" id="actu_ma" onclick="actu_maa()">Actualizar</button>
								<br>
							</div>
						</div>
					</div>
					<!-- ======================== -->
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
					<script type="text/javascript">
					function actu_maa(){
					var id = $("#hide_ma ").text();
					var t1 = $("#t11").val();
					var t2 = $("#t22").val();
					var t3 = $("#t33").val();
					if (t1=="" || t2=="" || t3==""){
						campos();
					}
					else{
											$.confirm({
					title: '¿Actualizar tacómetro del proximo mantenimiento?',
					content: 'Nota:Esto afectara las alertas de mantenimiento',
					theme: 'modern',
					type: 'red',
					icon: 'fas fa-tools',
					buttons: {
					confirm: function () {
					$.ajax({
					url:"fun/taco_change.php",
					method: "POST",
					data:{id:id,t1:t1,t2:t2,t3:t3},
					success: function(data){
					document.getElementById('id0m').style.display='none'
					location.reload();
					}
					})
					},
					cancel: function () {
					
					},
					}
					});
					}
					}
							$(document).on("click", "#btn_ma",function(){
					var t1 = $(this).data("t1");
					var id = $(this).data("id");
					var t2 = $(this).data("t2");
					var t3 = $(this).data("t3");
					$("#hide_ma ").text(id);
					$("#t11").val(t1);
					$("#t22").val(t2);
					$("#t33").val(t3);
					document.getElementById('id0m').style.display='block'
					})
							$(document).on("click", "#disc",function(){
					var id = $("#hide_ae").text();
					var text =$("#repp").val();
					if (text=="") {
						campos();
					}else{
					$.confirm({
					title: '¿REPORTAR DISCREPANCIA?',
					content: 'Nota: El administrador se pondra en contacto contigo para continuar con el proceso',
					theme: 'modern',
					type: 'red',
					icon: 'fas fa-tools',
					buttons: {
					confirm: function () {
					$.ajax({
					url:"fun/discrepancia_add.php",
					method: "POST",
					data:{id:id,text:text},
					success: function(data){
					document.getElementById('id04').style.display='none'
					location.reload();
					}
					})
					},
					cancel: function () {
					
					},
					}
					});
					}
					})
					$(document).on("click", "#disc1",function(){
					var id = $("#hide_ae1").text();
					var text =$("#repp1").val();
					if (text=="") {
					campos();
					}else{
					$.confirm({
					title: '¿REPORTAR MANTENIMIENTO?',
					content: 'Nota: El administrador se pondra en contacto contigo si es necesario',
					theme: 'modern',
					type: 'green',
					icon: 'fas fa-tools',
					buttons: {
					confirm: function () {
					$.ajax({
					url:"fun/discrepancia_update.php",
					method: "POST",
					data:{id:id,text:text},
					success: function(data){
					document.getElementById('id04').style.display='none'
					location.reload();
					}
					})
					},
					cancel: function () {
					
					},
					}
					});
					}
					})
					$(document).on("click", "#re",function(){
					var id = $(this).data("id");
					var ma = $(this).data("ma");
					$("#hide_ae").text(id);
					$("#ae").text(ma);
					document.getElementById('id04').style.display='block'
					})
					$(document).on("click", "#mant",function(){
					var id = $(this).data("id");
					var ma = $(this).data("ma");
					$("#hide_ae1").text(id);
					$("#ae1").text(ma);
					document.getElementById('id01').style.display='block'
					})
					function campos(){
					$.alert({
					title: '¡Atención!',
					content: 'Debes rellenar todos los campos.',
					theme: 'modern',
					type:'orange',
					icon: 'far fa-keyboard',
					});
					}
					// Accordion
					function myFunction(id) {
					var x = document.getElementById(id);
					if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					x.previousElementSibling.className += " w3-theme-d1";
					} else {
					x.className = x.className.replace("w3-show", "");
					x.previousElementSibling.className =
					x.previousElementSibling.className.replace(" w3-theme-d1", "");
					}
					}
					// Used to toggle the menu on smaller screens when clicking on the menu button
					function openNav() {
					var x = document.getElementById("navDemo");
					if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					} else {
					x.className = x.className.replace(" w3-show", "");
					}
					}
					$(function(){
					$('.validanumericos').keypress(function(e) {
					if(isNaN(this.value + String.fromCharCode(e.charCode)))
					return false;
					})
					.on("cut copy paste",function(e){
					e.preventDefault();
					});
					});
					</script>
				</body>
			</html>
			<?php
			}else{
			header("location:../destroy.php");
			}
			?>