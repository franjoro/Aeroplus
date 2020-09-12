<?php 
session_start();
require("../conexion.php");

$id=$_SESSION['user'];
if (isset($_SESSION['session_id']) && $_SESSION['session_id']=='1') {

$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre, id_ins FROM instructor WHERE id_user='$id' "));
$id_ins=$a[1];
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Evaluación de vuelo</title>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>
<body >
<style type="text/css">
	body{
		font-size: 12px;
	}
</style>
<div class="w3-bar w3-black w3-hide-small">
  <a href="index.php" class="w3-bar-item w3-button"><i class="fas fa-arrow-left"></i></a>
</div>
  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Evaluaciones pendientes de vuelo</b></h1>
    <h6><span class="w3-tag">Instructor: <span id="id_ins"><?php echo $a[0] ?></span></span></h6>
  </header>
<div class="w3-container">
<center>
<div id="tabla_aula" class="w3-responsive" style="width: 70%"></div>
</center>
</div>
<br><br><br>



<!-- ======================================MODAL -->
 <div id="id03" class="w3-modal">
   <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-black"> 
        <button class="w3-button w3-right" onclick="document.getElementById('id03').style.display = 'none';">X</button>
        <!-- <span id="do_hide" style="display: none"></span> -->
      </header>
      <div class="w3-container">
        <center><h3>Evaluación de vuelo</h3></center>
  <br>
  <div class="w3-row">
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Aeronave:</b></label>
  <input class="w3-input" type="text" id="ae1" disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Fecha:</b></label>
  <input class="w3-input" type="text" id="date"  disabled>
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Alumno:</b></label>
  <input class="w3-input" type="text" id="alu" disabled>
  </div>
  </div>

  <form enctype="multipart/form-data" action="fun/insertar_eva.php" method="POST">
    <input type="text" name="id" id="do_hide" style="display: none">
  <div class="w3-row">
  <div class="w3-quarter w3-padding">
  <label class="w3-text"><b>Tacometro salida:</b></label>
  <input class="w3-input w3-border validanumericos" type="text" name="t1" required >
  </div>
  <div class="w3-quarter w3-padding">
  <label class="w3-text"><b>Tacometro llegada:</b></label>
  <input class="w3-input w3-border validanumericos" type="text" name="t2"required >
  </div>
  <div class="w3-quarter w3-padding">
  <label class="w3-text"><b>Hub salida:</b></label>
  <input class="w3-input w3-border validanumericos" type="text" name="h1"required >
  </div>
  <div class="w3-quarter w3-padding">
  <label class="w3-text"><b>Hub llegada:</b></label>
  <input class="w3-input w3-border validanumericos" type="text" name="h2" required>
  </div>
  </div>

<div class="w3-row w3-padding">
  <label class="w3-text"><b>Reportes o anormalidades: (opcional)</b></label>
  <textarea class='w3-input w3-border' name="big" style="max-width: 100%; min-width: 100%; height:100px;"></textarea>
</div>

<div class="w3-row w3-padding">
  <label class="w3-text"><b>Foto de briefing (opcional)</b></label><br>
  <input type="file" name="file">

</div>

  <br><br>
  <button class="w3-btn w3-right " type="submit" style="background-color: #00C291;margin-left:5px; "><i class="fas fa-check"></i></button> 
  </form>
<br>

  <br><br>
    </div>
    </div>
</div>

<!-- ======================================MODAL -->


<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
					$(function(){
					$('.validanumericos').keypress(function(e) {
					if(isNaN(this.value + String.fromCharCode(e.charCode)))
					return false;
					})
					.on("cut copy paste",function(e){
					e.preventDefault();
					});
					});


   $(document).on("click", "#btn_select",function(){
   var id = $(this).data("id");
   var alu = $(this).data("alu");
   var plane = $(this).data("plane");
   var date = $(this).data("date");

   $("#do_hide").val(id);
   $("#ae1").val(plane);
   $("#date").val(date);
   $("#alu").val  (alu);

 document.getElementById('id03').style.display = 'block';

})

//    $(document).on("click", "#change_btn",function(){
//    var id =$("#do_hide").text();
//    var t1 =$("#t1").val();
//    var t2 =$("#t2").val();
//    var h1 =$("#h1").val();
//    var h2 =$("#h2").val();
//    var big =$("#big").val();
//    var file =$("#file").val();


//   $.confirm({
//     title: '¿Ingresar evaluacion?',
//     content: 'Nota: se notificara al alumno',
//     boxWidth: '30%',
//     theme: 'modern',
//     type: 'blue',
//     useBootstrap: false,
//     icon: 'fas fa-plane fa-fw',
//     buttons: {
//         confirm: function () {

//         },
//         cancel: function () {
            
//         },
//     }
// });



// })


function obtener(){
  var id =<?php echo $id_ins ?>;
     $.ajax({
       url:"fun/tabla_eva.php",
       data:{id:id},
       method: "POST", 
       success: function(data){
         $("#tabla_aula").html(data)
      }
     })
 }


 $(document).ready( function () {
  obtener();
} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>
</html>

<?php 
}else{
  header("location:../destroy.php");
}

 ?>
