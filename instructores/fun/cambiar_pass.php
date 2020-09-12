<?php 
session_start();
require_once('../../conexion.php');

echo $_POST['p'];
$id= $_SESSION['user'];


$pass=md5($_POST['p']);


mysqli_query($conexion,"UPDATE user SET Password='$pass' WHERE id_user='$id'");


 ?>