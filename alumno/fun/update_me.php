<?php 
include("../../conexion.php");
$id_m =$_POST['id_m'];
$sql=mysqli_query($conexion,"UPDATE messages SET role='0' WHERE id='$id_m' " );
 ?>