<?php 

include("../../conexion.php");
$ma = $_POST['plane'];
$pp=mysqli_query($conexion,"SELECT id FROM plane WHERE Matricula='$ma'");
$p=mysqli_fetch_array($pp);
$hoy=date("d-m-Y");

$name = $_POST['dia'];
$color = $_POST['hora'];
$alu = $_POST['alu'];
$ins = $_POST['ins'];
$semana = $_POST['semana'];
$date = $_POST['date'];
$back='1';

$ss=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM horas WHERE idPlane='$p[0]' AND Semana='$semana' AND Day='$name' AND Hora='$color'"));

if ($ss[0]>0) {
	$back='2';
}
$saldo_hora=mysqli_fetch_array(mysqli_query($conexion,"SELECT Saldo,cobro,id_user FROM alumno WHERE id_alumno='$alu' "));
$cobro=$saldo_hora[1];
$saldo=$saldo_hora[0];
if ($saldo>=$cobro) {


// ============================================================CHECK SALDO - RESERVAR 


// ======================================= check

$ss=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM horas WHERE idPlane='$p[0]' AND Semana='$semana' AND Day='$name' AND Hora='$color'"));

if ($ss[0]>0) {
	$back='2';
}
// ======================================= check





$sql = mysqli_query($conexion,"INSERT INTO horas(idPlane,Semana,Day,Hora,id_alumno,Id_ins,Role,date_) VALUES('$p[0]','$semana','$name','$color','$alu','$ins','0','$date')");


// ======================================= SALDO FLOTANTE
$nuevo_saldo=$saldo-$cobro;
mysqli_query($conexion,"UPDATE alumno SET Saldo='$nuevo_saldo' WHERE id_alumno='$alu'");
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$saldo_hora[2]','$saldo','$cobro','$nuevo_saldo','$hoy','Reserva hora de vuelo','-')  ");
// ======================================= /SALDO FLOTANTE
echo mysqli_error($conexion);
if ($sql) {
	echo $back;
}
}else{
	$back='3';
	echo $back;

}

 ?>
