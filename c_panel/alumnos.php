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
html,body,h1,h2,h3,h4,h5 {font-family: 'Roboto', sans-serif;};

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
    <a href="alumnos.php" class="w3-bar-item w3-button w3-padding ecolor2 w3-text-white"><i class="fas fa-user-tie fa-fw"></i> Alumnos</a>
    <a href="instructores.php" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-users fa-fw"></i> Instructores</a>
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
        <h4>Ingresar alumnos</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d2()">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fas fa-user-tie w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ver alumnos</h4>
      </div>
    </div>
    <div class="w3-quarter" style="cursor: pointer" onclick="d3()">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fas fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Aula virtual</h4>
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
    <h5><b>Ingresar alumno</b></h5> 
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
          <h5>Licencia</h5>
          <select class="w3-select" name="option" id=op>
  <option value="1" selected>P. Privado</option>
  <option value="2">H. Instrumentos</option>
  <option value="3">P. Comercial</option>
  <option value="4">H. Bimotor</option>
  <option value="5">P. Instructor</option>

</select>
            <hr>
          </div>
              <button style="height: 100%;width: 100%;" class="w3-green w3-button" id='name_add'>Ingresar</button>
      </div>
  </div>


<br>
  <div class="w3-container" id="ver" style="display: none">
    <div id="tb"></div>
  </div>

  <div class="w3-container" id="report" style="display: none">

        <div class="w3-container">
  <h2>Administración de aula virtual</h2>
  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'it');">
      <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding">Asignación de unidades</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'iv');">
      <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding">Notas ingresadas </div>
    </a>
  </div>

  <div id="it" class="w3-container city" style="display:none">
<div class="w3-row">
<div class="w3-col m11">
<h2>Unidades (Teoría)</h2>
</div>
<div class="w3-col m1">
<button class="w3-button w3-right" onclick="ayuda3();"><i class="fas fa-question-circle"></i></button>
</div>
</div>

<div class="w3-row w3-padding">
  <div class="w3-col m5">
  <div id="tb_uni"></div>
  </div>
  <div class="w3-col m2"><p></p></div>
  <div class="w3-col m5">
    <label>Nombre de la unidad:</label>
    <input class="w3-input w3-border" type="text" placeholder="Unidad" id="uni">
    <label>Descripción:</label>
    <textarea class='w3-input w3-border' id="des" placeholder="Descripción:" style="max-height: 100%; max-width: 100%; height: 200px;" ></textarea>
    <label>Licencia:</label>
    <select class="w3-select" id="li">
      <option disabled="" selected="">Selecciona la licencia</option>
  <option value="1" >P. Privado</option>
  <option value="2">H. Instrumentos</option>
  <option value="3">P. Comercial</option>
  <option value="4">H. Bimotor</option>
  <option value="5">P. Instructor</option>
    </select><br><br>
    <button class="w3-button w3-green w3-block" id="btn_uni">Ingresar</button>
  </div>
</div>
<br><br><br>
  </div>











  <div id="iv" class="w3-container city" style="display:none">
<div class="w3-row">
<div class="w3-col m11">
<h2>Notas ingresadas</h2>
</div>
<div class="w3-col m1">
<button class="w3-button w3-right" onclick="ayuda4();"><i class="fas fa-question-circle"></i></button>
</div>
</div>

<div class="w3-row w3-padding">
  <div id="tabla_notas"></div>
</div>
  
  </div>



</div>
  </div>


<br><br>
<!-- =========================================================MODAAAAAL -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_uni" style="display: none"></span>
        <h2>Editar unidad</h2>
      </header>
      <div class="w3-container">
