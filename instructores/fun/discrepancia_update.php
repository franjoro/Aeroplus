<?php 
include("../../conexion.php");
$id =$_POST['id'];
$text =$_POST['text'];

$sql=mysqli_query($conexion,"UPDATE disc SET sol='$text',Role='3'   WHERE id='$id'   " );
echo mysqli_error($conexion);
//  ?>