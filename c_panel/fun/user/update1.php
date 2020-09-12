<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$check = mysqli_query($conexion,"SELECT Username FROM user WHERE id_user='$id'" );
$c=mysqli_fetch_array($check);

$pass=md5($c[0]);

mysqli_query($conexion,"UPDATE user SET Password='$pass' WHERE id_user='$id' " );



 ?>
