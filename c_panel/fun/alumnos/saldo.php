<?php 

include("../../../conexion.php");

$id=$_POST['id'];
$sql=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre,Saldo FROM alumno WHERE id_alumno='$id'"));

echo '<h3><strong>Saldo actual:</strong> $ <span id="actual_saldo">'.$sql[1].'</span> <br> <strong>Alumno: </strong><span>'.$sql[0].'</span></h3>
'
 ?>
