<?php 
include("../../../conexion.php");
$user =$_POST["user"];
$name =$_POST["name"];
$email =$_POST["email"];
$tel =$_POST["tel"];
$vu =$_POST["vu"];
$pr =$_POST["pr"];
$en =$_POST["en"];
$teo =$_POST["teo"];

$mdd5 =md5($user);

$chec=mysqli_query($conexion,"SELECT COUNT(id_user) FROM user WHERE Username='$user'");
$check=mysqli_fetch_array($chec);

if ($check[0]=='0') {
$aa = mysqli_query($conexion,"INSERT INTO user(Username,Password,Role,Entry) VALUES('$user','$mdd5','1','1')");
$chec=mysqli_query($conexion,"SELECT id_user FROM user WHERE Username='$user'");
$check=mysqli_fetch_array($chec);


$bb = mysqli_query($conexion,"INSERT INTO instructor(id_user,Nombre,Email,Tel,Ins_te,Ins_vu,Ins_pro,Ins_En) VALUES('$check[0]','$name','$email','$tel','$teo','$vu','$pr','$en')");


if ($aa && $bb) {
	echo "Si";
}else{
	echo "No";
}


}else{
echo "No";
}
 ?>

