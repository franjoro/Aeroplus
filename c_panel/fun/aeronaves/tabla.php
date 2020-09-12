<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla">
        <thead>
          <th>Matrícula</th>
          <th>Color:</th>
          <th>Pago a instructor <br>p/h</th>
          <th>Detalles</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM plane");
  while($sqll=mysqli_fetch_array($sql)){
?>
          <tr>
<td style="width: 40%"><?php echo $sqll[1] ?></td>
<td><?php echo $sqll[3] ?><div style="width: 10px; height: 10px; background-color: <?php echo $sqll[3] ?>; float: left;"></div></td>
<td style="width: 10%">$<?php echo $sqll[2] ?></td>
<td><center><button id="edit_pl" class="w3-button" data-id='<?php echo $sqll[0] ?>' data-ma='<?php echo $sqll[1] ?>'  data-pago='<?php echo $sqll[2] ?>' ><i class="fas fa-edit"></i></button></center></td>

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