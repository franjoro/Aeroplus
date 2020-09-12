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
    <a href="aeronaves.php" class="w3-bar-item w3-button w3-padding "><i class="fas fa-plane fa-fw"></i> Aeronaves y combustible</a>
    <a href="alumnos.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-user-tie fa-fw"></i> Alumnos</a>
    <a href="instructores.php" class="w3-bar-item w3-button w3-padding ecolor2 w3-text-white" ><i class="fa fa-users fa-fw"></i> Instructores</a>
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
        <h4>Ingresar Instructor</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d2()">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver instructores</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d3()">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fas fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Tareas</h4>
      </div>
    </div>
        <div class="w3-quarter" style="cursor: pointer" onclick="d1()">
      <div class="w3-container w3-padding-16 w3-gray">
        <div class="w3-left"><i class="fas fa-info-circle w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Reportes</h4>
      </div>
    </div>
  </div>




  <div class="w3-container" id="add" style="display: none">
    <h5><b>Ingresar Instructor</b></h5> 
      <div class="w3-card-2 w3-hover-shadow w3-padding">
          <div class="w3-row-padding">
          	 <div class="w3-half">
          	    <label>Usuario-Licencia:</label>
              <input class="w3-input w3-border" required type="text" id="user" placeholder="User" >
          	 </div>
             <div class="w3-half">
                <label>Nombre:</label>
              <input class="w3-input w3-border" required type="text" id="name" placeholder="Name" >
          	 </div>
          </div>
          <br>
          <div class="w3-row-padding">
            <div class="w3-half">
               <label>Email:</label>
              <input class="w3-input w3-border" required type="Email" id="email" placeholder="Email" >
            </div>
            <div class="w3-half">
               <label>Teléfono:</label>
              <input class="w3-input w3-border" type="text" required id="tel" placeholder="Telephone">
            </div>
            
          </div>
          <div class="w3-row-padding">
          <br>
          <h5>Asignación de tareas</h5>
          <button class="w3-button w3-blue" style="float: right;" onclick="ayuda1()"><i class="fas fa-question far-spin"></i></button>
					  <label>1.Teoría</label>
					  <input class="w3-check micheckbox" type="checkbox" id="teo">
					  <label>2.Vuelo</label>
					  <input class="w3-check micheckbox" type="checkbox" id="vu">
            <label>3.Instructor programador</label>  
            <input class="w3-check micheckbox" type="checkbox" id="pr">
					  <label>4.Encargado de aeronave</label>	
					  <input class="w3-check micheckbox" type="checkbox" id="en">
            <hr> <br><br>
              <button style="height: 100%;width: 100%;" class="w3-green w3-button" id='name_add'>Ingresar</button>
          </div>
      </div>
  </div>



  <div class="w3-container" id="ver" style="display: none">
    <h5><b>Información de Instructores</b></h5>
    
    <div id=tb></div>

  </div>
<!-- ============================================MOOOOODAAALS====================================================== -->
  <div id="tarea1" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container ecolor2"> 
        <span onclick="document.getElementById('tarea1').style.display='none'" 
        class="w3-button w3-display-topright w3-text-white">&times;</span>
        <h2 class="w3-text-white">Instructor de teoría: <span id="up"></span></h2>
        <span style="display:none" id="hide1"></span>
      </header>
      <div class="w3-container">
       
          <h3>Asignar alumno:</h3>

         
        <div id="display_teo"></div>
        <br><br>
      </div>
    </div>
  </div>