<br>
    <label>Nombre de la unidad:</label>
    <input class="w3-input w3-border" type="text" placeholder="Unidad" id="uni1">
    <label>Descripción:</label>
    <textarea class='w3-input w3-border' id="des1" placeholder="Descripción:" style="max-height: 100%; max-width: 100%; height:100px;" ></textarea>
    <label>Licencia:</label>
    <select class="w3-select" id="li1">
      <option disabled="" selected="">Selecciona la licencia</option>
  <option value="1" >P. Privado</option>
  <option value="2">H. Instrumentos</option>
  <option value="3">P. Comercial</option>
  <option value="4">H. Bimotor</option>
  <option value="5">P. Instructor</option>
    </select><br><br>
    
    <button class="w3-button w3-green w3-right" id="btn_uni_update"><i class="fas fa-check"></i></button>
    <button class="w3-button w3-red w3-right w3-margin-right" id="btn_uni_delete"><i class="fas fa-trash"></i></button>
<br>
<br>
      </div>
    </div>
  </div>
<!-- =============== -->
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_alu2" style="display: none"></span>
        <h2>Editar alumno</h2>
      </header>
      <div class="w3-container">
<br>
<div class="w3-row">
   <div class="w3-half">   
    <label>Nombre:</label>
    <input class="w3-input w3-border" type="text"  id="name22">
   </div>
   <div class="w3-half">   
    <label>Cobro:</label>
    <input class="w3-input w3-border validanumericos" type="text"  id="cobro22">
   </div>
</div>
<div class="w3-row">
   <div class="w3-half">   
    <label>Email:</label>
    <input class="w3-input w3-border" type="text" id="email22">
    </div>
   <div class="w3-half">   
    <label>Telefóno:</label>
    <input class="w3-input w3-border" type="text" id="tel22">
</div>
</div>


    <label>Licencia:</label>
    <select class="w3-select" id="lic22">
      <option disabled="" selected="">Selecciona la licencia</option>
  <option value="1" >P. Privado</option>
  <option value="2">H. Instrumentos</option>
  <option value="3">P. Comercial</option>
  <option value="4">H. Bimotor</option>
  <option value="5">P. Instructor</option>
    </select><br><br>
    
    <button class="w3-button w3-green w3-right" id="btn_alu_update"><i class="fas fa-check"></i></button>
<br>
<br>
      </div>
    </div>
  </div>

<!-- =============== -->
  <div id="id03" class="w3-modal"  >
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id03').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_saldo" style="display: none"></span>
        <span id="undo" style="display: none"></span>

        <h2>Manejar saldo</h2>
      </header>
      <div class="w3-container">
<br>
<div id="saldo_div">
  </div>
  <center>
<table class="w3-table-all w3-center" style="width: 75%">
  <tr>
    <td colspan="3" class="w3-text-green"><strong>+Sumar al saldo actual: (Deposito)</strong> </td>
  </tr>
  <tr>
    <td><input type="text" class="w3-input w3-border"  id="refe" maxlength="100" placeholder="N° Referencia bancario" style="background-color: #d5e7b8"></td></td>
    <td><input type="text" class="w3-input validanumericos w3-border" id="mas" placeholder="Sumar" style="background-color: #d5e7b8"></td></td>
    <td><button class="w3-button w3-green" onclick="change_saldo(1)">Ingresar</button></td>
  </tr>
    <tr>
    <td colspan="3" class="w3-text-red"><strong>-Restarle al saldo actual:</strong></td>
   </tr>
    <td><input type="text" class="w3-input w3-border" id="motivo"  placeholder="Motivo" style="background-color: #f2b2ad"></td></td>
    <td><input type="text" class="w3-input validanumericos w3-border" id="menos" placeholder="Restar" style="background-color: #f2b2ad"></td>
    <td><button class="w3-button w3-green"  onclick="change_saldo(2)">Ingresar</button></td>

  </tr>
    <tr>
    <td colspan="3">Establecer nuevo saldo:</td>
  </tr>
  <tr>
    <td colspan="2"><input type="text" class="w3-input validanumericos w3-border" id="new" placeholder="Reemplazar" style="background-color: #b4c3d8"></td>
    <td><button class="w3-button w3-green"  onclick="change_saldo(3)">Ingresar</button></td>

  </tr>
</table>
</center>
<br>
    <!-- <button class="w3-button w3-red w3-right" onclick="change_saldo(4)" id="btn_saldo">Deshacer</button> -->
