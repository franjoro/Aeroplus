<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php 

include("../../../conexion.php");

 ?>
       <table id="tabla1234">
        <thead>
          <th>Nombre</th>
          <th>Licencia</th>
          <th>Editar</th>
        </thead>
        <tbody>
<?php 
  $sql=mysqli_query($conexion,"SELECT * FROM uni");
  while($sqll=mysqli_fetch_array($sql)){


if ($sqll[3]=='1') {
  $text="P.Privado";
}elseif($sqll[3]=='2'){
  $text="H. Instrumentos";
}elseif($sqll[3]=='3'){
  $text="P. Comercial";
}elseif($sqll[3]=='4'){
  $text="H. Bimotor";
}elseif($sqll[3]=='5'){
  $text="P. Instructor";
}
?>
          <tr>
<td><?php echo $sqll[1] ?></td>
<td><?php echo $text ?></td>
<td><button class="w3-button w3-green" id="editar_uni" data-id="<?php echo $sqll[0] ?>" data-name="<?php echo $sqll[1] ?>" data-des="<?php echo $sqll[2] ?>" data-lic="<?php echo $sqll[3] ?>" >Editar</button></td>


          </tr>

<?php
}
 ?>
        </tbody>
      </table>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla1234').DataTable();
} );
</script>