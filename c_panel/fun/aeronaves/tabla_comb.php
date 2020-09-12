<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");
 $a=mysqli_fetch_array(mysqli_query($conexion,"SELECT total_combustible FROM tcomb WHERE id='1' ORDER BY id DESC "));

 ?>

 <h4>Combustibe actual: <?php echo $a[0] ?> gl</h4>
       <table id="tabla11">
        <thead>
          <th>Fecha</th>
          <th>Actual</th>
          <th>Nuevo combustible</th>
          <th>Operación</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM comb1");
  while($sqll=mysqli_fetch_array($sql)){

    if ($sqll[4]=='1') {
      $text="<span style='color:green'>Deposito</span>";
    } else {
      $text="<span style='color:blue'>Medida</span>";
    }
    
?>
          <tr>
<td><?php echo $sqll[1] ?></td>
<td><?php echo $sqll[2] ?>gl</td>
<td><?php echo $sqll[3] ?>gl</td>
<td><?php echo $text ?></td>


          </tr>

<?php
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla11').DataTable();
} );
</script>