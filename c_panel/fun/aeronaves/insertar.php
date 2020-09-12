<?php 
include("../../../conexion.php");

$ma = $_POST['ma'];
$name ='0';
$color = $_POST['co'];


$check = mysqli_query($conexion,"SELECT COUNT(id) FROM plane WHERE Matricula='$ma'" );
$check2=mysqli_fetch_array($check);

if ($check2[0]>0) {
	echo "No";
}else{
$sql = mysqli_query($conexion,"INSERT INTO plane(Matricula,price,Color) VALUES('$ma','$name','$color')");
if ($sql) {
	echo "Si";
}else{
	echo "No";
}

}
 ?>
