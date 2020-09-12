 <?php 
 include("../../../conexion.php"); 
 ?>
 <table class="w3-table-all"> 
     <thead>
       <th>Aeronaves no asignadas</th>
     </thead>
    <?php
    $i=0;
       $sql1=mysqli_query($conexion,"SELECT Matricula FROM plane") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
        $sheck=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Role='3' AND With_='$sqll1[0]' ");
        $shec=mysqli_fetch_array($sheck);

        if ($shec[0]=='0') {
          $i=$i+1;


      ?>
       <tr>
         <td><?php echo $sqll1[0]; ?></td>
       </tr>

      <?php 
      }}
     
        if ($i=='0') {
      
      ?>
       <td colspan="2"><strong>Todas las aeronaves</strong> </td>
    <?php 
  }
     ?>

     </tbody>
   </table>