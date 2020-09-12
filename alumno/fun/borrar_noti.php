<?php 
include("../../conexion.php");
$id =$_POST['id'];

mysqli_query($conexion,"UPDATE alert SET Role='0' WHERE id ='$id' " );


 ?>