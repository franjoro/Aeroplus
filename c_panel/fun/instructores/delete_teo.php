<?php 
include("../../../conexion.php");
$ins =$_POST["ins"];
$alu =$_POST["alu"];
$role =$_POST['role'];
$sql=mysqli_query($conexion,"DELETE FROM union_ WHERE With_='$alu' AND Who_ ='$ins' AND Role='$role' ")


?>
