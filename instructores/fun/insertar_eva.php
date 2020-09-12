<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">

function yeih(){
$.alert({
title: '¡Gracias!',
content: 'Información ingresada',
theme: 'modern',
type:'green',
  icon: 'fas fa-grin-wink',
buttons: {
confirm: function () {
  window.location.href = '../eva.php';
}
},
});
}
function mal(){
$.alert({
title: 'Algo salio mal!',
content: '¡Revisa la información por favor',
theme: 'modern',
type:'orange',
icon: 'far fa-frown-open',
buttons: {
confirm: function () {
window.location.href = '../eva.php';
}
},
});
}
</script>
<?php
include("../../conexion.php");
$id =$_POST['id'];
$t1 =$_POST['t1'];
$t2 =$_POST['t2'];
$h1 =$_POST['h1'];
$h2 =$_POST['h2'];
$big =$_POST['big'];
if ($t1>=$t2) {
echo " <script type='text/javascript'>
mal();
</script>";
}else{
$carpeta1="archivo/";
opendir($carpeta1);
$destino1 = $carpeta1 . $_FILES['file']['name'];
@copy($_FILES['file']['tmp_name'], $destino1);
$sql=mysqli_query($conexion,"UPDATE evah SET taco_salida='$t1', taco_llegada='$t2', hub_salida='$h1', hub_llegada='$h2', nota='$big', archivo='$destino1' WHERE id='$id' " );



$x=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_hora FROM evah WHERE id='$id' "));
$pl=mysqli_fetch_array(mysqli_query($conexion,"SELECT idPlane,Id_ins FROM horas WHERE id='$x[0]' "));
$pl1=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM plane WHERE id='$pl[0]' "));


$plane=$pl[0]; 
$mes=date("m");


mysqli_query($conexion,"UPDATE plane SET t_actual='$t2' WHERE id='$plane' ");
mysqli_query($conexion,"INSERT INTO planilla(id_ins,razon,money_,mes,id_hora) VALUES('$pl[1]','Pago por hora de vuelo','$pl1[2]','$mes','$x[0]') ");

// echo mysqli_error($conexion);

echo $x[0];
echo " <script type='text/javascript'>
  yeih();
</script>";
}
?>