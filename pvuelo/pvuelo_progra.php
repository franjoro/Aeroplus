<?php 
session_start();
require("../conexion.php");
$id=$_SESSION['user'];
if ($_SESSION['session_id']=='1' || $_SESSION['session_id']=='0' ) {

if ($_SESSION['session_id']=='1') {
  $s="instructores";
}else{
  $s='c_panel';
}

  $sql= mysqli_query($conexion,"SELECT id_ins,Nombre FROM instructor WHERE id_user='$id' ");
  $sqll=mysqli_fetch_array($sql);


$sql_se=mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='2'");
$sql_sem=mysqli_fetch_array($sql_se);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Programa de vuelo</title>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../dist/jquery-confirm.min.css">
</head>
<body >
<style type="text/css">
a:link 
{ 
text-decoration:none; 
} 
</style>
<div class="w3-bar w3-black w3-hide-small">
  <a href="../<?php echo $s ?>/" class="w3-bar-item w3-button"><i class="fas fa-arrow-left"></i></a>
</div>
  


  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Solicitudes pendientes (Programa de vuelo)</b></h1>
    <h6><span class="w3-tag">Semana <?php echo $sql_sem[0] ?></span></h6>
    <h6 class="w3-text">¿Necesitas ayuda? da click abajo.</h6>
    <h6><button class="w3-button " onclick="help();"><i class="fas fa-question-circle"></i></button></h6>
  </header>

<div class="table-responsive-lg container">
	<table class="table table-striped table-hover table-bordered ">
    <thead>
   <tr>
    <th rowspan="2"></th>
    <th rowspan="2">Aeronaves</th>
    <th colspan="2" >Lunes</th>
    <th colspan="2">Martes</th>
    <th colspan="2">Miercoles</th>
    <th colspan="2">Jueves</th>
    <th colspan="2">Viernes</th>
    <th colspan="2">Sabado</th>
   </tr>
   <tr>
    <td>Alumno</td>
    <td>Instructor</td>
    <td>Alumno</td>
    <td>Instructor</td>
    <td>Alumno</td>
    <td>Instructor</td>
    <td>Alumno</td>
    <td>Instructor</td>
    <td>Alumno</td>
    <td>Instructor</td>
    <td>Alumno</td>
    <td>Instructor</td>
   </tr>
   </thead>
	 <tbody id="tb">
	</tbody>
	</table>
</div>








<!-- ===================================================================================MODAAAAL -->

<div id="id02" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-black"> 
      <span onclick="document.getElementById('id02').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Editar solicitud de vuelo</h2>
      <span id="edit_hide" style="display: none"></span>
    </header>
<br>
    <div class="w3-row w3-padding">
      <div class="w3-half">
  <label class="w3-text"><b>Editar estado de solicitud:</b></label>
<p>Nota: esto causara que la solicitud vuelva a estado "pendiente de aprobación" y el instructor pueda editarla.</p>
<br>
        <button class="w3-button w3-green " id="btn_actu">Cambiar a "Pendiente de aprobación  "</button>

</div>
      <div class="w3-half w3-padding">
  <label class="w3-text"><b>Eliminar solicitud de vuelo:</b></label> <br>

        <button class="w3-button w3-red" id="delete">Eliminar <i class="fas fa-trash"></i></button>
      </div>
    </div>
      <br>


  </div>
</div>

<!-- ================= -->

 <div id="id01" class="w3-modal">
   <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-black"> 
        <button class="w3-button w3-right" onclick="document.getElementById('id01').style.display = 'none';">X</button>
        <h2 id="semana" data-semana=<?php echo $sql_sem[0] ?>>Enviar solicitud de vuelo (Semana <?php echo $sql_sem[0] ?>) Fecha:<span id="date"></span></h2>
      </header>
      <div class="w3-container">
  <br>
  <div class="w3-row">
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Aeronave:</b></label>
  <input class="w3-input" type="text" id="ae" disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Día:</b></label>
  <input class="w3-input" type="text" id="di"  disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Hora:</b></label>
  <input class="w3-input" type="text" id="in" disabled>
  </div>
  </div>
  <div class="w3-row">
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Instructor:</b></label>

<select class="w3-select" id="option">
  <option value="" disabled selected>Selecciona instructor</option>

<?php 
  $sq=mysqli_query($conexion,"SELECT id_ins,Nombre FROM instructor WHERE Ins_vu='1'");
  while($sqa=mysqli_fetch_array($sq)){

   ?>
  <option value="<?php echo $sqa[0] ?>"><?php echo $sqa[1] ?></option> 

<?php 
}
 ?>


</select>
<p id="hide" style="display: none"></p>
  </div>
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Alumno:</b></label>
<div id="op_alu"></div>
  </div>
  </div>
  <br><br>
  <button class="w3-btn w3-green w3-right w3-padding-right" id="enviar">Enviar solicitud</button> 

  <br><br>
    </div>
    </div>
</div>
<!-- ====================== -->

 <div id="id03" class="w3-modal" >
   <div class="w3-modal-content w3-card-4">
      <header class="w3-container" style="background-color: #00C291"> 
        <button class="w3-button w3-right" onclick="document.getElementById('id03').style.display = 'none';">X</button>
        <h2 id="semana" data-semana=<?php echo $sql_sem[0] ?>>Detalles de solicitud de vuelo (Semana <?php echo $sql_sem[0] ?>) Fecha:<span id="date1"></span></h2>
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
  <button class="w3-btn w3-right " style="background-color: #00C291;margin-left:5px; " id="change_btn"><i class="fas fa-check"></i></button> 
  <button class="w3-btn w3-right w3-red" id="delete_btn"><i class="fas fa-trash"></i></button> 


  <br><br>
    </div>
    </div>
</div>

<!-- ===================================================================================MODAAAAL -->

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">



$("#option").change(function(){

  var id = $(this).val();
  recargar_lista(id);
})

function recargar_lista(id){
         $.ajax({
       url:"fun/progra/change_lista.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
        $("#op_alu").html(data);

      }
     })
}





	  function exito(){
    $.alert({
    title: 'Recopilando información',
    content: 'Cargando...',
    theme: 'modern',
    type:'blue',
    icon: 'fas fa-spinner fa-spin',
    autoClose: 'Ok|1000',
    buttons: {
        Ok: function () {
        }
    }

});
  }


    function help(){
    $.alert({
    title: 'Información importante',
    content: 'Este es tu plan de vuelo de la próxima semana. Da click en los espacios vacíos, elige el alumno con el que volaras y espera tu aprobación. (Las horas aprobadas se muestran de verde)',
    // theme: 'modern',
    type:'blue',
    icon: 'fas fa-info-circle',
    buttons: {
        Entendido: {
          text:'Buen vuelo ;)',
          btnClass: 'btn-blue',
        }
    }
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
      function envio(){
    $.alert({
    title: '¡Solicitud enviada!',
    content: 'Solicitud aceptada automáticamente ;)',
    scrollToPreviousElementAnimate: 'false',
    scrollToPreviousElement: 'false',
    theme: 'modern',
    type:'green',
    icon: 'far fa-paper-plane',


});
  }

        function update_role(){
    $.alert({
    title: '¡Solicitud Aceptada!',
    content: 'Se notificara al alumno e instructor',
    scrollToPreviousElementAnimate: 'false',
    scrollToPreviousElement: 'false',
    theme: 'modern',
    type:'green',
    icon: 'far fa-paper-plane',


});
  }

        function envio2(){
    $.dialog({
    title: '¡Solicitud enviada!',
    content: ' Atención: Existe otra solicitud pendiente para este día y hora. Espera a ser notificado sobre la aprobacion o comuniquese con el programador',
    theme: 'modern',
    type:'orange',
    icon: 'far fa-paper-plane',


});
  }

    function delete_(){
    $.dialog({
    title: 'Solicitud eliminada',
    content:'Nota: Se le notificara al instructor el rechazo de su solicitud',
    theme: 'modern',
    type:'red',
    icon: 'fas fa-trash',


});
  }

      function sin_saldo(){
    $.alert({
    title: '¡Atención!',
    content: 'Saldo insuficiente para reservar hora de vuelo. Comuniquese con el administrador',
    theme: 'modern',
    type:'red',
    icon: 'fas fa-money-bill-alt',
});
  }
    function actu(){
    $.dialog({
    title: 'Solicitud actualizada correctamente',
    content:'Nota: el instructor puede editar la solicitud',
    theme: 'modern',
    type:'green',
    icon: 'fas fa-check',


});
  }
	   	var a =0;
	   //setInterval(
      function obtener(){
     $.ajax({
       url:"fun/progra/tabla_add.php",
              method: "POST", 
       success: function(data){
         $("#tb").html(data)
         a=a+1;
         // console.log(a);
 

      }
     })
   }
 //},1000)
obtener();
 $(document).ready( function () {
 	exito();


  $(document).on("click","#vacio", function(){
   var hora = $(this).data("hora");
   var day = $(this).data("day");
   var plane = $(this).data("plane");
   var date = $(this).data("date");
   var hora_id = $(this).data("h");
   var dia_id = $(this).data("d");
// ======================
if (dia_id % 1 ==0) {
   $('#hide').data('dia_',dia_id);
}else{
  dia_id=dia_id-0.5;
  $('#hide').data('dia_',dia_id);
}
   $('#hide').data('hora_',hora_id);

// // =============================
   $('#id01').css("display", "block");
   $("#ae").val(plane);
   $("#di").val(hora);
   $("#in").val(day);
   $("#date").text(date);

})


 $(document).on("click",".lleno", function(){
  var check =$(this).data("check");
  var id =$(this).data("id");

  $("#do_hide").text(id);

  if (check=='0') {
   $('#id03').css("display", "block");
   var hora = $(this).data("hora");
   var day = $(this).data("day");
   var ins = $(this).data("ins");
   var plane = $(this).data("plane");
   var date = $(this).data("date");
   var hora_id = $(this).data("h");
   var dia_id = $(this).data("d");
   var aluu = $(this).data("alu");

// ======================
if (dia_id % 1 ==0) {
   $('#hide1').data('dia_',dia_id);
}else{
  dia_id=dia_id-0.5;
  $('#hide1').data('dia_',dia_id);
}
   $('#hide1').data('hora_',hora_id);

// // =============================
   $('#id03').css("display", "block");
   $("#ae1").val(plane);
   $("#di1").val(hora);
   $("#in1").val(day);
   $("#ins1").val(ins);
   $("#aluu").val(aluu);
   $("#date1").text(date);
  }
  if (check=='1') {
   $('#id02').css("display", "block");
  $("#edit_hide").text(id);

  }

});

 $(document).on("click",".confirmado", function(){
  var id =$(this).data("id");
  window.location.href = "fun/progra/select.php?id="+id;
});



 $(document).on("click","#delete", function(){
  var id =$("#edit_hide").text();
       $.ajax({
       url:"fun/progra/delete_add.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
   $('#id02').css("display", "none");
   delete_();

      }
     })
});

 $(document).on("click","#delete_btn", function(){
  var id =$("#do_hide").text();
       $.ajax({
       url:"fun/progra/delete_add.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
   $('#id03').css("display", "none");
   delete_();

      }
     })
});


 $(document).on("click","#btn_actu", function(){
  var id =$("#edit_hide").text();

       $.ajax({
       url:"fun/progra/update_add.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
   $('#id02').css("display", "none");
   actu();

      }
     })
});

  $(document).on("click","#change_btn", function(){
    var id = $("#do_hide").text();

     $.ajax({
       url:"fun/progra/update_role.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
            document.getElementById('id03').style.display = 'none';
        update_role();
    }
     })


})



  $(document).on("click","#enviar", function(){
    var ae = $("#ae").val();
    var hora = $("#hide").data("hora_");
    var dia = $("#hide").data("dia_");
    var semana = $("#semana").data("semana");

    var inn = $("#in").val();
    var ins = $("#option").val();
    var option = $("#alu_alu").val();
    var date =$("#date").text();


     $.ajax({
       url:"fun/progra/insertar_h.php",
              method: "POST", 
              data:{plane:ae,dia:dia,hora:hora,alu:option,ins:ins,semana:semana,date:date},
       success: function(data){
        console.log(data);
        if (data=="1") {
            document.getElementById('id01').style.display = 'none';
            // $('input[type="text"]').val('');
            envio();
          }else if(data=="2"){
            document.getElementById('id01').style.display = 'none';
            // $('input[type="text"]').val('');
            envio2();
          } else if(data=="3"){
           sin_saldo();

          }
          else {
            alerta();
          }
    }
     })


})

} );
</script>

<script src="../dist/jquery-confirm.min.js"></script>
</body>
</html>
<?php 
}else{
  header("location:../destroy.php");
}

 ?>
