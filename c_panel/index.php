<?php
session_start();
require("../conexion.php");
$id=$_SESSION['user'];
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
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Roboto", sans-serif};

</style>
<style type="text/css">

  .ecolor2{
  background-color:  #001046;  
  }


/* PROGRESS TRACKER */
.progress-tracker {
  display: flex;
  margin: 0;
  counter-reset: item;
  list-style-type: none;
  padding: 0
}
.progress-tracker .step:before {
  background: #AAAAAA;
  border-radius: 20px;
  color: #FFFFFF;
  content: "";
  font-size: 18px;
  line-height: 1.8em;
  align-items: center;
  display: flex;
  justify-content: center;
  position: absolute;
  width: 35px;
  height: 35px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  content: counter(item) "  "; 
  counter-increment: item;
}
.progress-tracker .step {flex: 1;}
.progress-tracker .step .step-name{
	display: inline-flex;
  margin: 0 0 0 15px;	
  background: #dddddd;
  height: 35px;
  width: 100%;
  align-items: center;
  padding: 0 30px;
  color: #777777;
  line-height: 1.2em;
  font-size: 13px;
}
.progress-tracker .step:last-child .step-name{ border-radius: 0 20px 20px 0; width: calc(100% - 45px)}
.progress-tracker .step.active .step-name {color: #333333; font-weight: bold;}
.progress-tracker .step.active:before {background: #46c0f5;}
.progress-tracker .step.completed:before {background: #87db55; content: "\2714"}




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
    <a href="aeronaves.php" class="w3-bar-item w3-button w3-padding ecolor"><i class="fas fa-plane fa-fw"></i> Aeronaves y combustible</a>
    <a href="alumnos.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-user-tie fa-fw"></i> Alumnos</a>
    <a href="instructores.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Instructores</a>
    <a href="bitacora.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-plane-departure fa-fw"></i> Programa de vuelo general</a>
    <a href="planillas.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-gem fa-fw"></i> Planillas</a>
    <a href="calendario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Calendario</a>
     <a href="user.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-users fa-fw"></i> Usuarios</a>
     <a href="inventario.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-people-carry"></i>Inventario</a>
    <a href="../destroy.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt fa-fw"></i> Cerrar sesión</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>Información general</b></h5>
  </header>
<?php 
// DATOS 
$pl=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM plane"));
$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM alumno"));
$ins=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM instructor"));
$horas=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM horas"));



 ?>


  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-padding-16 w3-blue">
        <div class="w3-left"><i class="fas fa-plane w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $pl[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Aeronaves</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-user-tie w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $alu[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Alumnos</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $ins[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Instructores</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fab fa-telegram-plane w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $horas[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Vuelos</h4>
      </div>
    </div>
  </div>

<?php 
$h=mysqli_query($conexion,"SELECT * FROM disc WHERE Role!='0'");
while($dis=mysqli_fetch_array($h)){
  $ae=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$dis[1]'"));
  $u=mysqli_fetch_array(mysqli_query($conexion,"SELECT Who_ FROM union_ WHERE With_='$ae[0]'"));
  $ins=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_user='$u[0]'"));


if ($dis[4]=='1') {
	$estado1="";
	$estado2="";
	$estado3="";
	$estadoo=" Pendiente de aprobación";
	$sol="";
	$accion ='<p><b>Acción:<a href="#" onclick="dis('.$dis[4].','.$dis[0].')" > Autorizar envio a mantenimiento</a></b></p>';
}if ($dis[4]=='2') {
	$estado1="completed";
	$estado2="active";
	$estado3="";
	$sol="";
	$accion="";
	$estadoo =' El instructor encargado debe ponerse en contacto con mantenimiento e ingresar la solución';
}if ($dis[4]=='3') {
	$estado1="completed";
	$estado2="completed";
	$estado3="active";
	$sol="<p><b>Solución: </b>". $dis[3]."</p>";
	$estadoo="Discrepancia solucionada";
	$accion ='<p><b>Acción:<a href="#" onclick="dis('.$dis[4].','.$dis[0].')"> Cerrar discrepancia</a></b></p>';

}


 ?>



    <div class="w3-container w3-border">
    <h4><b>Reporte de discrepancia activo</b></h4>
    <p>El instructor <b><?php echo $ins[0] ?></b> ha reportado una incidencia en la aeronave: <b> <?php echo $ae[0] ?></b></p>
    <p><b>Detalles:</b> <?php echo utf8_encode($dis[2]) ?></p>
    <?php echo $sol ?>
    <p><b>Estado:</b><?php echo $estadoo ?></p>
	 <?php echo $accion ?>

	<ol class="progress-tracker">
	  <li class="step <?php echo $estado1 ?>"><a href="#" class="step-name">Discrepancia reportada</a></li>
	  <li class="step <?php echo $estado2 ?>"><a href="#" class="step-name">Autoriza mantenimiento</a></li>
	  <li class="step <?php echo $estado3 ?>"><span class="step-name">Solución</span></li>
	</ol>
  </div>


<?php 
}
 ?>





</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
function dis(role,id){

if (role=='1') { 
var i =parseFloat(role)+1;
 $.confirm({
    title: '¿AUTORIZAR ENVIO A MANTENIMIENTO?',
    content: 'Nota: Se avisara en el despacho posibles cancelaciones de vuelo',
    theme: 'modern',
    type: 'red',
    icon: 'fas fa-tools',
    buttons: {
        confirm: function () {
           $.ajax({
       url:"fun/dis_change.php",
       method: "POST", 
       data:{i:i,id:id},
       success: function(data){
       	location.reload();
      }
     })
        },
        cancel: function () {
            
        },
    }
});
}
if (role=='3') {
	var i ='0';
	$.confirm({
    title: '¿CERRAR DISCREPANCIA?',
    content: 'Nota: Se quitara la alerta del despacho, vuelos con normalidad',
    theme: 'modern',
    type: 'blue',
    icon: 'fas fa-tools',
    buttons: {
        confirm: function () {
           $.ajax({
       url:"fun/dis_change.php",
       method: "POST", 
       data:{i:i,id:id},
       success: function(data){
       	$.confirm({
	    title: 'Perfecto',
	    content: 'Todo regresa a la normalidad',
	    theme: 'modern',
	    type:'green',
	    icon: 'far fa-thumbs-up',
	    buttons: {
        confirm: function () {
       	location.reload();
         }
         }
		});

      	}
     })
        },
        cancel: function () {
            
        },
    }
});
}



}



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
