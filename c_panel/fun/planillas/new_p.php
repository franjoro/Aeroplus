<?php 
require "../../../conexion.php";
$id=$_POST['id'];
$valor=$_POST['valor'];
$motivo=$_POST['motivo'];
$mes=date("m");

mysqli_query($conexion,"INSERT INTO planilla(id_ins,razon,money_,mes,id_hora) VALUES('$id','$motivo','$valor','$mes','00') ");
 ?>