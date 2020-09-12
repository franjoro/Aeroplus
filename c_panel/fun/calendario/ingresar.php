<?php 
require("../../../conexion.php");
require("funciones.php");

   $inicio = _formatear($_POST['from']);

        $final  = _formatear($_POST['to']);

        $inicio_normal = $_POST['from'];

        $final_normal  = $_POST['to'];

        $titulo = evaluar($_POST['title']);

        $body   = evaluar($_POST['event']);

        // $clase  = "event-info";

        $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        $conexion->query($query); 

        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);


        $link = "$base_url"."descripcion_evento.php?id=$id";

  
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

   
        $conexion->query($query); 

// $i=mysqli_query($conexion,"SELECT id FROM eventos WHERE title='$titulo' AND inicio_normal='$inicio_normal' AND  ")

// ========================================ALERTAS
$que=mysqli_query($conexion,"SELECT * FROM user WHERE Role != 0 ");
    while ($sql=mysqli_fetch_array($que)) {
        $text='Nuevo evento : "'.$titulo.'"';
        $link='calendario/descripcion_evento.php?id='.$id;
        mysqli_query($conexion,"INSERT INTO alert(Texto,From_,To_,Link,Role) VALUES('$text','0','$sql[0]','$link','1') ");
    }
        header("Location:../../calendario.php"); 
 ?>