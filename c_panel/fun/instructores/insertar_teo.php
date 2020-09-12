<?php 
include("../../../conexion.php");
$op =$_POST["op"];
$id =$_POST["id"];

$sql=mysqli_query($conexion,"INSERT INTO union_(With_,Who_,Role) VALUES('$op','$id','1') ")


?>