<!-- ============ -->

  <div id="tarea2" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container ecolor2"> 
        <span onclick="document.getElementById('tarea2').style.display='none'" 
        class="w3-button w3-display-topright w3-text-white">&times;</span>
        <h2 class="w3-text-white">Instructor de vuelo: <span id="up2"></span></h2>
        <span style="display:none" id="hide2"></span>
      </header>
      <div class="w3-container">
       
          <h3>Asignar alumno:</h3>

         
        <div id="display_vue"></div>
        <br><br>
      </div>
    </div>
  </div>

  <!-- ============ -->

  <div id="tarea3" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container ecolor2"> 
        <span onclick="document.getElementById('tarea3').style.display='none'" 
        class="w3-button w3-display-topright w3-text-white">&times;</span>
        <h2 class="w3-text-white">Instructor encargado de aeronave: <span id="up3"></span></h2>
        <span style="display:none" id="hide3"></span>
      </header>
      <div class="w3-container">
       
          <h3>Asignar aeronave:</h3>

         
        <div id="display_ae"></div>
        <br><br>
      </div>
    </div>
  </div>
  <!-- =============== -->
  <div id="id011" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id011').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_alu2" style="display: none"></span>
        <h2>Editar instructor</h2>
      </header>
      <div class="w3-container w3-padding">

<div class="w3-row w3-padding">
    <label>Nombre:</label>
    <input class="w3-input w3-border" type="text"  id="name22">
</div>

<div class="w3-row ">
   <div class="w3-half w3-padding">   
    <label>Email:</label>
    <input class="w3-input w3-border" type="text" id="email22">
    </div>
   <div class="w3-half w3-padding">   
    <label>Telefóno:</label>
    <input class="w3-input w3-border" type="text" id="tel22">
	</div>
</div>


    <label>Editar tareas:</label>
<div class="w3-row-padding">
	<div class="w3-quarter">
		<input class="w3-check" type="checkbox" id="t1">
		<label>Intructor de teoría</label>
	</div>
		<div class="w3-quarter">
		<input class="w3-check" type="checkbox" id="t2">
		<label>Instructor de vuelo</label>
	</div>
		<div class="w3-quarter">
		<input class="w3-check" type="checkbox" id="t3">
		<label>Instructor programador</label>
	</div>
		<div class="w3-quarter">
		<input class="w3-check" type="checkbox" id="t4">
		<label>Encargado de aeronave</label>
	</div>
</div>
<br>
    <button class="w3-button w3-green w3-right" id="btn_ins_update"><i class="fas fa-check"></i></button>
    </div>

      </div>
    </div>
<!-- ============================================MOOOOODAAALS====================================================== -->

  <div class="w3-container" id="report" style="display: none;" >
    <div class="w3-container">
  <h2>Asignación de tareas</h2>
<button class="w3-button w3-right" onclick="ayuda2();"><i class="fas fa-question-circle"></i></button>
  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'it');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Instructor de teoría</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'iv');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Instructor de vuelo</div>
    </a>
        <a href="javascript:void(0)" onclick="openCity(event, 'ea');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Encargado de aeronave</div>
    </a>
  </div>

  <div id="it" class="w3-container city" style="display:none">
<div class="w3-row">
<div class="w3-col m11">
<h2>Asignar encargado de teoría</h2>
</div>
<div class="w3-col m1">
<button class="w3-button w3-right" onclick="ayuda3();"><i class="fas fa-question-circle"></i></button>
</div>
</div>

<div class="w3-row w3-padding">
  <div class="w3-col m5">
   <table class="w3-table-all"> 
     <thead>
       <th>Instructor</th>
       <th>Editar</th>
     </thead>
     <tbody>
      <?php
       $sql1=mysqli_query($conexion,"SELECT Nombre,id_user FROM instructor WHERE Ins_te='1'") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
      ?>
       <tr>
         <td><?php echo $sqll1[0]; ?></td>
         <td><button id="btn_teo" data-id="<?php echo $sqll1[1] ?>" data-name="<?php echo $sqll1[0] ?>" class="w3-button w3-small"><i class="fas fa-edit"></i></button></td>
       </tr>

      <?php 
      }
       ?>

     </tbody>
   </table>
  </div>
  <div class="w3-col m2"><p></p></div>
  <div class="w3-col m5">
    <div id="no_asignado"></div>
  </div>
