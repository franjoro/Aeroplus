<?php 
session_start();
require("../conexion.php");

$id=$_SESSION['user'];
if (isset($_SESSION['session_id']) && $_SESSION['session_id']=='2') {

$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_user='$id' "))
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
    <h1 class="w3-xxxlarge"><b>Mis notas de teoría</b></h1>
    <h6><span class="w3-tag">Alumno: <span id="id_ins"><?php echo $a[0] ?></span></span></h6>
  </header>
<div class="w3-container">
<center>
  
<div id="first">
  <table class="w3-table-all w3-hoverable" style="width: 50%" >
    <thead>
      <th>Licencia:</th>
      <th>Ver:</th>
    </thead>
    <tbody>
      <tr>
        <td>P. Privada</td>
        <td><button class="w3-button w3-green" onclick="obtener1(<?php echo $id ?>,1)">Ver</button></td>
      </tr>
            <tr>
        <td>H. Instrumentos</td>
        <td><button class="w3-button w3-green" onclick="obtener1(<?php echo $id ?>,2)">Ver</button></td>
      </tr>
            <tr>
        <td>P. Comercial</td>
        <td><button class="w3-button w3-green" onclick="obtener1(<?php echo $id ?>,3)">Ver</button></td>
      </tr>
            <tr>
        <td>H. Bimotor</td>
        <td><button class="w3-button w3-green" onclick="obtener1(<?php echo $id ?>,4)">Ver</button></td>
      </tr>
            <tr>
        <td>P. Instructor</td>
        <td><button class="w3-button w3-green" onclick="obtener1(<?php echo $id ?>,5)">Ver</button></td>
      </tr>
    </tbody>
  </table>
  </div>
<div id='tabla_ingreso' style="display:none; width: 70%"></div>
</center>
</div>
<br><br><br>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">


function obtener1(id,li){
  document.getElementById('tabla_ingreso').style.display='block'
  document.getElementById('first').style.display='none'

     $.ajax({
       url:"fun/tabla_ingreso.php",
       data:{id:id,li:li},
       method: "POST", 
       success: function(data){
         $("#tabla_ingreso").html(data)
      }
     })
 }
 $(document).ready( function () {
  //obtener1(<?php //echo $id ?>);
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
