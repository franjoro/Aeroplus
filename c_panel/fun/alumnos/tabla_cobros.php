<?php 
include("../../../conexion.php");
$id1=$_POST['id'];
$q=mysqli_fetch_array(mysqli_query($conexion,"SELECT id_user FROM alumno WHERE id_alumno='$id1'"));
$id=$q[0];
 ?>

        <table class="w3-table-all" id="cobro_tb">
          <thead>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Nuevo saldo</th>
          </thead>
          <tbody>
<?php 
$sqll=mysqli_query($conexion,"SELECT * FROM cobros WHERE id_user='$id' ORDER BY id ASC");
while($sql=mysqli_fetch_array($sqll)){

// if ($sql[3]<0) {
//   $color="red"; 
// }else{
//   $color="green"; 
// }


 ?>

            <tr>
              <td><?php echo $sql[5] ?></td>
              <td><?php echo $sql[6] ?></td>
              <td>$<?php echo $sql[3] ?></td>
              <td>$<?php echo $sql[4] ?></td>
            </tr>
<?php 
}
 ?>



          </tbody>
        </table>

<script type="text/javascript">
  $(document).ready( function () {
    $('#cobro_tb').DataTable();
} );
</script>