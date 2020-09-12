<?php 
include("../../../conexion.php");
$hoy=date("d-m-Y");

$id = $_POST['id'];
$saldo =$_POST['send'];
$op = $_POST['op'];
$text = $_POST['text'];


$q=mysqli_fetch_array(mysqli_query($conexion,"SELECT Saldo,id_user FROM alumno WHERE id_alumno='$id'"));
mysqli_query($conexion,"UPDATE alumno SET Saldo='$saldo' WHERE id_alumno='$id' " );

if ($op==1) {
	$num=$saldo-$q[0];
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$q[1]','$q[0]','$num','$saldo','$hoy','Deposito','$text') ");
}

if ($op==2) {
	$num=$saldo-$q[0];
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$q[1]','$q[0]','$num','$saldo','$hoy','$text','-') ");
}

if ($op==3) {
	$num=$saldo;
mysqli_query($conexion,"INSERT INTO cobros(id_user,actual,num,new,date_,razon,banc_r) VALUES('$q[1]','$q[0]','$num','$saldo','$hoy','Reemplazo','-') ");
}




echo mysqli_error($conexion);


 ?>
