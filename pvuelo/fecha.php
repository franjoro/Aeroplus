<?php
// $month=02;
// $year=2019;
 
# mktime(0,0,0,$month+1,1,$year) = devuelve el timestamp de la fecha indicada
# aumentando en uno el numero del mes, y dejando el numero del dia como el
# primero 1. Tambien le indicamos que es la hora 0, minuto y segundos 0. Aqui
# obtendremos el timestamp de la hora 0 del primer dia del mes sugiente.
# -1 = restamos un segundo al timestamp, por lo que ya estamo en el mes anterior,
# es decir el que queremos saber.
# date("d" = devuelve el ultimo dia del mes.
 
// echo date("d",(mktime(0,0,0,$month+1,1,$year)-1));
?>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<button id="addRow">Agregar</button>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
                <th>Column 5</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
                <th>Column 5</th>

            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
    	$(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 2;
 
    $('#addRow').on( 'click', function () {
        t.row.add( [
            "ca",
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5',
            "hola"
            
        ] ).draw( false );
 
        counter++;
    } );

} );
    </script>