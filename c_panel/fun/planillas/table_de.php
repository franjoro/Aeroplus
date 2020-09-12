<?php 
require "../../../conexion.php";
$id=$_POST['ins'];
$mes=$_POST['mes'];

 ?>

 <table class="w3-table-all" id="de">
 	<thead>
 		<th>Motivo</th>
 		<th>Aeronave</th>
 		<th>Alumno</th>
 		<th>Fecha</th>
 		<th>Pago</th>
 	</thead>
 	<tbody>
 		<?php 
 		$total=0;
 			$a=mysqli_query($conexion,"SELECT * FROM planilla WHERE id_ins='$id' AND mes='$mes' ");
 			while($sql=mysqli_fetch_array($a)){	

 			$x=mysqli_fetch_array(mysqli_query($conexion,"SELECT idPlane,id_alumno,date_,id_ins FROM horas WHERE id='$sql[5]' "));
 			$ma=mysqli_fetch_array(mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$x[0]' "));
 			$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$x[1]' "));

 			$total=mysqli_fetch_array(mysqli_query($conexion,"SELECT SUM(money_) FROM planilla WHERE id_ins='$id' AND mes='$mes' "));


 		 ?>
 		 <tr>
 		 	<td><?php echo $sql[2] ?></td>
 		 	<td><?php echo $ma[0] ?></td>
 		 	<td><?php echo $alu[0] ?></td>
 		 	<td><?php echo $x[2] ?></td>
 		 	<td>$<?php echo $sql[3] ?></td>
 		 </tr>
 		<?php } ?>
 	</tbody>
 	<tfoot>
 		<th></th>
 		<th></th>
 		<th></th>
 		<th>Total:</th>
 		<th>$<?php echo $total[0] ?></th>

 	</tfoot>
 </table>

 <?php 
 			$ins=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$id' "));
  ?>
				<div id="add" style="display: none">
				<strong><h3>Agregar pago a planilla del mes actual:</h3></strong>
				<button class="w3-right w3-button w3-grey" onclick="$('#add').css('display','none')">Cerrar</button>
				<p><label><b>Instructor:</b></label> <?php echo $ins[0] ?></p>
				<label><b>Mes:</b></label>
				<input type="text" style="width: 25%" class="w3-input" name="mes" value="<?php echo date("m") ?>" disabled>
				<label><b>Valor del pago:</b></label>
				<input type="text" style="width: 25%" class="w3-input validanumericos" id="valor">
				<label><b>Motivo:</b></label>
				<textarea class="w3-input" id="motivo" style="max-width: 100%; min-width: 100%; height: 100px" placeholder="Motivo de pago..."></textarea>
				<br>
				<button class="w3-button w3-right w3-green" id="new_p">Aceptar</button>
				</div>
<script type="text/javascript">

	    $(function(){

  $('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
     return false;
  })
  .on("cut copy paste",function(e){
  e.preventDefault();
  });

});


	$(document).ready( function () {
    $('#de').DataTable();
} );
</script>