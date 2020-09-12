<?php 
session_start();
require("../conexion.php");

$id=$_SESSION['user'];
if (isset($_SESSION['session_id']) && $_SESSION['session_id']=='1') {

$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_user='$id' "))
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Calendario</title>
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
    <h1 class="w3-xxxlarge"><b>Notas de teoría</b></h1>
    <h6><span class="w3-tag">Instructor: <span id="id_ins"><?php echo $a[0] ?></span></span></h6>
  </header>
<div class="w3-container">
<center>
<div id="tabla_aula" style="width: 70%"></div>
<div id='tabla_ingreso' style="display:none; width: 70%"></div>
</center>
</div>
<br><br><br>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function  nota(){
  var uni =$("#btn_nota").data("uni");
  var x = "nota"+uni;
  var nota =$("#"+x).val();

  if (nota>10 || nota=='') {

           $.alert({
    title: '¡Alerta!',
    content: 'Algo salio mal',
    theme: 'modern',
    type:'orange',
    icon: 'fas fa-exclamation',
});
  

  }else{
  $.confirm({
    title: '¿Ingresar nota?',
    content: 'Nota:Solo el administrador puede cambiar una nota ya ingresada',
    theme: 'modern',
    type: 'green',
    icon: 'fas fa-book',
    buttons: {
        confirm: function () {
            add_nota();
        },
        cancel: function () {
            
        },
    }
});

}
}

function  nota_repo(){
  var uni =$("#btn_repo").data("uni");
  var x = "repo"+uni;
  var nota =$("#"+x).val();

  if (nota =='' && nota>0 && nota<=10 ) {

           $.alert({
    title: '¡Alerta!',
    content: 'Debes rellenar la nota de esta unidad',
    theme: 'modern',
    type:'orange',
    icon: 'fas fa-exclamation',
});
  

  }else{
  $.confirm({
    title: '¿Ingresar reposición?',
    content: 'Nota:Solo el administrador puede cambiar una reposición ya ingresada',
    theme: 'modern',
    type: 'green',
    icon: 'fas fa-book-medical',
    buttons: {
        confirm: function () {
            add_repo();
        },
        cancel: function () {
            
        },
    }
});

}
}


function add_nota(){
  var alu =$("#btn_nota").data("alu");
  var uni =$("#btn_nota").data("uni");
  var x = "nota"+uni;
  var nota =$("#"+x).val();


     $.ajax({
       url:"fun/ingresar_nota.php",
       data:{alu:alu,uni:uni,nota:nota},
       method: "POST", 
       success: function(data1){
         // $("#tabla_aula").html(data)
      obtener1(alu);
      console.log(data1);
                $.ajax({
                     url:"../mail/notas.php",
                     data:{data1:data1,nota:nota},
                     method: "POST", 
                            success: function(a){
                              console.log(a)
                            }
                   })



      }
     })
}

function add_repo(){
  var alu =$("#btn_repo").data("alu");
  var uni =$("#btn_repo").data("uni");
  var x = "repo"+uni;
  var nota =$("#"+x).val();

     $.ajax({
       url:"fun/ingresar_repo.php",
       data:{alu:alu,uni:uni,nota:nota},
       method: "POST", 
       success: function(data){
         // $("#tabla_aula").html(data)
      obtener1(alu);
         console.log(data);
      
      }
     })
}


function obtener(){
  var id =<?php echo $id ?>;
     $.ajax({
       url:"fun/tabla_aula.php",
       data:{id:id},
       method: "POST", 
       success: function(data){
         $("#tabla_aula").html(data)
      }
     })
 }

function obtener1(id){
  document.getElementById('tabla_aula').style.display='none';
  document.getElementById('tabla_ingreso').style.display='block'
     $.ajax({
       url:"fun/tabla_ingreso.php",
       data:{id:id},
       method: "POST", 
       success: function(data){
         $("#tabla_ingreso").html(data)
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
