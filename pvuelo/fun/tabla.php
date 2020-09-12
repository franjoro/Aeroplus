	<table class="w3-table w3-centered w3-striped w3-hoverable " border="1" >

<thead>
	 <tr>
		<td rowspan="2"></th>
		<th rowspan="2">Aeronaves</th>
		<th colspan="2" >Lunes</th>
		<th colspan="2">Martes</th>
		<th colspan="2">Miercoles</th>
		<th colspan="2">Jueves</th>
		<th colspan="2">Viernes</th>
		<th colspan="2">Sabado</th>
	 </tr>
	 <tr>
		<td>Alumno</td>
		<td>Instructor</td>
		<td>Alumno</td>
		<td>Instructor</td>
		<td>Alumno</td>
		<td>Instructor</td>
		<td>Alumno</td>
		<td>Instructor</td>
		<td>Alumno</td>
		<td>Instructor</td>
		<td>Alumno</td>
		<td>Instructor</td>
	 </tr>
	 </thead><?php 
include("../../conexion.php");

$c=mysqli_query($conexion,"SELECT COUNT(*) FROM plane");
$count=mysqli_fetch_array($c);

function aeronave($hora){
	include("../../conexion.php");
	$se=mysqli_fetch_array(mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='2'"));
	$semana=$se[0];
	$sql=mysqli_query($conexion,"SELECT * FROM plane");
	while($row=mysqli_fetch_array($sql)) { 
	  ?>	
	  	<tr>
	  	<td style="color:<?php echo $row[3] ?>;"><?php echo $row[1] ?></td>
	  	
<?php 
	$ii=0.5;
	$bandera=true;
	for ($i=0; $i < 12; $i++) { 
	$ii=$ii+0.5;
	  $h =mysqli_query($conexion,"SELECT * FROM horas WHERE idPlane='$row[0]' AND Hora='$hora' AND Semana='$semana' AND Day='$ii' AND Role='1'");
	  $ho=mysqli_fetch_array($h);

	  $n=mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$ho[5]'");
	  $na=mysqli_fetch_array($n);
	  $ni=mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$ho[6]'");
	  $nai=mysqli_fetch_array($ni);

	$num=mysqli_num_rows($h);
		if ($num>0) {
		 	echo "<td style='background-color:#00C291;'>".utf8_encode($na[0])."</td>";
		 	echo "<td style='background-color:#00C291;'>".utf8_encode($nai[0])	."</td>";	 	
		 	 $ii=$ii+0.5;	
		 	 $i=$i+1;
		 } 
		else{
			echo "<td></td>";
		}
	}

	  }
}
 ?>
	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">6:00 a.m. a 7:45 a.m.</td>
	</tr>

	   <?php 
		 aeronave(1);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">7:30 a.m. a 8:45 a.m.</td>
	</tr>
	   <?php 
		 aeronave(2);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">8:45 a.m. a 10:00 a.m.</td>
	</tr>
	   <?php 
		aeronave(3);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">10:00 a.m. a 11:15 a.m.</td>
	</tr>
	   <?php 
		aeronave(4);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">11:15 a.m. a 12:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(5);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">12:30 p.m. a 1:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(6);
	   ?>
	  
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">2:00 p.m. a 3:15 p.m.</td>
	</tr>
	   <?php 
		aeronave(7);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">3:15 p.m. a 4:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(8);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">4:30 p.m. a 5:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(9);
	   ?>
	</tr>
		<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">5:30 p.m. a 6:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(10);
	   ?>
	</tr>