</div>
<br><br><br>
  </div>

  <div id="iv" class="w3-container city" style="display:none">
<div class="w3-row">
<div class="w3-col m11">
<h2>Asignar encargado de vuelo</h2>
</div>
<div class="w3-col m1">
<button class="w3-button w3-right" onclick="ayuda4();"><i class="fas fa-question-circle"></i></button>
</div>
</div>

<div class="w3-row w3-padding">
  <div class="w3-col m5">
   <table class="w3-table-all"> 
     <thead>
       <th>Instructor</th>
       <th>Editar</th>
     </thead>
     <tbody>
      <?php
       $sql1=mysqli_query($conexion,"SELECT Nombre,id_user FROM instructor WHERE Ins_vu='1'") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
      ?>
       <tr>
         <td><?php echo $sqll1[0]; ?></td>
         <td><button id="btn_teo2" data-id="<?php echo $sqll1[1] ?>" data-name="<?php echo $sqll1[0] ?>" class="w3-button w3-small"><i class="fas fa-edit"></i></button></td>
       </tr>

      <?php 
      }
       ?>

     </tbody>
   </table>
  </div>
  <div class="w3-col m2"><p></p></div>
  <div class="w3-col m5">
    <div id="no_asignado2"></div>
  </div>
</div>
<br><br><br>
  </div>



    <div id="ea" class="w3-container city" style="display:none">
<div class="w3-row">
<div class="w3-col m11">
<h2>Asignar encargado de aeronaves</h2>
</div>
<div class="w3-col m1">
<button class="w3-button w3-right" onclick="ayuda4();"><i class="fas fa-question-circle"></i></button>
</div>
</div>

<div class="w3-row w3-padding">
  <div class="w3-col m5">
   <table class="w3-table-all"> 
     <thead>
       <th>Instructor</th>
       <th>Editar</th>
     </thead>
     <tbody>
      <?php
       $sql1=mysqli_query($conexion,"SELECT Nombre,id_user FROM instructor WHERE Ins_En='1'") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
      ?>
       <tr>
         <td><?php echo $sqll1[0]; ?></td>
         <td><button id="btn_teo3" data-id="<?php echo $sqll1[1] ?>" data-name="<?php echo $sqll1[0] ?>" class="w3-button w3-small"><i class="fas fa-edit"></i></button></td>
       </tr>

      <?php 
      }
       ?>

     </tbody>
   </table>
  </div>
  <div class="w3-col m2"><p></p></div>
  <div class="w3-col m5">
    <div id="no_asignado3"></div>
  </div>
</div>
<br><br><br>
  </div>





</div>
  </div>







</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>
<script type="text/javascript">
 $(document).on("click", "#btn_ins_update",function(){
  var id= $("#hide_alu2").text();
  var name= $("#name22").val();
  var email= $("#email22").val();
  var tel= $("#tel22").val();


if( $('#t1').prop('checked') ) {
   var teo='1';
}else{
   var teo='0';
}

if( $('#t2').prop('checked') ) {
   var vu='1';
}else{
   var vu='0';
}
if( $('#t3').prop('checked') ) {
   var pro='1';
}else{
   var pro='0';
}
if( $('#t4').prop('checked') ) {
   var en='1';
}else{
   var en='0';
}



  $.confirm({
    title: '¿Editar instructor?',
    content: 'Nota: La información del instructor se afectara',
    theme: 'modern',
    type: 'orange',
    icon: 'fas fa-user-edit',
    buttons: {
        confirm: function () {
     $.ajax({
       url:"fun/instructores/update_ins.php",
              method: "POST", 
              data:{id:id,name:name,email:email,tel:tel,teo:teo,vu:vu,pro:pro,en:en},
       success: function(data){
       	console.log(data)
 	   document.getElementById('id011').style.display = 'none';
	   obtener()
      }
     })
        },
        cancel: function () {
            
        },
    }
});









   })



   $(document).on("click", "#edit_ins",function(){
   var id = $(this).data("id");
   var name = $(this).data("name");
   var email = $(this).data("email");
   var tel = $(this).data("tel");

   var teo = $(this).data("teo");
   var vu = $(this).data("vu");
   var pro = $(this).data("pro");
   var en = $(this).data("en");




  $("#hide_alu2").text(id);
  $("#name22").val(name);
  $("#email22").val(email);
  $("#tel22").val(tel);


if (teo=='1') {$("#t1").prop('checked', true);}
if (vu=='1') {$("#t2").prop('checked', true);}
if (pro=='1') {$("#t3").prop('checked', true);}
if (en=='1') {$("#t4").prop('checked', true);}



 document.getElementById('id011').style.display = 'block';

   })



