<?php 
include("../../conexion.php");
$id = $_POST['id'];
$li=mysqli_fetch_array(mysqli_query($conexion,"SELECT Role FROM alumno WHERE id_user='$id'"));
?>
<div class="w3-responsive">
  <button class="w3-button w3-left" onclick="document.getElementById('tabla_ingreso').style.display='none';
  document.getElementById('tabla_aula').style.display='block'"><i class="fas fa-arrow-left"></i> atrás</button>
  <table class="w3-table-all w3-hoverable">
    <thead>
      <th>Unidad</th>
      <th>Nota</th>
      <th>Reposición</th>
    </thead>
    <tbody>
<style type="text/css">
  @media (min-width:500px) {
    .xd{
      margin-top:-35px;
    };
  }
</style>


<?php 

$q=mysqli_query($conexion,"SELECT id,Name FROM uni WHERE Lic='$li[0]'  ");
while ($sq=mysqli_fetch_array($q)) {
  $c=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM notas WHERE id_user='$id' AND uni='$sq[0]' "));
$repo='No disponible'; 
  if ($c[0]>0) {
  $c=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM notas WHERE id_user='$id' AND uni='$sq[0]' "));
        if ($c[2]>=8) {
        $te="<span>Nota:".$c[2]."<br> Estado:<span style='color:green'><strong>Aprobado</strong></span><span>";
        
        }else{
        $te="<span>Nota:".$c[2]." Estado: <span style='color:red'><strong>Reprobado</strong></span><span>";

      if ($c[4]>0) {
        $repo="<span>Nota:".$c[4];
      }else{
        $repo=' <input class="w3-input w3-border validanumericos" id="repo'.$sq[0].'" style="width: 70%">
          <button class="w3-button w3-green w3-right xd" style="margin-top:-35px; "  data-alu="'.$id.'" data-uni="'.$sq[0].'" onclick="nota_repo()" id="btn_repo"><i class="fas fa-check"></i></button>';
        }
      }


  }else{
  $te=' <input class="w3-input w3-border validanumericos" id="nota'.$sq[0].'" style="width: 70%">
         
          <button class="w3-button w3-green w3-right xd"  data-alu="'.$id.'" data-uni="'.$sq[0].'" onclick="nota()" id="btn_nota"><i class="fas fa-check"></i></button>';
  }
 ?>

      <tr>
        <td><?php echo $sq[1] ?></td>
        <td style="width:200px;" >
         <?php echo $te ?>
         </td>
        <td>
  <?php echo $repo ?>
          </select>
        </td> 
      </tr>

<?php 
}
 ?>



    </tbody>
  </table>
</div>

<script type="text/javascript">
    $(function(){

  $('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
     return false;
  })
  .on("cut copy paste",function(e){
  e.preventDefault();
  });

});
</script>