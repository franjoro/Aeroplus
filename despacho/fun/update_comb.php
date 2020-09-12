<?php 
include("../../conexion.php");
$mas =$_POST['mas'];
$saldo=mysqli_fetch_array(mysqli_query($conexion,"SELECT total_combustible FROM tcomb WHERE id='1' ")) ;

$hoy=date("d-m-Y-g:i");


mysqli_query($conexion,"INSERT INTO comb1(fecha,actual,new,role) VALUES('$hoy','$saldo[0]','$mas','2') ");
mysqli_query($conexion,"UPDATE tcomb SET total_combustible='$mas' WHERE id='1' ");


echo mysqli_error($conexion);


 ?>
