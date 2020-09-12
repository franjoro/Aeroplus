	<?php 
include("../../conexion.php");

	 ?>
	<table class="w3-table w3-centered w3-striped w3-hoverable " border="1" >

<thead>
	 <tr>
		<td rowspan="2"></th>
		<th rowspan="2">Aeronaves</th>
		<th colspan="2">Lunes</th>
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

$c=mysqli_query($conexion,"SELECT COUNT(*) FROM plane");
$count=mysqli_fetch_array($c);

function aeronave($hora){
$hoy=date("d-m-Y");

	include("../../conexion.php");
	$se=mysqli_fetch_array(mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='1'"));
	$semana=$se[0];
	$sql=mysqli_query($conexion,"SELECT * FROM plane");
	while($row=mysqli_fetch_array($sql)) { 
	  ?>	
	  	<tr>
	  	<td style="color:<?php echo $row[3] ?>; width: 130px"><?php echo $row[1] ?></td>
	  	
<?php 
	$ii=0.5;
	$bandera=true;
	for ($i=0; $i < 12; $i++) { 
	$ii=$ii+0.5;
	  $h =mysqli_query($conexion,"SELECT * FROM horas WHERE idPlane='$row[0]' AND Hora='$hora' AND Day='$ii' AND Semana='$semana' ");
	  $ho=mysqli_fetch_array($h);
	  $role=$ho[7];
	  $n=mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$ho[5]'");
	  $na=mysqli_fetch_array($n);
	  $ni=mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$ho[6]'");
	  $nai=mysqli_fetch_array($ni);
if ($ii=='1') {
	$tx='Lunes';
}if($ii=='2'){
	$tx='Martes';
}if($ii=='3'){
	$tx='Miércoles';
}if($ii=='4'){
	$tx='Jueves';
}if($ii=='5'){
	$tx='Viernes';
}if($ii=='6'){
	$tx='Sabado';
}

if ($hora=='1') {
	$txx='6:00 a.m. a 7:45 a.m.';
}if($hora=='2'){
	$txx='7:30 a.m. a 8:45 a.m.';
}if($hora=='3'){
	$txx='8:45 a.m. a 10:00 a.m.';
}if($hora=='4'){
	$txx='10:00 a.m. a 11:15 a.m.';
}if($hora=='5'){
	$txx='11:15 a.m. a 12:30 p.m.';
}if($hora=='6'){
	$txx='12:30 p.m. a 1:30 p.m.';
}if($hora=='7'){
	$txx='2:00 p.m. a 3:15 p.m.';
}if($hora=='8'){
	$txx='3:15 p.m. a 4:30 p.m.';
}if($hora=='9'){
	$txx='4:30 p.m. a 5:30 p.m.';
}if($hora=='10'){
	$txx='5:30 p.m. a 6:30 p.m.';
}
	  $p =mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$row[0]' ");
	  $pl=mysqli_fetch_array($p);
	$num=mysqli_num_rows($h);
		if ($num>0) {

		     	if ($role=='1') {
			echo "<td class='lleno' data-h='".$hora."'  data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#949494'>".utf8_encode($na[0])."<strong>(pendiente)</strong></td>";

	        echo "<td class='lleno' data-h='".$hora."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#949494'>".utf8_encode($nai[0])."<strong>(pendiente)</strong></td>";	

			}

				if ($role=='2') {
			echo "<td border='2' onclick='cerrar_vivo(".$ho[0].")' class='vivo' data-h='".$hora."'  data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#80B829'>".utf8_encode($na[0])." <strong>(Vuelo en curso)</strong></td>";

	        echo "<td border='2' onclick='cerrar_vivo(".$ho[0].")' class='vivo' data-h='".$hora."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#80B829'>".utf8_encode($nai[0])." <strong>(Vuelo en curso)</strong></td>";	

			}
				if ($role=='3') {
			echo "<td class='cerrado' data-h='".$hora."'  data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#BFA07A'>".utf8_encode($na[0])." <strong>(Vuelo finalizado)</strong></td>";

	        echo "<td class='cerrado' data-h='".$hora."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#BFA07A'>".utf8_encode($nai[0])." <strong>(Vuelo finalizado)</strong></td>";	

			}
				if ($role=='4') {
			echo "<td class='cancelado' data-h='".$hora."'  data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#FF4A59'>".utf8_encode($na[0])." <strong>(Vuelo cancelado)</strong></td>";

	        echo "<td class='cancelado' data-h='".$hora."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' style='background-color:#FF4A59'>".utf8_encode($nai[0])." <strong>(Vuelo cancelado)</strong></td>";	

			}





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
		<td style="width: 200px" rowspan="<?php echo $count[0]+1 ?>">6:00 a.m. a 7:45 a.m.</td>
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
