<?php 
include("../../../conexion.php");
$user =$_POST["user"];
$name =$_POST["name"];
$email =$_POST["email"];
$tel =$_POST["tel"];
$op =$_POST["op"];

$mdd5 =md5($user);

$chec=mysqli_query($conexion,"SELECT COUNT(id_user) FROM user WHERE Username='$user'");
$check=mysqli_fetch_array($chec);

if ($check[0]=='0') {
$aa = mysqli_query($conexion,"INSERT INTO user(Username,Password,Role,Entry) VALUES('$user','$mdd5','2','1')");
$chec=mysqli_query($conexion,"SELECT id_user FROM user WHERE Username='$user'");
$check=mysqli_fetch_array($chec);


$bb = mysqli_query($conexion,"INSERT INTO alumno(id_user,Nombre,Email,Tel,Role,Saldo,cobro) VALUES('$check[0]','$name','$email','$tel','$op','0','0')");


if ($aa && $bb) {
	echo "Si";
}else{
	echo "No";
}


}else{
echo "No";
}
 ?>

