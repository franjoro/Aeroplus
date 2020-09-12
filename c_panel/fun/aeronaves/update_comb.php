<?php 
include("../../../conexion.php");
$saldo =$_POST['saldo'];
$mas =$_POST['mas'];



mysqli_query($conexion,"INSERT INTO comb1(fecha,actual,new,role) VALUES('$hoy','$saldo','$mas','1') ");
mysqli_query($conexion,"UPDATE tcomb SET total_combustible='$mas' WHERE id='1' ");





echo mysqli_error($conexion);


 ?>
