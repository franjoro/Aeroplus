<?php 
include("../../../conexion.php");
$name =$_POST["pro"];
$des =$_POST["des1"];
$cant =$_POST["cant"];


$num =rand(1,10000);
$carpeta1="archivo/";
opendir($carpeta1);
$destino1 = $carpeta1 .$num.$_FILES['file']['name'];
copy($_FILES['file']['tmp_name'], $destino1);


mysqli_query($conexion,"INSERT INTO inventario(Nombre,Stock,img,Des) VALUES ('$name','$cant','$destino1','$des') ");
echo mysqli_error($conexion);

header("location:../../inventario.php");
?>