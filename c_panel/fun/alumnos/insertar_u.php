<?php 
include("../../../conexion.php");
$name =$_POST["name"];
$des =$_POST["des"];
$li =$_POST["li"];



mysqli_query($conexion,"INSERT INTO uni(Name,Des,Lic,archivo) VALUES('$name','$des','$li','-')");



 ?>

