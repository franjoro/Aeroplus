<?php 
require "../../conexion.php";
$id =$_POST['id'];
$op =$_POST['op'];

// ===================RETORNO
$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_alumno FROM horas WHERE id='$id'"));
$query=mysqli_fetch_array(mysqli_query($conexion,"SELECT cobro,Saldo,id_user FROM alumno WHERE id_alumno='$a[0]' "));
$cobro=$query[0];
$saldo=$query[1];
$nuevo_saldo=$saldo+$cobro;
mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo' WHERE id_alumno='$a[0]'");
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$query[2]','$saldo','$cobro','$nuevo_saldo','$hoy','Retorno de cancelación de vuelo(Por edición del instructor)','-')  ");
// ===================RETORNO

// UPDATE Y COBRO NEUVO ALUMNO=============



$saldo_hora=mysqli_fetch_array(mysqli_query($conexion,"SELECT Saldo,cobro,id_user FROM alumno WHERE id_alumno='$op' "));
$cobro1=$saldo_hora[1];
$saldo1=$saldo_hora[0];
if ($saldo1>=$cobro1) {
$nuevo_saldo1=$saldo1-$cobro1;
$sql=mysqli_query($conexion,"UPDATE horas SET id_alumno='$op' WHERE id='$id' ") ;
mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo1' WHERE id_alumno='$op'");


mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$saldo_hora[2]','$saldo1','$cobro1','$nuevo_saldo1','$hoy','Reserva hora de vuelo (Por edición del instructor)','-')  ");

}else{
	$back='3';
	echo $back;

}


// UPDATE Y COBRO NEUVO ALUMNO=============

 ?>