 <?php include("../../../conexion.php"); 
$role=$_POST['role'];
 ?>
 <table class="w3-table-all"> 
     <thead>
       <th>Licencia</th>
       <th>Alumnos no asignados</th>
     </thead>
    <?php
    $i=0;
       $sql1=mysqli_query($conexion,"SELECT id_user,Nombre,Role FROM alumno") ;
       while ($sqll1=mysqli_fetch_array($sql1)) {
        $sheck=mysqli_query($conexion,"SELECT COUNT(*) FROM union_ WHERE Role='$role' AND With_='$sqll1[0]' ");
        $shec=mysqli_fetch_array($sheck);

        if ($shec[0]=='0') {
          $i=$i+1;
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

      ?>
       <tr>
        <td><?php echo $text ?></td>
         <td><?php echo $sqll1[1]; ?></td>
       </tr>

      <?php 
      }}
     
        if ($i=='0') {
      
      ?>
       <td colspan="2"><strong>Todos los alumnos asignados</strong> </td>
    <?php 
  }
     ?>

     </tbody>
   </table>