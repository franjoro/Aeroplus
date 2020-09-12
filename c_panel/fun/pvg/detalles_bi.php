<?php 
include("../../../conexion.php");
$id = $_POST['id'];
$li=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM evah WHERE id_hora='$id'"));
?>

<div class="w3-responsive">
      <div class="w3-row-padding">
          <div class="w3-third">
            <label>Fecha:</label>
            <input class="w3-input" type="text" disabled id="date" value="<?php echo $li[12] ?>">
          </div>
          <div class="w3-third">
            <label>Hora de salida:</label>
            <input class="w3-input" type="text" disabled id="hsalida" value="<?php echo $li[1] ?>">
          </div>
          <div class="w3-third">
            <label>Hora de llegada:</label>
            <input class="w3-input" type="text" disabled id="hllegada" value="<?php echo $li[2] ?>">
          </div>
      </div> 
      <div class="w3-row-padding">
          <div class="w3-quarter">
            <label>Tacometro salida:</label>
            <input class="w3-input" type="text" disabled id="date" value="<?php echo $li[3] ?>">
          </div>
          <div class="w3-quarter">
            <label>Tacometro llegada:</label>
            <input class="w3-input" type="text" disabled id="hsalida" value="<?php echo $li[4] ?>">
          </div>
          <div class="w3-quarter">
            <label>Hub salida:</label>
            <input class="w3-input" type="text" disabled id="hllegada" value="<?php echo $li[5] ?>">
          </div>
          <div class="w3-quarter">
            <label>Hub salida:</label>
            <input class="w3-input" type="text" disabled id="hllegada" value="<?php echo $li[6] ?>">
          </div>
      </div> 
      <div class="w3-row-padding">
        <label>Nota del instructor:</label>
        <textarea class="w3-input w3-border" disabled="" style="max-width: 100%; height: 100px"><?php echo $li[9] ?></textarea>
      </div>

      <br>
  <label>Foto de briefing:</label><br>
      <img style="max-width: 100%; max-height: 75%" src="../instructores/fun/<?php echo $li[10] ?>">

</div>