<br>
<br>
      </div>
      <div class="w3-container">
        <h3>Transacciones registradas</h3>
        <div id="tabla_cobros"></div>
      </div>

    </div>
  </div>

<!-- ======================== -->

  <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id04').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_nota" style="display: none"></span>
        <h2>Editar nota</h2>
      </header>
      <div class="w3-container">
<br>
<div class="w3-row-padding">
    <div class="w3-half">
      <label>Alumno:</label>
      <input class="w3-input" type="text" disabled id="nota_alu">
    </div>
    <div class="w3-half">
      <label>Unidad:</label>
      <input class="w3-input" type="text" disabled id="nota_uni">
    </div>
</div>   
<div class="w3-row-padding">
    <div class="w3-half">
      <label>Nota:</label>
      <input class="w3-input validanumericos" type="text" id="nota_nota1">
    </div>
    <div class="w3-half">
      <label>Reposición:</label>
      <input class="w3-input validanumericos" type="text" id="nota_nota2">
    </div>
</div>  
<br>
    <button class="w3-button w3-green w3-right" id="btn_add_notas"><i class="fas fa-check"></i></button>
    <button class="w3-button w3-red w3-right w3-margin-right" id="btn_delete_notas"><i class="fas fa-trash"></i></button>
<br>
<br>
      </div>
    </div>
  </div>



<!-- =========================================================MODAAAAAL -->
</div>

</div>
<script type="text/javascript">
  var separador = document.getElementById('mas');

separador.addEventListener('keyup', (e) => {
    var entrada = e.target.value.split(',').join('');
    entrada = entrada.split('').reverse();
    
    var salida = [];
    var aux = '';
    
    var paginador = Math.ceil(entrada.length / 3);
    
    for(let i = 0; i < paginador; i++) {
        for(let j = 0; j < 3; j++) {
            "123 4"
            if(entrada[j + (i*3)] != undefined) {
                aux += entrada[j + (i*3)];
            }
        }
        salida.push(aux);
        aux = '';
       
        e.target.value = salida.join(',').split("").reverse().join('');
    }
}, false);
</script>
<script type="text/javascript">
  var separador = document.getElementById('menos');

separador.addEventListener('keyup', (e) => {
    var entrada = e.target.value.split(',').join('');
    entrada = entrada.split('').reverse();
    
    var salida = [];
    var aux = '';
    
    var paginador = Math.ceil(entrada.length / 3);
    
    for(let i = 0; i < paginador; i++) {
        for(let j = 0; j < 3; j++) {
            "123 4"
            if(entrada[j + (i*3)] != undefined) {
                aux += entrada[j + (i*3)];
            }
        }
        salida.push(aux);
        aux = '';
       
        e.target.value = salida.join(',').split("").reverse().join('');
    }
}, false);
</script>

<script type="text/javascript">
  var separador = document.getElementById('new');

