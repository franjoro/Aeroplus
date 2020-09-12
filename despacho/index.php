<?php 
session_start();
$hoy=date("d-m-Y");
require("../conexion.php");
$id=$_SESSION['user'];
if ($_SESSION['session_id']=='3') {
require("../conexion.php");
$sql_se=mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='1'");
$sql_sem=mysqli_fetch_array($sql_se);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Programa de vuelo</title>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>
<body >
<style type="text/css">
	body{
		font-size: 12px;
	}
</style>
<div class="w3-bar w3-black w3-hide-small">
  <!-- <a href="../<?php //echo $s ?>/" class="w3-bar-item w3-button"><i class="fas fa-arrow-left"></i></a> -->
</div>
  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Despacho de vuelos Fecha: <?php echo $hoy ?></b></h1>
    <h6><span class="w3-tag">Semana actual <?php echo $sql_sem[0] ?></span></h6>
  </header>

<center>
<div class="w3-container">
	<table class="w3-table w3-centered w3-striped w3-hoverable " border="1" style="width: 90%" >

	 
	 <tbody id="tb">
	</tbody>
	</table>
</div>
</center><br>
<a href="../destroy.php"><button class="w3-button w3-red">Cerrar sesión</button></a>
<button class="w3-button w3-green" onclick="document.getElementById('id04').style.display = 'block';">Combustible</button>


<!-- ===================================================================================MODAAAAL -->

 <div id="id03" class="w3-modal" >
   <div class="w3-modal-content w3-card-4">
      <header class="w3-container" style="background-color: #00C291"> 
        <button class="w3-button w3-right" onclick="document.getElementById('id03').style.display = 'none';">X</button>
        <h2 id="semana" data-semana=<?php echo $sql_sem[0] ?>>Detalles de solicitud de vuelo (Semana <?php echo $sql_sem[0] ?>) Fecha: <?php echo $hoy ?></h2>
        <span id="do_hide" style="display: none"></span>
      </header>
      <div class="w3-container">
        <center><h3>Solicitud de vuelo pendiente de aprobación</h3></center>
  <br>
  <div class="w3-row">
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Aeronave:</b></label>
  <input class="w3-input" type="text" id="ae1" disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Día:</b></label>
  <input class="w3-input" type="text" id="di1"  disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Hora:</b></label>
  <input class="w3-input" type="text" id="in1" disabled>
  </div>
  </div>
  <div class="w3-row">
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Instuctor:</b></label>
  <input class="w3-input" type="text" id="ins1"  disabled>
  </div>
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Alumno:</b></label>
  <input class="w3-input" type="text" id="aluu" disabled>

<p id="hide1" style="display: none"></p>
  </div>
  </div>
  <br><br>
<!--   <button class="w3-btn w3-right " style="background-color: #00C291;margin-left:5px; " id="change_btn"><i class="fas fa-check"></i></button> 
  <button class="w3-btn w3-right w3-red" id="delete_btn"><i class="fas fa-trash"></i></button>  -->
<hr>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third" style="cursor: pointer" onclick="d1()">
      <div class="w3-container w3-padding-16 w3-green">
        <div class="w3-left"><i class="fas fa-check w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Iniciar vuelo</h4>
      </div>
    </div>
<a href="#cancelar_vuelo">
    <div class="w3-third" style="cursor: pointer" onclick="d2()">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="far fa-window-close w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Cancelar vuelo</h4>
      </div>
    </div>
</a>
    <div class="w3-third" style="cursor: pointer" onclick="d3()">
      <div class="w3-container w3-yellow w3-padding-16">
        <div class="w3-left"><i class="fas fa-user-clock w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Ausencia del alumno</h4>
      </div>
    </div>
  </div>
 
    <hr>
    <div class="w3-container" id="cancelar_vuelo" style="display: none;" >

    	<h3>Elegir motivo de cancelación de vuelo</h3>
    	<label>Motivo:</label>
    	<select class="w3-select" id="motivo">
    		<option disabled selected>Seleccionar motivo</option>
    		<option value="Mal clima">Mal clima</option>
    		<option value="Problemas técnicos en la aeronave">Problemas técnicos en la aeronave</option>
<?php 
$cmd1=mysqli_query($conexion,"SELECT * FROM disc WHERE Role='2' ");
$num_cmd=mysqli_num_rows($cmd1);
if($num_cmd>0){
  while($y=mysqli_fetch_array($cmd1)){
  $pl_cmd=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$y[1]'"));
  echo '<option value="Discrepancia activa'.$pl_cmd[0].'">Discrepancia activa '.$pl_cmd[0].'</option>' ;
  }
}
 ?>
    		<option value="Otro">Otro</option>
    	</select><br><br>
   <button class="w3-btn w3-right " onclick="cancel()" style="background-color: #00C291;margin-left:5px; " id="cancelar_btn">Cancelar vuelo</button> 
    </div>
    <br><br>
      </div>
    </div>
</div>




<!-- ========================== -->

  <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id04').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_nota" style="display: none"></span>
        <h2>Registrar bomba de combustible</h2>
      </header>
      <div class="w3-container w3-padding">
<div class="w3-row-padding">
  <div id="comb_div"> </div>
<table class="w3-table-all">
   <tr>
    <td colspan="3" class="w3-text-green"><strong>Registrar medida de combustible (Bomba de combustible)</strong> </td>
  </tr>
  <tr>
  <!--   <td><input type="text" class="w3-input w3-border" id="refe" maxlength="100" placeholder="N° Referencia bancario" style="background-color: #d5e7b8"></td> -->
    <td colspan="2"><input type="text" class="w3-input validanumericos w3-border" id="mas" placeholder="Bomba de combustible actual"></td>
    <td><button class="w3-button w3-blue" onclick="change_com(1)">Ingresar</button></td>
  </tr>
</table>
</div>   

      </div>
    </div>
  </div>

<!-- ===================================================================================MODAAAAL -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function change_com(ope){
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
       url:"fun/update_comb.php",
              method: "POST", 
              data:{mas:mas},
       success: function(data){
        $('input[type="text"]').val('');
        console.log(data);
        exito2();
        document.getElementById('id04').style.display='none';
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





function d1(){
	  $.confirm({
    title: '¿Iniciar vuelo?',
    content: 'Nota: esta acción cambiara el estado de vuelo',
    theme: 'modern',
    type: 'green',
    icon: 'fas fa-plane-departure',
    buttons: {
        confirm: function () {
        	var id =$("#do_hide").text();
        	var role='2';
                  $.ajax({
       url:"fun/start.php",
       data:{id:id,role:role},
       method: "POST", 
       success: function(data){
       	console.log(data);
        document.getElementById('id03').style.display = 'none';
      }
     })
        },
        cancel: function () {
            
        },
    }
});

}

function d3(){
	  $.confirm({
    title: 'Confirmación de alumno ausente',
    content: 'Se confirmara una multa al alumno ausente',
    theme: 'modern',
    type: 'red',
    icon: 'far fa-money-bill-alt',
    buttons: {
        confirm: function () {
        	var id =$("#do_hide").text();
        	var role='4';
        	var razon='x';
                  $.ajax({
       url:"fun/start.php",
       data:{id:id,role:role,razon:razon},
       method: "POST", 
       success: function(data){
       	console.log(data);
        document.getElementById('id03').style.display = 'none';
      }
     })
        },
        cancel: function () {
            
        },
    }
});

}
function d2(){
        document.getElementById('cancelar_vuelo').style.display = 'block';
}


function cancel(){

	  $.confirm({
    title: 'Cancelación de vuelo',
    content: 'Se guardara registro de la cancelación',
    theme: 'modern',
    type: 'red',
    icon: 'far fa-window-close',
    buttons: {
        confirm: function () {
        	var id =$("#do_hide").text();
        	var role='4';
        	var razon=$("#motivo").val();
                  $.ajax({
       url:"fun/start.php",
       data:{id:id,role:role,razon:razon},
       method: "POST", 
       success: function(data){
       	console.log(data);
        document.getElementById('id03').style.display = 'none';
        document.getElementById('cancelar_vuelo').style.display = 'none';

      }
     })
        },
        cancel: function () {
            
        },
    }
});

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




function cerrar_vivo(id){
	  $.confirm({
    title: '¿Finalizar vuelo?',
    content: 'Nota: esta acción activara el registro de evaluación al instructor',
    theme: 'modern',
    type: 'orange',
    icon: 'fas fa-plane-arrival',
    buttons: {
        confirm: function () {
        	var role='3';
                  $.ajax({
       url:"fun/start.php",
       data:{id:id,role:role},
       method: "POST", 
       success: function(data){
       	console.log(data);
      }
     })
        },
        cancel: function () {
            
        },
    }
});

}
 $(document).on("click",".lleno", function(){
  var id =$(this).data("id");

   $("#do_hide").text(id);
   var hora = $(this).data("hora");
   var day = $(this).data("day");
   var ins = $(this).data("ins");
   var plane = $(this).data("plane");
   var date = $(this).data("date");
   var hora_id = $(this).data("h");
   var dia_id = $(this).data("d");
   var aluu = $(this).data("alu");



// // =============================
   $('#id03').css("display", "block");
   $("#ae1").val(plane);
   $("#di1").val(hora);
   $("#in1").val(day);
   $("#ins1").val(ins);
   $("#aluu").val(aluu);
   $("#date1").text(date);
  
});


	  function exito(){
    $.alert({
    title: 'Recopilando información',
    content: 'Cargando...',
    theme: 'modern',
    type:'dark',
    icon: 'fas fa-spinner fa-spin',
    autoClose: 'Ok|1000',
    buttons: {
        Ok: function () {
        }
    }

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

    function campos(){
    $.alert({
    title: '¡Atención!',
    content: 'Debes rellenar todos los campos.',
    theme: 'modern',
    type:'orange',
    icon: 'far fa-keyboard',
});
  }

	   	var a =0;
	   setInterval(function obtener(){
     $.ajax({
       url:"fun/tabla.php",
              method: "POST", 
       success: function(data){
         $("#tb").html(data)
         a=a+1;

      }
     })
 },1000)

 $(document).ready( function () {
 	exito();
 	// obtener();
} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</body>
</html>
<?php 
}else{
  header("location:../destroy.php");
}

 ?>
