<?php 
require "../../conexion.php";
$id =$_POST['id'];

$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_alumno FROM horas WHERE id='$id' "));
$sql=mysqli_query($conexion,"DELETE FROM horas WHERE id='$id'") ;

$query=mysqli_fetch_array(mysqli_query($conexion,"SELECT cobro,Saldo,id_user FROM alumno WHERE id_alumno='$a[0]' "));
$cobro=$query[0];
$saldo=$query[1];

// ======================================= RETORNO DE SALDO
$nuevo_saldo=$saldo+$cobro;
mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo' WHERE id_alumno='$a[0]'");
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$query[2]','$saldo','$cobro','$nuevo_saldo','$hoy','Retorno de cancelación de vuelo','-')  ");
// ======================================= /RETORNO DE SALDO


 ?>