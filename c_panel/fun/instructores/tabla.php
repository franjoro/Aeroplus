<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla">
        <thead>
          <th>Licencia</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Editar</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM instructor");
  while($sqll=mysqli_fetch_array($sql)){

$chec=mysqli_query($conexion,"SELECT Username FROM user WHERE id_user='$sqll[1]'");
$check=mysqli_fetch_array($chec);
?>
          <tr>
<td><?php echo $check[0] ?></td>
<td><?php echo $sqll[2] ?></td>
<td><?php echo $sqll[3] ?></td>
<td><?php echo $sqll[4] ?></td>
<td><button id="edit_ins" class="w3-button" 
data-id='<?php echo $sqll[0] ?>' 
data-name='<?php echo $sqll[2] ?>' 
data-email='<?php echo $sqll[3] ?>' 
data-tel='<?php echo $sqll[4] ?>' 
data-teo='<?php echo $sqll[5] ?>' 
data-vu='<?php echo $sqll[6] ?>' 
data-pro='<?php echo $sqll[7] ?>' 
data-en='<?php echo $sqll[8] ?>' 

  ><i class="fas fa-edit"></i></button></td>


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