get_table_no();
get_table_no2();
get_table_no3();

   function obtener(){
     $.ajax({
       url:"fun/instructores/tabla.php",
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
  function alerta(){
    $.alert({
    title: '¡Atención!',
    content: 'Algo salio mal, intenta de nuevo más tarde.',
    theme: 'modern',
    type:'orange',
    icon: 'far fa-frown-open',
});
  }
  function ayuda1(){
    $.dialog({
    title: 'Ayuda',
    content: 'Las tareas son el trabajo de cada instructor, establecen los accesos a la plataforma. Un intructor puede tener más de una tarea',
    theme: 'modern',
    type:'blue',
    icon: 'fas fa-info ',
});
  }
    function ayuda2(){
    $.dialog({
    title: 'Ayuda',
    content: 'Selecciona la tarea y asigna según corresponda a cada instructor. Si necesitas más información cada sección cuenta con un botón de ayuda' ,
    theme: 'modern',
    type:'blue',
    icon: 'fas fa-info ',
});
  }
    function ayuda3(){
    $.dialog({
    title: 'Ayuda',
    content: '-Tabla derecha: contiene los alumnos que no tienen asignado un encargado de teoría. -Tabla izquierda: Contiene todos los intructores asignados a subir notas de teoría' ,
    theme: 'modern',
    type:'blue',
    icon: 'fas fa-info ',
});
  }
      function ayuda4(){
    $.dialog({
    title: 'Ayuda',
    content: '-Tabla derecha: contiene los alumnos que no tienen asignado un encargado de vuelo. -Tabla izquierda: Contiene todos los intructores asignados de ingresar las horas designadas para volar (Programa de vuelo)' ,
    theme: 'modern',
    type:'blue',
    icon: 'fas fa-info ',
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


   $(document).on("click", "#btn_teo",function(){
    document.getElementById('tarea1').style.display='block';
    var id= $(this).data("id");
    var name= $(this).data("name");
    $("#up").text(name);
    $("#hide1").text(id);

    get_table(id);

});

   $(document).on("click", "#btn_teo2",function(){
    document.getElementById('tarea2').style.display='block';
    var id= $(this).data("id");
    var name= $(this).data("name");
    $("#up2").text(name);
    $("#hide2").text(id);

    get_table_vu(id);

});

   $(document).on("click", "#btn_teo3",function(){
    document.getElementById('tarea3').style.display='block';
    var id= $(this).data("id");
    var name= $(this).data("name");
    $("#up3").text(name);
    $("#hide3").text(id);

    get_table_ae(id);

});

   $(document).on("click", "#trash1",function(){
    var ins= $(this).data("id_ins");
    var alu= $(this).data("alu");
    var role='1';
          $.ajax({
        url:"fun/instructores/delete_teo.php",
        method: "POST",
        data: {ins:ins,alu:alu,role:role},
        success:function(data){
          get_table(ins);
          get_table_no();
        },
      })
    
});

   $(document).on("click", "#trash2",function(){
    var ins= $(this).data("id_ins");
    var alu= $(this).data("alu");
    var role='2';
          $.ajax({
        url:"fun/instructores/delete_teo.php",
        method: "POST",
        data: {ins:ins,alu:alu,role:role},
        success:function(data){
          get_table_vu(ins);
          get_table_no2();
        },
      })
    
});

   $(document).on("click", "#trash3",function(){
    var ins= $(this).data("id_ins");
    var alu= $(this).data("alu");
    var role='3';
          $.ajax({
        url:"fun/instructores/delete_teo.php",
        method: "POST",
        data: {ins:ins,alu:alu,role:role},
        success:function(data){
          get_table_ae(ins);
          get_table_no3();
        },
      })
    
});

   $(document).on("click", "#btn_modal_1",function(){
  var op =$("#add_teo").val();
  var id =$("#hide1").text();

        $.ajax({
        url:"fun/instructores/insertar_teo.php",
        method: "POST",
        data: {op:op,id:id},
        success:function(data){
          get_table(id);
          get_table_no();
        },
      })
});

   $(document).on("click", "#btn_modal_2",function(){
  var op =$("#add_teo1").val();
  var id =$("#hide2").text();

        $.ajax({
        url:"fun/instructores/insertar_vue.php",
        method: "POST",
        data: {op:op,id:id},
        success:function(data){
          get_table_vu(id);
          get_table_no2();
        },
      })
});

   $(document).on("click", "#btn_modal_3",function(){
  var op =$("#add_ae").val();
  var id =$("#hide3").text();

        $.ajax({
        url:"fun/instructores/insertar_ae.php",
        method: "POST",
        data: {op:op,id:id},
        success:function(data){
          get_table_ae(id);
          get_table_no3();
        },
      })
});



function get_table(id){
       $.ajax({
       url:"fun/instructores/tabla_teo.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
         $("#display_teo").html(data)
      }
     })
}

function get_table_vu(id){
       $.ajax({
       url:"fun/instructores/tabla_vue.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
         $("#display_vue").html(data)
      }
     })
}

function get_table_ae(id){
       $.ajax({
       url:"fun/instructores/tabla_ae.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
         $("#display_ae").html(data)
      }
     })
}

function get_table_no(){
  var role ='1';
       $.ajax({
       url:"fun/instructores/no_asignado.php",
              method: "POST", 
              data:{role:role},
       success: function(data){
         $("#no_asignado").html(data)
      }
     })
}

function get_table_no2(){
  var role ='2';
       $.ajax({
       url:"fun/instructores/no_asignado.php",
              method: "POST", 
              data:{role:role},
       success: function(data){
         $("#no_asignado2").html(data)
      }
     })
}

function get_table_no3(){
       $.ajax({
       url:"fun/instructores/no_asignado_ae.php",
              method: "POST", 
       success: function(data){
         $("#no_asignado3").html(data)
      }
     })
}

   $(document).on("click", "#name_add",function(){

if( $('#teo').prop('checked') ) {
    var teo = "1";
}else{
	var teo = "0";
}
if( $('#vu').prop('checked') ) {
    var vu = "1";
}else{
	var vu = "0";
}
if( $('#pr').prop('checked') ) {
    var pr = "1";
}else{
	var pr = "0";
}
if( $('#en').prop('checked') ) {
    var en = "1";
}else{
	var en = "0";
}
      var user = $("#user").val();
      var name = $("#name").val();
      var email = $("#email").val();
      var tel = $("#tel").val();
if (user !="" && name!="" && email!="" && tel!="" && (vu=="1"||pr=="1" || en =="1"|| teo =="1")) {
      $.ajax({
        url:"fun/instructores/insertar.php",
        method: "POST",
        data: {user:user,name:name,email:email,tel:tel,vu:vu,pr:pr,en:en,teo:teo},
        success:function(data){
        	console.log(data);
         if (data="Si") {
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
