<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$name =$_POST['name'];
$des =$_POST['des'];
$lic =$_POST['lic'];

mysqli_query($conexion,"UPDATE uni SET Name='$name', Des='$des', Lic='$lic' WHERE id='$id' " );



 ?>
