<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla">
        <thead>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Tipo:</th>
          <th>Acceso</th>
          <th>Permiso</th>
          <th>Reiniciar <br> Contraseña</th>
          <th>Mensaje <br> Directo</th>

        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM user WHERE Role!=0  AND Role!=3 ");
  while($sqll=mysqli_fetch_array($sql)){
    $name='Administrador';
       $sq1=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM alumno WHERE id_user='$sqll[0]' "));
       $sq2=mysqli_fetch_array(mysqli_query($conexion,"SELECT Nombre FROM instructor WHERE id_user='$sqll[0]' "));

    if ($sqll[3]=='1') {
      $text='Instructor';
    }elseif ($sqll[3]=='2') {
      $aluu=mysqli_fetch_array(mysqli_query($conexion,"SELECT Saldo FROM alumno WHERE id_user='$sqll[0]' "));
      if ($aluu[0]<=400) {
         $text='Alumno <span style="color:red">(SPA)</span>';
      } else {
         $text='Alumno';
        
      }
      
    }elseif ($sqll[3]=='0') {
      $text='Admin';
    }elseif ($sqll[3]=='3') {
      $text='Despacho';
    }
 
$ccc=$sq1[0].$sq2[0];

if ($sqll[4]=='1') {
  $permiso='<span style="color:green">Aceptado</span>' ;
}else{
  $permiso='<font style="color:red">Denegado</font>';
}




?>
          <tr>
<td><?php echo $sqll[1] ?></td>
<td><?php echo $ccc ?></td>
<td><?php echo $text ?></td>
<td><strong><?php echo $permiso ?></strong></td>
<td><button class="w3-button w3-green" data-id='<?php echo $sqll[0] ?>' id='change'><i class="fas fa-door-open"></i></button></td>
<td><button class="w3-button w3-green" onclick="pass('<?php echo $sqll[0] ?>')" id='pass' ><i class="fas fa-key"></i></button></td>
<td><button class="w3-button w3-green" data-id='<?php echo $sqll[0] ?>' data-name='<?php echo $ccc?>'  id="btn_mensaje" ><i class="fas fa-envelope"></i></button></td>



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