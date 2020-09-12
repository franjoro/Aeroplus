<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla_notas1">
        <thead>
          <th>Alumno</th>
          <th>Unidad</th>
          <th>Licencia</th>
          <th>Nota</th>
          <th>Reposición</th>
          <th>Editar</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM notas");
  while($sqll=mysqli_fetch_array($sql)){


$alu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_user='$sqll[1]' "));
$uni=mysqli_fetch_array(mysqli_query($conexion,"SELECT Name,Lic FROM uni WHERE id='$sqll[3]' "));


if ($uni[1]=='1') {
  $text="P.Privado";
}elseif($uni[1]=='2'){
  $text="H. Instrumentos";
}elseif($uni[1]=='3'){
  $text="P. Comercial";
}elseif($uni[1]=='4'){
  $text="H. Bimotor";
}elseif($uni[1]=='5'){
  $text="P. Instructor";
}

?>
          <tr>
            <td><?php echo $alu[0] ?></td>
            <td><?php echo $uni[0] ?></td>
            <td><?php echo $text ?></td>
            <td><?php echo $sqll[2] ?></td>
            <td><?php echo $sqll[4] ?></td>
            <td><button id="btn_notas" class="w3-button w3-green" data-id='<?php echo $sqll[0] ?>' data-alu='<?php echo $alu[0] ?>' data-uni='<?php echo $uni[0] ?>' data-nota1='<?php echo $sqll[2] ?>' data-nota2='<?php echo $sqll[4] ?>'  >Editar</button></td>

          </tr>

<?php
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla_notas1').DataTable();
} );
</script>