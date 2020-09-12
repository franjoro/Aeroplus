<?php 
require "../../../conexion.php";
$id =$_POST['id'];
$sql=mysqli_query($conexion,"UPDATE horas SET Role='1' WHERE id='$id'") ;


$a=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_alumno, Id_ins,date_ FROM horas WHERE id='$id'"));
$b=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_user FROM alumno WHERE id_alumno='$a[0]'"));
$c=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_user FROM instructor WHERE id_ins='$a[1]'"));

// ========================================= AQUI SE ENVIAN LOS CORREOS Y LAS ALERTAS




// alertas======================
$text='Hora de vuelo confirmada, Fecha del vuelo: '.$a[2];
$from='admin';
$link='pvuelo/pvuelo.php';
// Enviar al alumno
mysqli_query($conexion,"INSERT INTO alert(Texto,From_,To_,Link,Role) VALUES('$text','$from','$b[0]','$link','1')");
// Enviar al instructor
mysqli_query($conexion,"INSERT INTO alert(Texto,From_,To_,Link,Role) VALUES('$text','$from','$c[0]','$link','1')");


// alertas======================
 ?>}
}
