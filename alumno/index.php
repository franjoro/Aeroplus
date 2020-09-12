<?php 
session_start();
include('../conexion.php');
$id=$_SESSION['user'];
if (isset($_SESSION['session_id']) &&  $_SESSION['session_id']=='2') {
  $sql= mysqli_query($conexion,"SELECT * FROM alumno WHERE id_user='$id' ");
  $sqll=mysqli_fetch_array($sql);

  $se= mysqli_query($conexion,"SELECT Semana FROM semana WHERE Role='1' ");
  $sem=mysqli_fetch_array($se);
  $semana =$sem[0];
 ?>
<!DOCTYPE html>
<html>
<title>Alumno</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

<style>
html, body, h1, h2, h3, h4, h5 {font-family: 'Roboto', sans-serif;}
a:link 
{ 
text-decoration:none; 
} 
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-teal w3-left-align w3-large">
 <span class="w3-bar-item w3-button w3-padding-large w3-teal">Semana actual: <?php echo $semana ?> </span>
  <a href="../destroy.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white w3-right"><span>Cerrar sesión</span></a>
 </div>
</div>

<!-- Navbar on small screens -->
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <!-- <h4 class="w3-center">Instructor</h4> -->
         <p class="w3-center"><img src="../img/p1.png" class="w3-image"  style="height:250px;width:250px" alt="Avatar"></p>
         <hr>
         <p><i class="fas fa-user-tie fa-fw w3-margin-right w3-text-theme"></i><?php echo $sqll[2] ?></p>
         <?php 
if ($sqll[5]=='1') {
  $text="Piloto Privado";
}elseif($sqll[5]=='2'){
  $text="Habilitción Instrumentos";
}elseif($sqll[5]=='3'){
  $text="Piloto. Comercial";
}elseif($sqll[5]=='4'){
  $text="Habilitción Bimotor";
}elseif($sqll[5]=='5'){
  $text="Piloto Instructor";
}
          ?>
         <p><i class="fas fa-id-badge fa-fw w3-margin-right w3-text-theme"></i><?php echo $text ?></p>
        </div>
      </div>
      <br>
      
      <!-- Botones -->
      <div class="w3-card w3-round">
        <div class="w3-white">
         <a href="../pvuelo/pvuelo.php"> <button class="w3-button w3-block w3-left-align"><i class="fas fa-plane-departure fa-fw w3-margin-right"></i> Programa de vuelo (Semana <?php echo $semana+1 ?>)</button></a>
          <a href="../pvuelo/pvuelo_actual.php"><button class="w3-button w3-block w3-left-align"><i class="fas fa-plane fa-fw w3-margin-right"></i>Vuelos en vivo</button></a>
          <a href="calendario.php"><button class="w3-button w3-block w3-left-align"><i class="fas fa-calendar-alt fa-fw w3-margin-right"></i>Calendario</button></a>
          <a href="aula.php"> <button class="w3-button w3-block w3-left-align"><i class="fas fa-book w3-margin-right"></i> Mis notas</button></a>
        </div>      
      </div>
      
      
<?php 
$hooy=date("d-m-Y");
$dia_hoy=date("d");
$b=11111150;
$xx=0;
$next=$semana+1;
$yeih=0;
$q1=mysqli_query($conexion,"SELECT date_ FROM horas WHERE id_alumno='$sqll[0]' AND Semana='$next'  ");
while($q=mysqli_fetch_array($q1)){
   $da= substr($q[0], 0, -8);

$ope=$da-$dia_hoy;

if ($ope<0) {
  # code...
}else{
$date1 = new DateTime($q[0]);
$date2 = new DateTime($hooy);
$diff = $date1->diff($date2);
$qqqqq=$diff->days;



  if ($qqqqq<$b) {
    $b=$qqqqq;
    $yeih=$q[0];
  }

}

} 



$q2=mysqli_fetch_array($a12=mysqli_query($conexion,"SELECT * FROM horas WHERE id_alumno='$sqll[0]' AND date_='$yeih' "));
$num =mysqli_num_rows($a12);
if ($num>0) {
  if ($q2[7]=='1') {
   $text='<p class="w3-border w3-round w3-padding " style="background-color:#00C291">Estado: Aprobado <span style=margin-left:15px> Fecha: '.$q2[8].'</span>';
  }else{
   $text='<p class="w3-border w3-round w3-padding" style="background-color:#FFCB75" >Estado: Solicitud enviada <span style=margin-left:15px> Fecha: '.$q2[8].'</span>'; 
  }
}else{
   $text='<p class="w3-border w3-round w3-theme-l4 w3-padding w3-theme-l4">Estado: No asignado </p>'; 

}


 ?>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m6">
          <style type="text/css">
          @media (max-width: 600px) {
          .abajo{
          margin-top: 20px;
          width: 100%;
          margin-bottom: 20px;
          };
          }
         @media (min-width: 600px) {
          .abajo{
            /*background-color: red;*/
            padding-right: 10px;
            padding-left: 10px;

          }
         }
          </style>


      <div class="w3-row-padding abajo">
        <div class="w3-col 12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h5>Siguiente vuelo: </h5>
            <?php echo $text ?>
              <p></p>
            </div>
          </div>
        </div>
      </div>
      








      <div class="w3-container w3-card w3-white w3-round w3-margin w3-s12" style="height: 240px; overflow-y: scroll;"><br>

        <h4>Notificaciones:</h4>
<?php 
$s=mysqli_query($conexion,"SELECT * FROM alert WHERE To_='$id' AND Role='1'  ORDER BY id DESC ");
  $nuxd=mysqli_num_rows($s);
   if($nuxd>0){
 while($xaa=mysqli_fetch_array($s)){


  
 ?>

<!-- 
      
     -->
        <div class="w3-row" id="closee<?php echo $xaa[0] ?>">
    <a href="../<?php echo $xaa[4] ?>">
      <div class="w3-col m11">
      <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom ">
        <p><?php echo $xaa[1] ?></p>
      </div>
      </div>
      </a>
      <div class="w3-col m1" data-id='<?php echo $xaa[0] ?>' id="close" onclick="document.getElementById('closee<?php echo $xaa[0] ?>').style.display='none'">
        <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom ">
          <p>X</p>
        <!-- </span> -->
      </div>
      </div>
</div>
    <?php 
}
}else{
  ?>
      <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom ">
        <p>Sin notificaciones pendientes por ver</p>
      </div>

  <?php

}
     ?>        


      </div>

      
    <!-- End Middle Column -->
    </div>
    <?php 
    $b=1000000000000000;
    $ope=0;
$aabc=mysqli_query($conexion,"SELECT inicio_normal FROM eventos" );
while ($m=mysqli_fetch_array($aabc)) {
 $re= substr($m[0], 0, -6);
 $ree= substr($m[0], 0, -14);

$date1 = new DateTime($re);
$date2 = new DateTime($hooy);
$diff = $date1->diff($date2);
$qqqqq=$diff->days;

 $ope=($dia_hoy-$ree);
// echo "<h1>".$ope."<h1>";

if($ope>0){
  if ($qqqqq<$b) {
    $b=$qqqqq;
    $yeih=$m[0];
  }
}
}

$query=mysqli_fetch_array($kaka=mysqli_query($conexion,"SELECT * FROM eventos WHERE inicio_normal='$yeih'" ));
$numm=mysqli_num_rows($kaka);

if($numm==0){
  ?>
  <div class="w3-col m3">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>No existen eventos registrados</p>
        </div>
      </div>
  <?php 
}else{
     ?>


    <!-- Right Column -->
    <div class="w3-col m3">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Próximo evento: "<?php echo $query[1] ?>"</p>
          <p><strong>Fecha y hora: <?php echo $yeih ?></strong></p>
          <p><a href="../calendario/descripcion_evento.php?id=<?php echo $query[0] ?>"><button class="w3-button w3-block w3-theme-l4">Detalles</button></p></a>
        </div>
      </div>
<?php 
}
 ?> 

<br>
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>Saldo disponible:</p>
        <p><strong>$<?php echo $sqll[6] ?></strong></p>
      </div>
      <br>
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
       <div class="w3-container">
        <p>Horas de vuelo:</p>
        <?php 
$a=mysqli_query($conexion,"SELECT * FROM horas WHERE id_alumno='$sqll[0]' AND Role='3' ");
$num =mysqli_num_rows($a);
         ?>
        <p><strong><?php echo $num ?>hrs.</strong></p>
        <a href="bitacora.php?id=<?php echo $sqll[0] ?>"><button class="w3-button w3-block w3-theme-l4 ">Detalles</button></a>
     </div>
      </div>
<!--       <br>
      


  </div>
  
End Page Container -->
</div>
<br>

<!-- Footer -->

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">

  function mensaje(me,id_m){
    $.alert({
    title: 'Mensaje directo del administrador:',
    content: me,
    theme: 'supervan',
    type:'green',
    icon: 'fas fa-envelope-open-text',
    buttons: {
        No: { 
            text: 'No volver a mostrar', 
            action: function(){
                   $.ajax({
                 url:"fun/update_me.php",
                 data:{id_m:id_m},
                 method: "POST", 
               })

            }
          },
        Ok: function(){
            // access the button using jquery
        }
    }
})
  }


  $(document).on("click","#close", function(){
   var id = $(this).data("id");
     $.ajax({
       url:"fun/borrar_noti.php",
       data:{id:id},
              method: "POST", 
       success: function(data){
      }
     })
 
});


// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}






        function pass_co(){
              $.confirm({
        title: '¡Bienvenido!',
        theme: 'supervan',
        content: '' +
        '<center><form action="" class="w3-form">' +
        '<div class="w3-container" style="width:400px;">' +
        '<label>Por favor cambia tu contraseña</label> <br>' +
        '<input type="password" placeholder="Password" class="w3-input p" required />' +
        '</div>' +
        '</form></center>',
    icon: 'fas fa-lock',
    color:'green',
        buttons: {
            formSubmit: {
                text: 'Cambiar contraseña',
                btnClass: 'btn-blue',
                action: function () {
                    var p = this.$content.find('.p').val(); 
                        $.ajax({
              url:"fun/cambiar_pass.php",
              data:{p:p},
              method: "POST",
              success: function(data){
                console.log(data);
                gracias();
              }
              })
                }
            },
        },
    });
        }







      function gracias(){
      $.alert({
      title: '¡Gracias!',
      content: 'Por favor no la olvides',
      theme: 'supervan',
      type:'green',
      icon: 'far fa-smile-wink',
      buttons: {
      Ok: function(){
      }
      }
      })
      }







</script>

</body>
</html> 

<?php 
$me=mysqli_query($conexion,"SELECT * FROM messages WHERE id_user='$id' AND role='1' ");

while($mee=mysqli_fetch_array($me)) {
  echo "<script>mensaje('".$mee[2]."',".$mee[0].")</script>";

}

  $ps=mysqli_fetch_array(mysqli_query($conexion,"SELECT Username,Password FROM user WHERE id_user='$id' "));
  $id_pass=md5($ps[0]);


if ($id_pass==$ps[1]) {
  echo "<script>pass_co()</script>";
}




}else{
  header("location:../destroy.php");
}

 ?>
