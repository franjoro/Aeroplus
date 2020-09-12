<?php 
include("../../../conexion.php");
$id =$_POST['id'];
$num =$_POST['num'];


echo $id;
echo $num;
mysqli_query($conexion,"UPDATE plane SET price='$num' WHERE id='$id' ");
echo mysqli_error($conexion);


 ?>
