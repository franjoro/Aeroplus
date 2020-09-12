<?php 
require '../../conexion.php' ;
$i = $_POST['i'];
$id = $_POST['id'];



mysqli_query($conexion,"UPDATE disc SET Role='$i' WHERE id='$id'   ")
 ?>