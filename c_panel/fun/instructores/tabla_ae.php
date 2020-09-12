 <?php 
include("../../../conexion.php");

  ?>
          <select class="w3-select" id="add_ae">
            <option value="" disabled selected>Choose plane</option>
      <?php       $sql1=mysqli_query($conexion,"SELECT Matricula FROM plane") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
        $sheck=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Role='3' AND With_='$sqll1[0]' ");
        $shec=mysqli_fetch_array($sheck);
        if ($shec[0]=='0') {  ?>
            <option value="<?php echo $sqll1[0] ?>"><?php echo $sqll1[0] ?></option>
      
<?php }} ?>
          </select> <br><br>
          <button class="w3-button w3-green" id="btn_modal_3" style="float: right;">Aceptar</button>
          <br><br>
          <hr>

<?php 
$id =$_POST['id'];

  $sql=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Who_='$id' AND Role='3' ");
  $hdus=mysqli_fetch_array($sql);
  if ($hdus[0]>0) {
 ?>




 <h4>Alumnos:</h4>
       <table class="w3-table-all">
        <thead>
          <th>Aeronave</th>
          <th>Eliminar</th>
        </thead>
        <tbody>
<?php 

  $sql1=mysqli_query($conexion,"SELECT * FROM union_ WHERE Who_='$id' AND Role='3' ");
  while($sqll=mysqli_fetch_array($sql1)){
 
$chec=mysqli_query($conexion,"SELECT Matricula FROM plane WHERE Matricula='$sqll[1]'");
$check=mysqli_fetch_array($chec);

?>
          <tr>


<td><?php echo $check[0] ?></td>
<td><button class="w3-button w3-red" id="trash3" data-id_ins='<?php echo $id ?>' data-alu='<?php echo $sqll[1] ?>' ><i class="fas fa-trash-alt"></i></button></td>


          </tr>

<?php
}}else{
  echo "<h4>Instructor sin aeronaves asignadas</h4>";
}
 ?>
        </tbody>
      </table>


