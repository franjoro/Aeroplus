<?php 
include("../../conexion.php");
$id =$_POST['id'];
$text =$_POST['text'];

$sql=mysqli_query($conexion,"INSERT INTO disc(idplane,textt,sol,Role) VALUES('$id','$text','','1')" );

echo mysqli_error($conexion);
 ?>