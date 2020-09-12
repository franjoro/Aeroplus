<?php
session_start();
$id=$_SESSION['user'];
    include '../conexion.php'; 

    include 'funciones.php';

    $id  = evaluar($_GET['id']);

    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");


    $row = $bd->fetch_assoc();


    $titulo=$row['title'];

    $evento=$row['body'];

    $inicio=$row['inicio_normal'];

    $final=$row['final_normal'];

if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        header('location:../c_panel/calendario.php');
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 if (isset($_SESSION['session_id']) &&  $_SESSION['session_id']=='1') {

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
 <a href="../instructores/calendario.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-calendar"></i></span></a>
  <a href="../instructores/index.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-home"></i></span></a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
</div>




<div class="w3-container w3-content" style="max-width:1400px; padding:60px; margin-top: 20px;">    

    <div class="w3-modal-content">
      <header class="w3-container"> 
        <h2>Evento: "<?php echo $titulo ?>"</h2>
        <h3>Comienza: <?php echo $inicio ?>   -   Finaliza: <?php echo $final ?></h3>
      </header>
      <div class="w3-container">
        <h3>Descripción:</h3>
        <textarea class="w3-input" disabled="" style="max-width: 100%; height: 200px"><?php echo $evento ?></textarea><br>
      </div>
    </div>

</div>
<br>


<script type="text/javascript">
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
}elseif ($_SESSION['session_id']=='0') {
   ?>

<!-- ============================================CAMBIO============================================= -->



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
 <a href="../c_panel/calendario.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-arrow-left"></i></span></a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
</div>




<div class="w3-container w3-content" style="max-width:1400px; padding:60px; margin-top: 20px;">    

    <div class="w3-modal-content">
      <header class="w3-container"> 
        <h2>Evento: "<?php echo $titulo ?>"</h2>
        <h3>Comienza: <?php echo $inicio ?>   -   Finaliza: <?php echo $final ?></h3>
      </header>
      <div class="w3-container">
        <h3>Descripción:</h3>
        <textarea class="w3-input" disabled="" style="max-width: 100%; height: 200px"><?php echo $evento ?></textarea><br>
      </div>
      <form action="" method="POST">
        <button class="w3-button w3-red" name="eliminar_evento">Eliminar</button>
     </form>
    </div>

</div>
<br>


<script type="text/javascript">
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
}elseif ($_SESSION['session_id']=='2') {
   ?>

<!-- ============================================CAMBIO============================================= -->



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
 <a href="../alumno/calendario.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-arrow-left"></i></span></a>
  <a href="../alumno/index.php"><span class="w3-bar-item w3-button w3-padding-large w3-teal"><i class="fas fa-home"></i></span></a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large">Cerrar sesión</a>
</div>




<div class="w3-container w3-content" style="max-width:1400px; padding:60px; margin-top: 20px;">    

    <div class="w3-modal-content">
      <header class="w3-container"> 
        <h2>Evento: "<?php echo $titulo ?>"</h2>
        <h3>Comienza: <?php echo $inicio ?>   -   Finaliza: <?php echo $final ?></h3>
      </header>
      <div class="w3-container">
        <h3>Descripción:</h3>
        <textarea class="w3-input" disabled="" style="max-width: 100%; height: 200px"><?php echo $evento ?></textarea><br>
      </div>
    </div>

</div>
<br>


<script type="text/javascript">
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
}
else{
  header("location:../destroy.php");
}

 ?>
