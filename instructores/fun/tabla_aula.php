<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../conexion.php");
$id = $_POST['id'];
 ?>

       <table id="tabla">
        <thead>
          <th>Alumno</th>
          <th>Licencia:</th>
          <!-- <th>Unidad actual</th> -->
          <th>Detalles</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM union_ WHERE Who_='$id' AND Role='2' ");
  while($sqll=mysqli_fetch_array($sql)){
    $name=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre,Role FROM alumno WHERE id_user='$sqll[1]' ")) ;

    if ($name[1]=='1') {
  $text="P.Privado";
}elseif($name[1]=='2'){
  $text="H. Instrumentos";
}elseif($name[1]=='3'){
  $text="P. Comercial";
}elseif($name[1]=='4'){
  $text="H. Bimotor";
}elseif($name[1]=='5'){
  $text="P. Instructor";
}

?>
          <tr>
<td><?php echo $name[0] ?></td>
<td><?php echo $text ?></td>
<!-- <td><center>Unidad 1: Airplane and Aerodynamics</center></td> -->
<td><center><button class="w3-button w3-blue w3-margin-right" onclick="obtener1(<?php echo $sqll[1] ?>);">Ver notas</button></center></td>


          </tr>

<?php
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla').DataTable();
} );


</script>