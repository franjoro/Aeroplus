<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$name =$_POST['name'];
$email =$_POST['email'];
$tel =$_POST['tel'];
$lic =$_POST['lic'];
$cobro =$_POST['cobro'];


mysqli_query($conexion,"UPDATE alumno SET Nombre='$name', Email='$email', Tel='$tel', Role='$lic', cobro='$cobro' WHERE id_alumno='$id' " );

echo mysqli_error($conexion);


 ?>
