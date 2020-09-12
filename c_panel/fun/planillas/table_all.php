<?php 
require "../../../conexion.php";
 ?>
 <table class="w3-table-all" id="allt">
 	<thead>
 		<th>Instructor</th>
 		<th>Licencia</th>
 		<th>Ver planilla</th>
 	</thead>
 	<tbody>
 		<?php 
 			$a=mysqli_query($conexion,"SELECT id_ins,Nombre,id_user FROM instructor");
 			while($sql=mysqli_fetch_array($a)){
 			$li=mysqli_fetch_array(mysqli_query($conexion,"SELECT Username FROM user WHERE id_user='$sql[2]'"));
 		 ?>
 		 <tr>
 		 	<td><?php echo $sql[1] ?></td>
 		 	<td><?php echo $li[0] ?></td>
 		 	<td><button class="w3-button w3-green" data-id='<?php echo $sql[0] ?>' id="selec"><i class="fas fa-file-invoice-dollar"></i></button></td>
 		 </tr>
 		<?php } ?>
 	</tbody>
 </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#allt').DataTable();
} );
</script>