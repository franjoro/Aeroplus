<?php 
include("../../conexion.php");
$alu =$_POST['alu'];
$uni =$_POST['uni'];
$nota =$_POST['nota'];

$sql=mysqli_query($conexion,"INSERT INTO notas(id_user,nota,uni) VALUES('$alu','$nota','$uni')" );

 // <!-- ============================= AQUI VAN LOS CORREOS Y ALERTAS -->
if ($nota>8.0) {
	$ale="APROBADO";
}else{
	$ale="REPROBADO";

}

$mxe=mysqli_fetch_array(mysqli_query($conexion,"SELECT Email FROM alumno WHERE id_user='$alu'  "));

echo $mxe[0];


$text='"Nueva nota de unidad ingresada." Estado: '.$ale;
$link='alumno/aula.php';
$al=mysqli_query($conexion,"INSERT INTO alert(Texto,From_,To_,Link,Role) VALUES('$text','0','$alu','$link',1)");



// echo mysqli_error($conexion);
 ?>