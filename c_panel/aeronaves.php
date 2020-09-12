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
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <a href="aeronaves.php" class="w3-bar-item w3-button w3-padding w3-text-white ecolor2"><i class="fas fa-plane fa-fw"></i> Aeronaves y combustible</a>
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
    <h5><b>Opciones de Aeronaves</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter" style="cursor: pointer" onclick="d1()">
      <div class="w3-container w3-padding-16 w3-green">
        <div class="w3-left"><i class="fas fa-plus w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ingresar Aeronaves</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d2()">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-plane w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver Aeronaves</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d3()">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fas fa-gas-pump w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Combustibles</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer">
      <div class="w3-container w3-grey w3-padding-16">
        <div class="w3-left"><i class="fas fa-info-circle w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Reportes</h4>
      </div>
    </div>
  </div>




  <div class="w3-container" id="add"  style="display: none" >
    <h5><b>Ingresar aeronave</b></h5> 
      <div class="w3-card-2 w3-hover-shadow w3-padding">
          <div class="w3-row-padding">
            <div class="w3-third">
               <label>Matrícula:</label>
              <input class="w3-input w3-border" required type="text" id="ma" >
            </div>
            <div class="w3-third">
               <label>Color:</label>
              <input class="w3-input w3-border" type="color" style="width: 50%; height:35px;" id="co">
            </div>
            <div class="w3-third w3-padding"> 
              <button style="height: 100%;width: 100%;" class="w3-green w3-button" id='name_add'>Ingresar</button>
            </div>
          </div>
      </div>
  </div>



  <div class="w3-container" id="ver" style="display: none;" >
    <h5><b>Información de Aeronaves</b></h5>
    
    <div id=tb></div>

  </div>
  <div class="w3-container" id="report" style="display: none">
    <h5><b>Información de combustible</b></h5>
    <button class="w3-button w3-right w3-green" onclick="document.getElementById('id04').style.display='block'">Ingresar combustible</button> <br><br>
    <div id=tb1></div>
  </div>



<!-- ======================== MOOOODAL -->

  <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id04').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_nota" style="display: none"></span>
        <h2>Ingresar combustible</h2>
      </header>
      <div class="w3-container w3-padding">
<div class="w3-row-padding">
  <div id="comb_div"> </div>
<table class="w3-table-all">
   <tr>
    <td colspan="3" class="w3-text-green"><strong>+Sumar al combustible actual: (Deposito)</strong> </td>
  </tr>
  <tr>
  <!--   <td><input type="text" class="w3-input w3-border" id="refe" maxlength="100" placeholder="N° Referencia bancario" style="background-color: #d5e7b8"></td> -->
    <td colspan="2"><input type="text" class="w3-input validanumericos w3-border" id="mas" placeholder="Sumar combustible al actual" style="background-color: #d5e7b8"></td>
    <td><button class="w3-button w3-green" onclick="change_com(1)">Ingresar</button></td>
  </tr>
</table>
</div>   

      </div>
    </div>
  </div>

<!-- ==================== -->

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_pl" style="display: none"></span>
        <h2>Editar pago por hora</h2>
      </header>
      <div class="w3-container w3-padding">
<div class="w3-row-padding">
 <h3><b>Aeronave: <span id="pl"></span></b></h3>
<table class="w3-table-all">
   <tr>
    <td colspan="3" class="w3-text-green"><strong>Editar el pago por hora de vuelo a cada instructor</strong> </td>
  </tr>
  <tr>
  <!--   <td><input type="text" class="w3-input w3-border" id="refe" maxlength="100" placeholder="N° Referencia bancario" style="background-color: #d5e7b8"></td> -->
    <td colspan="2"><input type="text" class="w3-input validanumericos w3-border" id="xd" placeholder="Sumar combustible al actual" style="background-color: #d5e7b8"></td>
    <td><button class="w3-button w3-green" onclick="change_pago()">Ingresar</button></td>
  </tr>
</table>
</div>   

      </div>
    </div>
  </div>
<!-- ======================== MOOOODAL -->




</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>



<script type="text/javascript">

	function change_pago(){
  var id= $("#hide_pl").text();
  var num= $("#xd").val();

  if (num=='') {
  	campos();
  }else{
  	  $.confirm({
    title: '¿Estás seguro?',
    content: 'Esta acción afectara a las proximas planillas generadas',
    theme: 'modern',
    type: 'green',
    icon: 'fas fa-exclamation-triangle',
    buttons: {
        confirm: function () {

     $.ajax({
       url:"fun/aeronaves/update_pago.php",
              method: "POST", 
              data:{id:id,num:num},
       success: function(data){
        $('input[type="text"]').val('');
        console.log(data);
        document.getElementById('id01').style.display='none';
        obtener();
      }
     })
    },
        cancel: function () {
            
        },
    }
});
  }

	}

   $(document).on("click", "#edit_pl",function(){
   var id = $(this).data("id");
   var pago = $(this).data("pago");
   var ma = $(this).data("ma");


   $("#hide_pl").text(id);
   $("#pl").text(ma);
   $("#xd").val(pago);

   document.getElementById('id01').style.display='block';

  });


function change_com(ope){
var saldo=$("#actual_comb").text();
var mas =$("#mas").val();

if ($("#mas").val()!="") {

  $.confirm({
    title: '¿Estás seguro?',
    content: 'Por favor revisa si los datos son correctos antes de ingresarlos',
    theme: 'modern',
    type: 'red',
    icon: 'fas fa-exclamation-triangle',
    buttons: {
        confirm: function () {

     $.ajax({
       url:"fun/aeronaves/update_comb.php",
              method: "POST", 
              data:{mas:mas,saldo:saldo},
       success: function(data){
        $('input[type="text"]').val('');
        console.log(data);
        comb();
        exito2();
        document.getElementById('id04').style.display='none';
        obtener1();
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

}
   function obtener1(){
     $.ajax({
       url:"fun/aeronaves/tabla_comb.php",
              method: "POST", 
       success: function(data){
         $("#tb1").html(data)

      }
     })
 }

obtener1();
   function obtener(){
     $.ajax({
       url:"fun/aeronaves/tabla.php",
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
    title: 'Perfecto',
    content: '¡Aeronave ingresada con exito!',
    theme: 'modern',
    type:'green',
    icon: 'far fa-thumbs-up',
});
  }

    function exito2(){
    $.alert({
    title: 'Perfecto',
    content: 'Combustible ingresada con exito!',
    theme: 'modern',
    type:'green',
    icon: 'far fa-thumbs-up',
});
  }
  function alerta(){
    $.alert({
    title: '¡Atención!',
    content: 'Algo salio mal, intenta de nuevo más tarde',
    theme: 'modern',
    type:'orange',
    icon: 'far fa-frown-open',
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

   function comb(){
     $.ajax({
       url:"fun/aeronaves/comb_show.php",
       method: "POST", 
       success: function(data){
         $("#comb_div").html(data);
      }
     })
 }

comb();

 $(function(){

  $('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
     return false;
  })
  .on("cut copy paste",function(e){
  e.preventDefault();
  });

});

   $(document).on("click", "#name_add",function(){
      var ma = $("#ma").val();
      var co = $("#co").val();

if (ma!="") {
      $.ajax({
        url:"fun/aeronaves/insertar.php",
        method: "POST",
        data: {ma: ma ,co:co},
        success:function(data){
         if (data=="Si") {
            exito();
            d2();
            obtener();
            $('input[type="text"]').val('');
         }else{
            alerta();
         }
        },
      })
}else{
  campos();
}


    })

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
