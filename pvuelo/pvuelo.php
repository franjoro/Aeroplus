<?php 
session_start();
require("../conexion.php");
$id=$_SESSION['user'];
if ($_SESSION['session_id']=='1' || $_SESSION['session_id']=='2' ) {

if ($_SESSION['session_id']=='1') {
  $s="instructores";
}else{
  $s='alumno';
}


require("../conexion.php");
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
  <a href="../<?php echo $s ?>/" class="w3-bar-item w3-button"><i class="fas fa-arrow-left"></i></a>
</div>
  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Programa de vuelo confirmado</b></h1>
    <h6><span class="w3-tag">Próxima Semana <?php echo $sql_sem[0] ?></span></h6>
  </header>
<div class="w3-container">

</div>
<div class="w3-container">
	<table class="w3-table w3-centered w3-striped w3-hoverable " border="1" >
	 
	 <tbody id="tb">
	</tbody>
	</table>
</div>



<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
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
	   	var a =0;
	   setInterval(function obtener(){
     $.ajax({
       url:"fun/tabla.php",
              method: "POST", 
       success: function(data){
         $("#tb").html(data)
         a=a+1;
         console.log(a);
 

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
