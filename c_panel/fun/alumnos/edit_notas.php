<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$nota1 =$_POST['nota1'];
$nota2 =$_POST['nota2'];

if ($nota2!="") {
mysqli_query($conexion,"UPDATE notas SET nota='$nota1', repo='$nota2' WHERE id='$id' " );

} else {
mysqli_query($conexion,"UPDATE notas SET nota='$nota1' WHERE id='$id' " );
}




echo mysqli_error($conexion);


 ?>