separador.addEventListener('keyup', (e) => {
    var entrada = e.target.value.split(',').join('');
    entrada = entrada.split('').reverse();
    
    var salida = [];
    var aux = '';
    
    var paginador = Math.ceil(entrada.length / 3);
    
    for(let i = 0; i < paginador; i++) {
        for(let j = 0; j < 3; j++) {
            "123 4"
            if(entrada[j + (i*3)] != undefined) {
                aux += entrada[j + (i*3)];
            }
        }
        salida.push(aux);
        aux = '';
       
        e.target.value = salida.join(',').split("").reverse().join('');
    }
}, false);
</script>

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
 $(document).on("click", "#btn_notas",function(){

   var id = $(this).data("id");
   var alu = $(this).data("alu");
   var uni = $(this).data("uni");
   var nota1 = $(this).data("nota1");
   var nota2 = $(this).data("nota2");

  $("#hide_nota").text(id);
  $("#nota_alu").val(alu);
  $("#nota_uni").val(uni);
  $("#nota_nota1").val(nota1);
  $("#nota_nota2").val(nota2);
 document.getElementById('id04').style.display = 'block';

})

 $(document).on("click", "#btn_add_notas",function(){
  var id = $("#hide_nota").text();
  var nota1 = $("#nota_nota1").val();
  var nota2=  $("#nota_nota2").val();

       $.ajax({
       url:"fun/alumnos/edit_notas.php",
       data:{id:id,nota1:nota1,nota2:nota2},
       method: "POST", 
       success: function(data){
        obtener_notas();
        document.getElementById('id04').style.display = 'none';
      }
     })
});

 $(document).on("click", "#btn_delete_notas",function(){
  var id = $("#hide_nota").text();


  $.confirm({
    title: '¿Eliminar nota?',
    content: 'Nota: El instructor encargado podra ingresar una nueva nota',
    theme: 'modern',
    type: 'red',
    icon: 'fas fa-trash',
    buttons: {
        confirm: function () {
                  $.ajax({
       url:"fun/alumnos/delete_notas.php",
       data:{id:id},
       method: "POST", 
       success: function(data){
        obtener_notas();
        document.getElementById('id04').style.display = 'none';
      }
     })
        },
        cancel: function () {
            
        },
    }
});



  
})

   function obtener_notas(){
     $.ajax({
       url:"fun/alumnos/tabla_notas.php",
              method: "POST", 
       success: function(data){
         $("#tabla_notas").html(data)

      }
     })
 }
obtener_notas();


function change_saldo(ope){
var saldo=$("#actual_saldo").text();
var id =$("#hide_saldo").text();


var refe =$("#refe").val();
var mas =$("#mas").val();
var mas1 = mas.replace(",","");

var motivo =$("#motivo").val();
var menos =$("#menos").val();
var menos1 = menos.replace(",","");

var new1 =$("#new").val();
var new11 = new1.replace(",","");

if (($("#mas").val()!="" && $("#refe").val()!="" ) || ( $("#menos").val()!="" && $("#motivo").val()!="") || $("#new").val()!="" ) {


if (ope=='1') {
  var send=(parseFloat(mas1)+parseFloat(saldo));
  var text=refe;
}
if (ope=='2') {
  var send=(parseFloat(saldo)-parseFloat(menos1));
  var text=motivo;

}
if (ope=='3') {
  var send=new11;
  var text="Reemplazo";

}
if (ope=='4') {
  var send=$("#undo").text();
}
    

     $.ajax({
       url:"fun/alumnos/update_saldo.php",
              method: "POST", 
              data:{id:id,send:send,op:ope,text:text},
       success: function(data){
        $('input[type="text"]').val('');
        console.log(data)
        tabla_cobros();
saldo1();
      }
     })

}else{
  campos();
}


}


 $(document).on("click", "#btn_uni_update",function(){
  var id= $("#hide_uni").text();
  var name= $("#uni1").val();
  var des= $("#des1").val();
  var lic= $("#li1").val();


     $.ajax({
       url:"fun/alumnos/update_uni.php",
              method: "POST", 
              data:{id:id,name:name,des:des,lic:lic},
       success: function(data){
 document.getElementById('id01').style.display = 'none';
get_uni()

      }
     })

   })




 $(document).on("click", "#btn_alu_update",function(){
  var id= $("#hide_alu2").text();
  var name= $("#name22").val();
  var email= $("#email22").val();
  var tel= $("#tel22").val();
  var lic= $("#lic22").val();
  var cobro =$("#cobro22").val();


     $.ajax({
       url:"fun/alumnos/update_alu.php",
              method: "POST", 
              data:{id:id,name:name,email:email,tel:tel,lic:lic,cobro:cobro},
       success: function(data){
 document.getElementById('id02').style.display = 'none';
obtener()

      }
     })

   })





   $(document).on("click", "#btn_uni_delete",function(){
   var id = $("#hide_uni").text();


     $.ajax({
       url:"fun/alumnos/delete_uni.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
 document.getElementById('id01').style.display = 'none';
get_uni()
      }
     })

   })




   $(document).on("click", "#editar_uni",function(){
   var id = $(this).data("id");
   var name = $(this).data("name");
   var des = $(this).data("des");
   var lic = $(this).data("lic");

  $("#hide_uni").text(id);
  $("#uni1").val(name);
  $("#des1").val(des);
  $("#li1").val(lic);

 document.getElementById('id01').style.display = 'block';

   })

   $(document).on("click", "#edit_alu",function(){
   var id = $(this).data("id");
   var name = $(this).data("name");
   var email = $(this).data("email");
   var tel = $(this).data("tel");
   var role = $(this).data("role");
   var cobro = $(this).data("cobro");


// alert(id+name+email+tel+role+saldo);  
  $("#hide_alu2").text(id);
  $("#name22").val(name);
  $("#email22").val(email);
  $("#tel22").val(tel);
  $("#lic22").val(role);
  $("#cobro22").val(cobro);



 document.getElementById('id02').style.display = 'block';

   })

