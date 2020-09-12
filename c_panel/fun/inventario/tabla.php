<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla1">
        <thead>
          <th>Imagen:</th>
          <th>Nombre:</th>
          <th>Descripción:</th>
          <th>Cantidad:</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM inventario");
  while($sqll=mysqli_fetch_array($sql)){
?>
          <tr>
<td><img style="width: 100px; " src="fun/inventario/<?php echo $sqll[3] ?>"></td>
<td><?php echo $sqll[1] ?></td>
<td><?php echo $sqll[4] ?></td>
<td><?php echo $sqll[2] ?></td>
          </tr>

<?php
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla1').DataTable();
} );
</script>