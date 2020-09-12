<?php 
include("../../../conexion.php");

$sql=mysqli_fetch_array(mysqli_query($conexion,"SELECT total_combustible FROM tcomb WHERE id='1'"));

echo '<h3><strong>Combustible actual:</strong> <span id="actual_comb">'.$sql[0].'</span> gl</h3>
'
 ?>
