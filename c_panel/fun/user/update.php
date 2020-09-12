<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$check = mysqli_query($conexion,"SELECT Entry FROM user WHERE id_user='$id'" );
$c=mysqli_fetch_array($check);

if ($c[0]=='1') {
	$x=0;
}else{
	$x=1;
}

mysqli_query($conexion,"UPDATE user SET Entry='$x' WHERE id_user='$id' " );

echo $x;

 ?>
