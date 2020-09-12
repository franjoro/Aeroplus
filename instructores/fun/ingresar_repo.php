<?php 
include("../../conexion.php");
$alu =$_POST['alu'];
$uni =$_POST['uni'];
$nota =$_POST['nota'];

$sql=mysqli_query($conexion,"UPDATE notas SET repo='$nota' WHERE uni='$uni' AND id_user='$alu' " );

 // <!-- ============================= AQUI VAN LOS CORREOS Y ALERTAS -->
$text='"Nueva nota de reposición ingresada"';
$al=mysqli_query($conexion,"INSERT INTO alert(Texto,From_,To_,Role) VALUES('$text','0','$alu',1)");

 ?>