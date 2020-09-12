<?php 
include("../../conexion.php");
$id =$_POST['id'];
$t1 =$_POST['t1'];
$t2 =$_POST['t2'];
$t3 =$_POST['t3'];


$sql=mysqli_query($conexion,"UPDATE plane SET t_25='$t1',t_50='$t2',t_100='$t3'   WHERE id='$id'   " );
echo mysqli_error($conexion);
//  ?>