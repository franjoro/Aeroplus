<?php 
include("../../conexion.php");
$role=$_POST['role'];
$id=$_POST['id'];
$hora=date("H:i");

mysqli_query($conexion,"UPDATE horas SET Role='$role' WHERE id='$id'");

$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM horas WHERE id='$id'"));
$saldo_hora=mysqli_fetch_array(mysqli_query($conexion,"SELECT Saldo,cobro,id_user FROM alumno WHERE id_alumno='$alu[5]' "));
$cobro=$saldo_hora[1];
$saldo=$saldo_hora[0];


if ($role=='2') {
	mysqli_query($conexion,"INSERT INTO evah(hsalida,id_ins,id_alumno,idplane,date_,id_hora) VALUES('$hora','$alu[6]','$alu[5]','$alu[1]','$hoy','$id') ");
} 

if ($role=='3') {
	$evah=mysqli_fetch_array(mysqli_query($conexion,"SELECT id FROM evah WHERE id_hora='$id' "));

	mysqli_query($conexion,"UPDATE evah SET hllegada='$hora' WHERE id='$evah[0]' ");
} 


if (isset($_POST['razon'])) {
	$razon =$_POST['razon'];
	if($razon=='x'){
		$nuevo_saldo=$saldo-90;
		mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo' WHERE id_alumno='$alu[5]'");
		mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon) VALUES('$saldo_hora[2]','$saldo','-90','$nuevo_saldo','$hoy','Multa por ausencia')  ");
		mysqli_query($conexion,"INSERT INTO evah(id_ins,id_alumno,nota,idplane,date_,id_hora) VALUES('$alu[6]','$alu[5]','Ausencia del alumno','$alu[1]','$hoy','$id') ");
	}else{
		$nuevo_saldo=$saldo+$cobro;
		mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo' WHERE id_alumno='$alu[5]'");
		mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon) VALUES('$saldo_hora[2]','$saldo','$cobro','$nuevo_saldo','$hoy','Retorno por cancelación de vuelo')  ");

mysqli_query($conexion,"INSERT INTO evah(id_ins,id_alumno,nota,idplane,date_,id_hora) VALUES('$alu[6]','$alu[5]','$razon','$alu[1]','$hoy','$id') ");
	}
}
echo mysqli_error($conexion);


 ?>