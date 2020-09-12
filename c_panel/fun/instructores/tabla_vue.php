 <?php 
include("../../../conexion.php");

  ?>
          <select class="w3-select" id="add_teo1">
            <option value="" disabled selected>Choose student</option>
      <?php       $sql1=mysqli_query($conexion,"SELECT id_user,Nombre,Role FROM alumno") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
        if ($sqll1[2]=='1') {
            $text="P.Privado";
          }elseif($sqll1[2]=='2'){
            $text="H. Instrumentos";
          }elseif($sqll1[2]=='3'){
            $text="P. Comercial";
          }elseif($sqll1[2]=='4'){
            $text="H. Bimotor";
          }elseif($sqll1[2]=='5'){
            $text="P. Instructor";
          }
        $sheck=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Role='2' AND With_='$sqll1[0]' ");
        $shec=mysqli_fetch_array($sheck);
        if ($shec[0]=='0') {  ?>
            <option value="<?php echo $sqll1[0] ?>"><?php echo $sqll1[1] ?>-(<?php echo $text ?>)</option>
      
<?php }} ?>
          </select> <br><br>
          <button class="w3-button w3-green" id="btn_modal_2" style="float: right;">Aceptar</button>
          <br><br>
          <hr>

<?php 
$id =$_POST['id'];

  $sql=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Who_='$id' AND Role='2' ");
  $hdus=mysqli_fetch_array($sql);
  if ($hdus[0]>0) {
 ?>




 <h4>Alumnos:</h4>
       <table class="w3-table-all">
        <thead>
          <th>Licencia</th>
          <th>Alumno</th>
          <th>Eliminar</th>
        </thead>
        <tbody>
<?php 

  $sql1=mysqli_query($conexion,"SELECT * FROM union_ WHERE Who_='$id' AND Role='2' ");
  while($sqll=mysqli_fetch_array($sql1)){
 
$chec=mysqli_query($conexion,"SELECT Nombre,Role FROM alumno WHERE id_user='$sqll[1]'");
$check=mysqli_fetch_array($chec);

if ($check[1]=='1') {
  $text="P.Privado";
}elseif($check[1]=='2'){
  $text="H. Instrumentos";
}elseif($check[1]=='3'){
  $text="P. Comercial";
}elseif($check[1]=='4'){
  $text="H. Bimotor";
}elseif($check[1]=='5'){
  $text="P. Instructor";
}

?>
          <tr>


<td><?php echo $text ?></td>
<td><?php echo $check[0] ?></td>
<td><button class="w3-button w3-red" id="trash2" data-id_ins='<?php echo $id ?>' data-alu='<?php echo $sqll[1] ?>' ><i class="fas fa-trash-alt"></i></button></td>


          </tr>

<?php
}}else{
  echo "<h4>Instructor sin alumnos asignados</h4>";
}
 ?>
        </tbody>
      </table>


