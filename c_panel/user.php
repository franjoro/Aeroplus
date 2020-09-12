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
    <a href="bitacora.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-plane-departure fa-fw"></i> Programa de vuelo general</a>
    <a href="planillas.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-gem fa-fw"></i> Planillas</a>
    <a href="calendario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Calendario</a>
     <a href="user.php" class="w3-bar-item w3-button w3-padding ecolor2  w3-text-white" ><i class="fas fa-users fa-fw"></i> Usuarios</a>
    <a href="../destroy.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt fa-fw"></i> Cerrar sesión</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b>Opciones de Aeronaves</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">

    <div class="w3-half" style="cursor: pointer" onclick="d2()">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-users fa-fw w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver usuarios</h4>
      </div>
    </div>
    <div class="w3-half" style="cursor: pointer" onclick="d3()">
      <div class="w3-container w3-grey w3-padding-16">
        <div class="w3-left"><i class="fas fa-info-circle w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Reportes de información</h4>
      </div>
    </div>
  </div>







  <div class="w3-container" id="ver" style="display: none;" >
    <h5><b>Información de usuarios</b></h5>
    <button class="w3-button w3-green w3-right" id="all">Enviar mensaje a todos</button><br>
    <br>
    <div id=tb></div>
    <span>SPA: Saldo próximo a acabarse- Alumnos con saldo igual o menor a $400</span>
  </div>
  <div class="w3-container" id="report" style="display: none">
    <h5><b>Alertas 3</b></h5>
  </div>


<!-- ====================================MODAL -->
  <div id="tarea1" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container ecolor2"> 
        <span onclick="document.getElementById('tarea1').style.display='none'" 
        class="w3-button w3-display-topright w3-text-white">&times;</span>
        <h2 class="w3-text-white">Mensajes directos<span id="up"></span></h2>
        <span id="hide" style="display: none"></span>
      </header>
      <div class="w3-container">
       <h3>Enviar mensaje a <strong><span id="alumno"></span></strong>:</h3>
       <div class="w3-container">
         <textarea class="w3-input w3-border" style="width: 100%; min-width: 100%; max-width: 100%; height: 200px; min-height: 100px;" maxlength="1000" id="mensaje" placeholder="Mensaje directo..."></textarea>
         <br>
         <button class="w3-button w3-green w3-right" id="btn_enviar_mensaje">Enviar mensaje</button>
         <br><br><br>
       </div>
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
   function obtener(){
     $.ajax({
       url:"fun/user/tabla.php",
              method: "POST", 
       success: function(data){
         $("#tb").html(data)

      }
     })
 }

  function d1(){
    document.getElementById('add').style.display='block';
        document.getElementById('ver').style.display='none'
            document.getElementById('report').style.display='none'
  }
  function d2(){
    document.getElementById('ver').style.display='block';
        document.getElementById('add').style.display='none'
            document.getElementById('report').style.display='none'
  }
  function d3(){
    document.getElementById('report').style.display='block';
        document.getElementById('ver').style.display='none'
            document.getElementById('add').style.display='none'
  }
  function exito(){
    $.alert({
    title: 'Acceso denegado',
    content: 'El usuario no podra entrar a la plataforma',
    theme: 'modern',
    type:'green',
    icon: 'far fa-thumbs-down',
});
  }
  function enviado(){
    $.alert({
    title: 'Mensaje enviado',
    content: 'El usuario recibira el mensaje al entrar a la plataforma',
    theme: 'modern',
    type:'green',
    icon: 'fas fa-file-import',
});
  }

  function enviados(){
    $.alert({
    title: 'Mensajes enviados',
    content: 'Todos los usuarios recibiran el mensaje al entrar a la plataforma',
    theme: 'modern',
    type:'green',
    icon: 'fas fa-file-import',
});
  }

    function pa(){
    $.alert({
    title: 'Contraseña reiniciada',
    content: 'El usuario y la contraseña son los mismos',
    theme: 'modern',
    type:'green',
    icon: 'fas fa-key',
});
  }


  function alerta(){
    $.alert({
    title: 'Acceso permitido',
    content: 'El usuario podra entrar a la plataforma',
    theme: 'modern',
    type:'green',
    icon: 'far fa-thumbs-up',
});
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


function pass(id){
  $.confirm({
    title: '¿Reiniciar contraseña?',
    content: 'Esta acción reiniciara la contraseña del usuario. El usuario y contraseña seran los mismos',
    theme: 'modern',
    icon: 'fas fa-key',
    buttons: {
        confirm: function () {
      $.ajax({
        url:"fun/user/update1.php",
        method: "POST",
        data: {id:id},
        success:function(data){
          obtener();  
          pa();
        },
      })           
        },
        cancel: function () {
        },
    }
});
}

   $(document).on("click", "#all",function(){


$("#hide").text("all");
$("#alumno").text("Todos los usuarios");

document.getElementById('tarea1').style.display='block';

})


   $(document).on("click", "#btn_enviar_mensaje",function(){
var id = $("#hide").text();
var mensaje =$("#mensaje").val();

if (mensaje!="") {
if (id=="all") {
    var role=2;
      $.ajax({
        url:"fun/user/insertar_m.php",
        method: "POST",
        data: {mensaje:mensaje,role:role},
        success:function(data){
    enviados();
document.getElementById('tarea1').style.display='none';
$("#mensaje").val("");
      }

    })
 }else{
var role=1;
      $.ajax({
        url:"fun/user/insertar_m.php",
        method: "POST",
        data: {id:id,mensaje:mensaje,role:role},
        success:function(data){
    enviado();
document.getElementById('tarea1').style.display='none';
$("#mensaje").val("");

      }

    })

 }     
}else{
  campos();
}




})

   $(document).on("click", "#change",function(){
var id = $(this).data("id");
      $.ajax({
        url:"fun/user/update.php",
        method: "POST",
        data: {id:id},
        success:function(data){
          obtener();  
          if (data=='0') {
            exito();
          }else{
            alerta();
          }

        },
      })

    })

   $(document).on("click", "#btn_mensaje",function(){
var id = $(this).data("id");
var name = $(this).data("name");

$("#hide").text(id);
$("#alumno").text(name);


document.getElementById('tarea1').style.display='block';

})

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
