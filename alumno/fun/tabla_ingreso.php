<?php 
include("../../conexion.php");
$id = $_POST['id'];
// $li=mysqli_fetch_array(mysqli_query($conexion,"SELECT Role FROM alumno WHERE id_user='$id'"));
$li=$_POST['li'];
?>

  <button class="w3-button" onclick="
  document.getElementById('first').style.display='block'
  document.getElementById('tabla_ingreso').style.display='none'

  "><i class="fas fa-arrow-left"></i> Atrás</button>
  <table class="w3-table-all w3-hoverable">
    <thead>
      <th>Unidad</th>
      <th>Nota</th>
      <th>Reposición</th>
    </thead>
    <tbody>

<?php 

$q=mysqli_query($conexion,"SELECT id,Name FROM uni WHERE Lic='$li'  ");
while ($sq=mysqli_fetch_array($q)) {
  $c=mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(*) FROM notas WHERE id_user='$id' AND uni='$sq[0]' "));
$repo='-'; 
  if ($c[0]>0) {
  $c=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM notas WHERE id_user='$id' AND uni='$sq[0]' "));
        if ($c[2]>=8) {
        $te="<span>Nota:".$c[2]."<br> Estado:<span style='color:green'><strong>Aprobado</strong></span><span>";
        }else{
        $te="<span>Nota:".$c[2]." Estado: <span style='color:red'><strong>Reprobado</strong></span><span>";

      if ($c[4]>0) {
        $repo="<span>Nota:".$c[4];
      }else{
        $repo='<span>Nota pendiente de ingresar</span>';
        }
      

      }


  }else{
  $te='<span>Nota no ingresada</span>';
  }
 ?>

      <tr>
        <td><?php echo $sq[1] ?></td>
        <td style="width:200px;" >
         <?php echo $te ?>
         </td>
        <td>
  <?php echo $repo ?>
          
        </td> 
      </tr>

<?php 
}
 ?>



    </tbody>
  </table>


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