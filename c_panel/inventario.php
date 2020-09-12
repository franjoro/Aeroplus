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
    <div class="w3-quarter" onclick="document.getElementById('id01').style.display='block'"  style="cursor: pointer;">
      <div class="w3-container w3-padding-16 w3-green">
        <div class="w3-left"><i class="fas fa-box w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ingresar nuevo producto a inventario</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fas fa-boxes w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ingreso masivo</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Reportes</h4>
      </div>
    </div>
  </div>





<div class="w3-container">
  <div id="tabla"></div>
</div>

</div>

<!-- MODAAAL================================================ -->

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_uni" style="display: none"></span>
        <h2>Ingresar nuevo producto:</h2>
      </header>
      <div class="w3-container">
<br>
<form action="fun/inventario/insertar.php" method="POST" enctype= multipart/form-data>
    <label>Nombre del producto:</label>
    <input class="w3-input w3-border" type="text" placeholder="Producto" name="pro">
    <label>Descripción:</label>
    <textarea class='w3-input w3-border' name="des1" placeholder="Descripción:" style="max-height: 100%; max-width: 100%; height:100px;" ></textarea>
    <label>Cantidad:</label>
    <input type="text" class="validanumericos" name="cant">
    <br>
    <label>Imagen:(Opcional)</label>
    <input type="file" name="file">
    <button class="w3-button w3-green w3-right" id="btn_add_pro" type="submit"><i class="fas fa-check"></i></button>
    <!-- <button class="w3-button w3-red w3-right w3-margin-right" id="btn_uni_delete"><i class="fas fa-trash"></i></button> -->
    </form>
<br>
<br>
      </div>
    </div>
  </div>

<!-- MODAAAL================================================ -->



<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>


   function obtener(){
     $.ajax({
       url:"fun/inventario/tabla.php",
              method: "POST", 
       success: function(data){
         $("#tabla").html(data)
      }
     })
 }

obtener();

        $(function(){
          $('.validanumericos').keypress(function(e) {
          if(isNaN(this.value + String.fromCharCode(e.charCode)))
          return false;
          })
          .on("cut copy paste",function(e){
          e.preventDefault();
          });
          });


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
