<?php 
require "../../../conexion.php";
$id =$_POST['id'];

mysqli_query($conexion,"UPDATE horas SET Role='0' WHERE id='$id' ")
 ?>