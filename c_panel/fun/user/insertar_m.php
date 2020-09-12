<?php 
$mensaje = $_POST['mensaje'];
$role=$_POST['role'];


function evaluar($valor) 
{
$id = $_POST['id'];
include("../../../conexion.php");
	$nopermitido = array("'",'\\','<','>',"\"");
	$valor = str_replace($nopermitido, "", $valor);

$sql = mysqli_query($conexion,"INSERT INTO messages(id_user,text_,role) VALUES('$id','$valor','1')");
}




function evaluar1($valor) 
{
include("../../../conexion.php");
	$nopermitido = array("'",'\\','<','>',"\"");
	$valor = str_replace($nopermitido, "", $valor);

$q=mysqli_query($conexion,"SELECT id_user FROM user WHERE Role!=0  AND Role!=3 ");
while ($qq=mysqli_fetch_array($q)) {
	$sql = mysqli_query($conexion,"INSERT INTO messages(id_user,text_,role) VALUES('$qq[0]','$valor','1')");

}

}




if ($role=='1' ) {
evaluar($mensaje);
} else{
evaluar1($mensaje);
}
 ?>
