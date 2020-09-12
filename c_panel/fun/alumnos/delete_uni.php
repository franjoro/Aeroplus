<?php 
include("../../../conexion.php");
$id =$_POST["id"];

$sql=mysqli_query($conexion,"DELETE FROM uni WHERE id='$id' ")


?>
