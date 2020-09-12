<?php 
session_start();
include('../conexion.php');
$id=$_SESSION['user'];
if (isset($_SESSION['session_id']) && $_SESSION['session_id']=='1') {

 ?>
<!DOCTYPE html>
<html>
<title>Calendario</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: 'Roboto', sans-serif;}
a:link 
{ 
text-decoration:none; 
} 
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-teal w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
 <a href="../instructores/index.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-arrow-left"></i></span></a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
</div>




<div class="w3-container w3-content" style="max-width:1400px; padding:60px; margin-top: 20px;">    
  <div id="calendario"></div>
</div>
<br>


<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript">
 $(document).ready( function () {
  obtener();
} );

 function obtener(){
     $.ajax({
       url:"../calendario/index.php",
              method: "POST", 
       success: function(data){
         $("#calendario").html(data)
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