function tabla_cobros(){
  var id =$("#hide_saldo").text();
       $.ajax({
      data:{id:id},
       url:"fun/alumnos/tabla_cobros.php",
       method: "POST", 
       success: function(data){
         $("#tabla_cobros").html(data);
         obtener();
      }
     })
}


   $(document).on("click", "#btn_saldo",function(){
   var id = $(this).data("id");
   var saldo = $(this).data("saldo");


  $("#hide_saldo").text(id);
  $("#undo").text(saldo);
tabla_cobros();
saldo1();
 document.getElementById('id03').style.display = 'block';

   })



   function saldo1(){
      var id=$("#hide_saldo").text();
     $.ajax({
      data:{id:id},
       url:"fun/alumnos/saldo.php",
       method: "POST", 
       success: function(data){
         $("#saldo_div").html(data);
      }
     })
 }


   function obtener(){
     $.ajax({
       url:"fun/alumnos/tabla.php",
              method: "POST", 
       success: function(data){
         $("#tb").html(data)

      }
     })
 }



   function get_uni(){
     $.ajax({
       url:"fun/alumnos/tabla_uni.php",
              method: "POST", 
       success: function(data){
         $("#tb_uni").html(data)

      }
     })
 }
get_uni()
  function d1(){
    document.getElementById('add').style.display='block';
        document.getElementById('ver').style.display='none';
            document.getElementById('report').style.display='none';
  }
  function d2(){
    document.getElementById('ver').style.display='block';
        document.getElementById('add').style.display='none';
            document.getElementById('report').style.display='none';
  }
  function d3(){
    document.getElementById('report').style.display='block';
        document.getElementById('ver').style.display='none';
            document.getElementById('add').style.display='none';
  }
  function exito(){
    $.alert({
    title: 'Perfecto',
    content: 'Alumno ingresado con exito!',
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
    $.alert({
    title: 'Ayuda',
    content: 'Las tareas son el trabajo de cada instructor, establecen los accesos a la plataforma. Un intructor puede tener más de una tarea',
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
   $(document).on("click", "#btn_uni",function(){
   var name = $("#uni").val();
   var des = $("#des").val();
   var li= $("#li").val();

if (name!="" && des!="" && li!="") {

   $.ajax({
       url:"fun/alumnos/insertar_u.php",
       data:{name:name,des:des,li:li},
              method: "POST", 
       success: function(data){
        $('input[type="text"]').val('');
        $('#des').val('');
         get_uni();
      }
     })
  }else{ 
   campos()
 }
   })

   $(document).on("click", "#name_add",function(){

      var user = $("#user").val();
      var name = $("#name").val();
      var email = $("#email").val();
      var tel = $("#tel").val();
      var op = $("#op").val();
if (user !="" && name!="" && email!="" && tel!="") {
      $.ajax({
        url:"fun/alumnos/insertar.php",
        method: "POST",
        data: {user:user,name:name,email:email,tel:tel,op:op},
        success:function(data){
        	console.log(data);
         if (data="Si") {
            exito();
            d2();
            obtener();
            $('input[type="text"]').val('');
            $('input[type="email"]').val('');

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

    $(function(){

  $('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
     return false;
  })
  .on("cut copy paste",function(e){
  e.preventDefault();
  });

});

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
