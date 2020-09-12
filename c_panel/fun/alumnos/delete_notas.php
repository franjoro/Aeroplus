<?php 
include("../../../conexion.php");
$id =$_POST["id"];
$sql=mysqli_query($conexion,"DELETE FROM notas WHERE id='$id' ");

echo mysqli_error($conexion)

?>
