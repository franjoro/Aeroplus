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
    <a href="bitacora.php" class="w3-bar-item w3-button w3-padding ecolor2  w3-text-white" ><i class="fas fa-plane-departure fa-fw"></i> Programa de vuelo general</a>
    <a href="planillas.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-gem fa-fw"></i> Planillas</a>
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
  <header class="w3-container" style="padding-top:22px">
    <h5><b>Opciones de vuelos</b></h5>
  </header>


<a href="../pvuelo/pvuelo_progra.php">
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third" style="cursor: pointer">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fas fa-info-circle w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Administrar programa de vuelo</h4>
      </div>
    </div>
</a>
    <div class="w3-third" style="cursor: pointer">
      <div class="w3-container w3-blue w3-padding-16" onclick="d1()">
        <div class="w3-left"><i class="far fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver horas registradas</h4>
      </div>
    </div>


     <div class="w3-third" style="cursor: pointer">
      <div class="w3-container w3-red w3-padding-16" onclick="d2()">
        <div class="w3-left"><i class="far fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver horas canceladas</h4>
      </div>
    </div>
  </div>



  <div class="w3-container" id="ver" style="display: none" >
    <h5>Información de horas de vuelo <strong>finalizadas</strong></h5>
    <br>
 <table class="w3-table-all" id="tabla">
    <thead>
    <tr>
      <th>Aeronave</th>
      <th>Fecha</th>
      <th>Instructor</th>
      <th>Alumno</th>
      <th>Evaluación</th>
    </tr>
</thead>
<tbody>
<?php 
$a=mysqli_query($conexion,"SELECT * FROM horas WHERE Role='3' ");
$num =mysqli_num_rows($a);
while($e=mysqli_fetch_array($a)) {
  $pl=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$e[1]'"));
  $in=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$e[6]'"));
  $alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$e[5]'"));
  $ev=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM evah WHERE id_hora='$e[0]'"));

  if ($ev[0]>=1) {
  $btn='<button class="w3-button w3-green" onclick="obtener_notas('.$e[0].')"><i class="fas fa-search"></i></button>';
  } else {
  $btn='<lable><b>Evaluación pendiente</b></label>';
  }
  

 ?>
    <tr>
      <td><?php echo $pl[0] ?></td>
      <td><?php echo $e[8] ?></td>
      <td><?php echo $in[0] ?></td>
      <td><?php echo $alu[0] ?></td>
      <td><?php echo $btn ?></td>
    </tr>
 <?php    
}
 ?>

</tbody>
  </table>

  </div>


  <div class="w3-container" id="add" style="display: none" >
    <h5>Información de horas de vuelo <strong>canceladas</strong></h5>
    <br>
 <table class="w3-table-all" id="tabla1">
    <thead>
    <tr>
      <th>Aeronave</th>
      <th>Fecha</th>
      <th>Instructor</th>
      <th>Alumno</th>
      <th>Evaluación</th>
    </tr>
</thead>
<tbody>
<?php 
$a1=mysqli_query($conexion,"SELECT * FROM horas WHERE Role='4' ");
$num =mysqli_num_rows($a);
while($e1=mysqli_fetch_array($a1)) {
  $pl1=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$e1[1]'"));
  $in1=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$e1[6]'"));
  $alu1=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$e1[5]'"));
  $ev1=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM evah WHERE id_hora='$e1[0]'"));

  if ($ev1[0]>=1) {
  $btn1='<button class="w3-button w3-green" onclick="obtener_notas('.$e1[0].')"><i class="fas fa-search"></i></button>';
  } else {
  $btn1='<lable><b>Evaluación pendiente</b></label>';
  }
  

 ?>
    <tr>
      <td><?php echo $pl1[0] ?></td>
      <td><?php echo $e1[8] ?></td>
      <td><?php echo $in1[0] ?></td>
      <td><?php echo $alu1[0] ?></td>
      <td><?php echo $btn1 ?></td>
    </tr>
 <?php    
}
 ?>

</tbody>
  </table>

  </div>
<!-- ====================================MODAL -->


  <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-text-white" style="background-color: #355C7D"> 
        <span onclick="close1()" class="w3-button w3-display-topright">&times;</span>
        <span id="hide_nota" style="display: none"></span>
        <h2>Detalles (Hora de vuelo)</h2>
      </header>
      <div class="w3-container w3-padding">
        <div id="detalles_bi"></div>   
      </div>
    </div>
  </div>
<!-- ====================================MODAL -->


</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
	  function d2(){
    document.getElementById('add').style.display='block';
        document.getElementById('ver').style.display='none'
  }
  function d1(){
    document.getElementById('ver').style.display='block';
        document.getElementById('add').style.display='none'

  }

function close1(){
document.getElementById('id04').style.display='none';
$('input[type="text"]').val('');
}

function obtener_notas(id){
     $.ajax({
       url:"fun/pvg/detalles_bi.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
         $("#detalles_bi").html(data)
         document.getElementById('id04').style.display='block'
      }
     })
 }

     $(document).ready( function () {
    $('#tabla').DataTable();
    $('#tabla1').DataTable();

} );
</script>

<script>
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

$(document).ready( function () {
    obtener();

} );
</script>

</body>
</html>
<?php 
}else{
  header("location:../destroy.php");
}

 ?>
