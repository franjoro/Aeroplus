<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla">
        <thead>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Licencia</th>
          <th>Cobro</th>
          <th>Saldo</th>
          <th>Editar</th>
          <th>Manejar saldo</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM alumno");
  while($sqll=mysqli_fetch_array($sql)){

$chec=mysqli_query($conexion,"SELECT Username FROM user WHERE id_user='$sqll[1]'");
$check=mysqli_fetch_array($chec);
if ($sqll[5]=='1') {
  $text="P.Privado";
}elseif($sqll[5]=='2'){
  $text="H. Instrumentos";
}elseif($sqll[5]=='3'){
  $text="P. Comercial";
}elseif($sqll[5]=='4'){
  $text="H. Bimotor";
}elseif($sqll[5]=='5'){
  $text="P. Instructor";
}
?>
          <tr>
<td><?php echo $check[0] ?></td>
<td><?php echo $sqll[2] ?></td>
<td><?php echo $sqll[3] ?></td>
<td><?php echo $sqll[4] ?></td>
<td><?php echo $text ?></td>
<td>$<?php echo $sqll[7] ?></td>
<td>$<?php echo $sqll[6] ?></td>
<td><button id="edit_alu" class="w3-button" data-id='<?php echo $sqll[0] ?>' data-name='<?php echo $sqll[2] ?>' data-email='<?php echo $sqll[3] ?>' data-tel='<?php echo $sqll[4] ?>' data-role='<?php echo $sqll[5] ?>' data-cobro='<?php echo $sqll[7] ?>' ><i class="fas fa-edit"></i></button></td>
<td><button class="w3-button" id="btn_saldo" data-id='<?php echo $sqll[0] ?>' data-saldo='<?php echo $sqll[6] ?>' ><i class="fas fa-money-bill-wave"></i></button></td>


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