<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../conexion.php");
$id = $_POST['id'];

 ?>
       <table id="tabla">
        <thead>
          <th>Fecha</th>
          <th>Aeronave</th>
          <th>Alumno</th>
          <th>Hora de salida</th>
          <th>Evaluar:</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM horas WHERE id_ins='$id' AND Role='3' ");
  while($sqll=mysqli_fetch_array($sql)){
    $name=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$sqll[5]' ")) ;
    $plane=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$sqll[1]' ")) ;
    $eva=mysqli_fetch_array(mysqli_query($conexion,"SELECT taco_salida,hsalida,id FROM evah WHERE id_hora='$sqll[0]' ")) ;
echo $sqll[0];
if ($eva[0]=='') {

?>
          <tr>
<td><?php echo $sqll[8] ?></td>
<td><center><?php echo $plane[0] ?></center></td>
<td><center><?php echo $name[0] ?></center></td>
<td><center><?php echo $eva[1] ?></center></td>


<td><center><button  class="w3-button w3-blue w3-margin-right" data-id='<?php echo $eva[2] ?>' data-plane='<?php echo $plane[0] ?>' data-date='<?php echo $sqll[8] ?>' data-alu='<?php echo $name[0] ?>' id="btn_select" >Ver notas</button></center></td>
          </tr>

<?php
}
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla').DataTable();
} );

</script>