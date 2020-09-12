<?php 
include("../../../conexion.php");

$id = $_POST['id'];
$name =$_POST['name'];
$email =$_POST['email'];
$tel =$_POST['tel'];
$teo =$_POST['teo'];
$vu =$_POST['vu'];
$pro =$_POST['pro'];
$en =$_POST['en'];



mysqli_query($conexion,"UPDATE instructor SET Nombre='$name', Email='$email', Tel='$tel',Ins_te='$teo',Ins_vu='$vu',Ins_pro='$pro',Ins_En='$en'  WHERE id_ins='$id' " );

echo mysqli_error($conexion);


 ?>
