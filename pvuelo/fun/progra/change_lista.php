<?php
require "../../../conexion.php";
// $id =$_POST['id'];
// $sql=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_user FROM instructor WHERE id_ins='$id'")) ;
// $id=$sql[0];
?>
<select class="w3-select" id="alu_alu">
	<option value="" disabled selected>Choose student</option>
	<?php
	// $sq=mysqli_query($conexion,"SELECT * FROM union_ WHERE Who_='$id'");
	// $sqa=mysqli_fetch_array($sq)
	
	$sqqq=mysqli_query($conexion,"SELECT id_alumno,Nombre FROM alumno");
	while($sqq=mysqli_fetch_array($sqqq)){
	?>
	<option value="<?php echo $sqq[0] ?>"><?php echo $sqq[1] ?></option>
	<?php
	}
	?>
</select>