<?php 
session_start();


 ?>

	 <?php 
include("../../../conexion.php");


$c=mysqli_query($conexion,"SELECT COUNT(*) FROM plane");
$count=mysqli_fetch_array($c);

function aeronave($hora){
	// ====================================== FECHAAAS 

$year=date('Y');
$month=date('n');
$day=date('j');
$day=$day+7;
$semana=date('W')+1;
//$semana=41;
# Obtenemos el día de la semana de la fecha dada
$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
 
# el 0 equivale al domingo...
if($diaSemana==0)
    $diaSemana=7;
 $array = array();
# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
for ($i=1; $i <= 7; $i++) { 
 $primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+$i,$year));
 $array[$i]=$primerDia;
}


$id=$_SESSION['user'];

	include("../../../conexion.php");
$t=mysqli_query($conexion,"SELECT id_ins FROM instructor WHERE id_user='$id' ");
$tt=mysqli_fetch_array($t);

$barra=0;
	$sql=mysqli_query($conexion,"SELECT * FROM plane");
	while($row=mysqli_fetch_array($sql)) { 
$num_aviones=mysqli_num_rows($sql);		
$barra=$barra+1;
if ($barra==$num_aviones) {
	$texto_barra="";
	$barra=0;
}else{
	$texto_barra="";
}



?>	
	  	<tr>
	  	<td style="color:<?php echo $row[3] ?>; "><?php echo $row[1] ?></td>

	  	
<?php 
	$ii=0.5;
	$bandera=true;





	for ($i=0; $i < 12; $i++) { 
	$ii=$ii+0.5;
	

	/*
if (is_float($ii)) {
	$texto_ii="w3-border-right w3-border-blue";
}else{
	$texto_ii="";
}*/


	  $h =mysqli_query($conexion,"SELECT * FROM horas WHERE idPlane='$row[0]' AND Hora='$hora' AND Day='$ii' AND Semana='$semana' ");
	  $ho=mysqli_fetch_array($h);

	  if ($ho[7]=="0") {
	  	// PENDIENTE DE APROBACION
	  	$color= "#FFCB75";
	  	$data="data-check='0'";
	  }else{
	  	// APROBADO
	  	$color="#00C291";
	  	$data="data-check='1'";

	  }

	  $n=mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$ho[5]'");
	  $na=mysqli_fetch_array($n);
	  $ni=mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$ho[6]'");
	  $nai=mysqli_fetch_array($ni);



//ESTABLECER DATOOOS 
	  $p =mysqli_query($conexion,"SELECT Matricula FROM plane WHERE id='$row[0]' ");
	  $pl=mysqli_fetch_array($p);

if ($ii=='1') {
	$tx='Lunes';
	$date =$array[1];
}if($ii=='2'){
	$tx='Martes';
	$date =$array[2];
}if($ii=='3'){
	$tx='Miércoles';
	$date =$array[3];
}if($ii=='4'){
	$tx='Jueves';
	$date =$array[4];
}if($ii=='5'){
	$tx='Viernes';
	$date =$array[5];
}if($ii=='6'){
	$tx='Sabado';
	$date =$array[6];
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



//ESTABLECER DATOOOS  FIN


// <p><span class='w3-badge w3-small w3-green'>9</span></p>

//


	



	$num=mysqli_num_rows($h);
		if ($num=='1') {
		 	echo "<td class='lleno' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' ".$data." style='background-color:".$color.";'>".utf8_encode($na[0])."</td>";
		 	echo "<td class='lleno' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' ".$data." style='background-color:".$color."'>".utf8_encode($nai[0])."</td>";	 	
		 	 $ii=$ii+0.5;	
		 	 $i=$i+1;
		 }




		 elseif($num>='2'  ){
		$qa=mysqli_query($conexion,"SELECT * FROM horas WHERE idPlane='$row[0]' AND Hora='$hora' AND Day='$ii' AND Semana='$semana' AND Role='1' ");	
        $q=mysqli_fetch_array($qa);
        $numq=mysqli_num_rows($qa);


	  $n1=mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_alumno='$q[5]'");
	  $na1=mysqli_fetch_array($n1);
	  $ni1=mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_ins='$q[6]'");
	  $nai1=mysqli_fetch_array($ni1);

		 	
		 if ($ho[7]=='1') {
	 echo "<td class='lleno ".$texto_barra."' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' ".$data." style='background-color:".$color."'>".utf8_encode($na[0])."</td>";

	echo "<td class='lleno ".$texto_barra."' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai[0])."' data-alu='".utf8_encode($na[0])."'  data-id='".$ho[0]."' ".$data." style='background-color:".$color."'>".utf8_encode($nai[0])."</td>";

		 	
		 }

        elseif($numq>0) {
           echo "<td class='lleno ".$texto_barra."' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai1[0])."' data-alu='".utf8_encode($na1[0])."'  data-id='".$q[0]."' data-check='1' style='background-color:#00C291'>".utf8_encode($na1[0])."</td>";
		 	echo "<td class='lleno ".$texto_barra."' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."' data-ins='".utf8_encode($nai1[0])."' data-alu='".utf8_encode($na1[0])."'  data-id='".$q[0]."' data-check='1' style='background-color:#00C291'>".utf8_encode($nai1[0])."</td>";
        }

		 	else{
	 	echo "<td class='confirmado ".$texto_barra."' data-id='".$ho[0]."'  ".$data."  style='background-color:".$color."'> <p><span class='w3-badge w3-small w3-green'>".$num."</span></p></td>";
		 	echo "<td class='confirmado ".$texto_barra."' data-id='".$ho[0]."'  ".$data." style='background-color:".$color."'> <p><span class='w3-badge w3-small w3-green'>".$num."</span></p></td>";	 	
		 	} 
		 	 $ii=$ii+0.5;	
		 	 $i=$i+1;
		 }
		





		else{
			echo "<td id='vacio' style='cursor:pointer;' class=' ".$texto_barra."' data-h='".$hora."' data-date='".$date."' data-d='".$ii."' data-day='".$txx."' data-hora='".$tx."' data-plane='".$pl[0]."'></td>";
		}
	}

	  }
}
 ?>
	<tr>
		<td  rowspan="<?php echo $count[0]+1 ?>" >6:00 a.m. a 7:45 a.m.</td>
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

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">8:45 a.m. a 10:00 a.m.</td>
	</tr>
	   <?php 
		aeronave(3);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">10:00 a.m. a 11:15 a.m.</td>
	</tr>
	   <?php 
		aeronave(4);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">11:15 a.m. a 12:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(5);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">12:30 p.m. a 1:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(6);
	   ?>
	  

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">2:00 p.m. a 3:15 p.m.</td>
	</tr>
	   <?php 
		aeronave(7);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">3:15 p.m. a 4:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(8);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">4:30 p.m. a 5:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(9);
	   ?>

	<tr>
		<td rowspan="<?php echo $count[0]+1 ?>">5:30 p.m. a 6:30 p.m.</td>
	</tr>
	   <?php 
	 aeronave(10);
	   ?>
	</tr>
