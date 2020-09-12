<?php 
require("../../../conexion.php");

$id=$_GET['id'];
$sql=mysqli_fetch_array(mysqli_query($conexion,"SELECT Semana, Day, Hora,date_,idPlane FROM horas WHERE id='$id' "));
$ii=$sql[1]; 
$hora=$sql[2];

if ($ii=='1') {
	$tx='Lunes';
}if($ii=='2'){
	$tx='Martes';
}if($ii=='3'){
	$tx='Miércoles';
}if($ii=='4'){
	$tx='Jueves';
}if($ii=='5'){
	$tx='Viernes';
}if($ii=='6'){
	$tx='Sabado';
}

if ($hora=='1') {
	$txx='6:00 a.m. a 7:45 a.m.';
}if($hora=='2'){
	$txx='7:30 a.m. a 8:45 a.m.';
}if($hora=='3'){
	$txx='8:45 a.m. a 10:00 a.m.';
}if($hora=='4'){
	$txx='10:00 a.m. a 11:15 a.m.';
}if($hora=='5'){
	$txx='11:15 a.m. a 12:30 p.m.';
}if($hora=='6'){
	$txx='12:30 p.m. a 1:30 p.m.';
}if($hora=='7'){
	$txx='2:00 p.m. a 3:15 p.m.';
}if($hora=='8'){
	$txx='3:15 p.m. a 4:30 p.m.';
}if($hora=='9'){
	$txx='4:30 p.m. a 5:30 p.m.';
}if($hora=='10'){
	$txx='5:30 p.m. a 6:30 p.m.';
}



	$aeronave=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$sql[4]' "))


 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Programa de vuelo</title>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
	table{
		font-size: 12px;
	};
a:link 
{ 
text-decoration:none; 
} 
</style>
<div class="w3-bar w3-black w3-hide-small">
  <a href="../../pvuelo_progra.php" class="w3-bar-item w3-button"><i class="fas fa-arrow-left"></i></a>
</div>
  

<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Autorización de vuelos(misma hora y día)</b></h1>
    <h6><span class="w3-tag">Fecha: <?php echo $sql[3] ?></span></h6>
  </header>

<center>
<div class="w3-container" style="width: 70%;">
	  <div class="w3-row">
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Aeronave:</b></label>
  <input class="w3-input" type="text" id="ae1" disabled value="<?php echo $aeronave[0] ?>">
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Día:</b></label>
  <input class="w3-input" type="text" id="di1"  disabled value="<?php echo $tx ?>">
  </div>
  <div class="w3-third w3-padding">
  <label class="w3-text"><b>Hora:</b></label>
  <input class="w3-input" type="text" id="in1" disabled value="<?php echo $txx ?>">
  </div>
  </div>
  <br>
			<div class="w3-row">

<?php 
$i=1;
$sqq=mysqli_query($conexion,"SELECT * FROM horas WHERE Semana='$sql[0]' AND Day='$sql[1]' AND Hora='$sql[2]' AND idPlane='$sql[4]' AND Role='0' ");
while ($query=mysqli_fetch_array($sqq)) {

$ins=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$query[6]' ")); 
$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre,Role FROM alumno WHERE id_alumno='$query[5]' ")); 

if ($alu[1]=='1') {
  $text="P.Privado";
}elseif($alu[1]=='2'){
  $text="H. Instrumentos";
}elseif($alu[1]=='3'){
  $text="P. Comercial";
}elseif($alu[1]=='4'){
  $text="H. Bimotor";
}elseif($alu[1]=='5'){
  $text="P. Instructor";
}
 ?>




   <div class="w3-content w3-card-4">
      <header class="w3-container" style="background-color: #00C291"> 
        <h2 id="semana">Detalles de solicitud de vuelo <span style="float: right;">#<?php echo $i ?></span></h2>
        <span id="do_hide" style="display: none"></span>
      </header>
      <div class="w3-container">
  <br>

  <div class="w3-row">
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Instuctor:</b></label>
  <input class="w3-input" type="text" id="ins1"  disabled value="<?php echo $ins[0] ?>">
  </div>
  <div class="w3-half w3-padding">
  <label class="w3-text"><b>Alumno:</b></label>
  <input class="w3-input" type="text" id="aluu" disabled value="<?php echo $alu[0] ?> (<?php echo $text ?>) ">

  </div>
  </div>
  <br><br>
  <button class="w3-btn w3-right" onclick="accept(<?php echo $query[0] ?>)" style="background-color: #00C291;margin-left:5px; " id="change_btn"><i class="fas fa-check"></i></button> 


  <br><br>
    </div>
    </div>



<hr>

<?php 
$i=$i+1;
}
 ?>



		</div>
	</div>
</div>
</center>

 </div>
   
</body>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script type="text/javascript">

function accept(id){
     $.ajax({
       url:"update_role.php",
              method: "POST", 
              data:{id:id},
       success: function(data){
    window.location.href = "../../pvuelo_progra.php";       
    }
     })
}
</script>