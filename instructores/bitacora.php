<?php 
session_start();
include('../conexion.php');
$id=$_SESSION['user'];
$id1=$_GET['id'];

  $sql= mysqli_query($conexion,"SELECT * FROM instructor WHERE id_user='$id' ");
  $sqll=mysqli_fetch_array($sql);

if (isset($_SESSION['session_id']) &&  $_SESSION['session_id']=='1' && $id1==$sqll[0] ) {

  $se= mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='1' ");
  $sem=mysqli_fetch_array($se);
  $semana =$sem[0];
  if ($sqll[5]=='1') {
  $text="Piloto Privado";
}elseif($sqll[5]=='2'){
  $text="Habilitción Instrumentos";
}elseif($sqll[5]=='3'){
  $text="Piloto. Comercial";
}elseif($sqll[5]=='4'){
  $text="Habilitción Bimotor";
}elseif($sqll[5]=='5'){
  $text="Piloto Instructor";
}
 ?>
<!DOCTYPE html>
<html>
<title>Bitacora de horas</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<style>
html, body, h1, h2, h3, h4, h5 {font-family: 'Roboto', sans-serif;}
a:link 
{ 
text-decoration:none; 
} 
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top" >
 <div class="w3-bar w3-left-align w3-large" style="background-color: #355C7D">

 <a href="index.php"><span class="w3-bar-item w3-button w3-padding-large  w3-text-white"><i class="fas fa-arrow-left"></i></span></a>
 <span class="w3-bar-item w3-button w3-padding-large w3-text-white">Semana actual: <?php echo $semana ?> </span>

 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
</div>

<!-- Page Container -->
<div class="w3-container " style="margin-top:80px">    

<div class="w3-row-padding">
  <div class="w3-col s9" >
    <div class="w3-container w3-responsive w3-card w3-white w3-round w3-padding">
      <h4>Bitacora de vuelo:</h4>
        <table class="w3-table-all" id="tabla">
    <thead>
    <tr>
      <th>Aeronave</th>
      <th>Fecha</th>
      <th>Instructor</th>
      <th>Evaluación</th>
    </tr>
</thead>
<tbody>
<?php 
$a=mysqli_query($conexion,"SELECT * FROM horas WHERE id_ins='$id1' AND Role='3' ");
$num =mysqli_num_rows($a);
while($e=mysqli_fetch_array($a)) {
  $pl=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$e[1]'"));
  $in=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$e[6]'"));
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
      <td><?php echo $btn ?></td>
    </tr>
 <?php    
}
 ?>

</tbody>
  </table>
    </div>
  </div>
  <div class="w3-col s3" >
    <div class="w3-container w3-card w3-white w3-round">
      <h3>Información de instructor:</h3>
      <p><strong>Nombre: </strong><?php echo $sqll[2] ?></p>
      <h5><strong>Total horas: </strong><?php echo $num ?>hrs</h5>
    </div>
  </div>
</div>


</div>
<!-- ======================== -->

  <div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-text-white" style="background-color: #355C7D"> 
        <span onclick="document.getElementById('id04').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <span id="hide_nota" style="display: none"></span>
        <h2>Detalles (Hora de vuelo)</h2>
      </header>
      <div class="w3-container w3-padding">
        <div id="detalles_bi"></div>   
      </div>
    </div>
  </div>

<!-- ======================== -->

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tabla').DataTable();
} );


   function obtener_notas(id){
     $.ajax({
       url:"fun/detalles_bi.php",
       method: "POST", 
       data:{id:id},
       success: function(data){
         $("#detalles_bi").html(data)
         document.getElementById('id04').style.display='block'
      }
     })
 }


// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}



</script>

</body>
</html> 

<?php 
}else{
  header("location:../destroy.php");
}

 ?>
