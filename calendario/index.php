<?php
// include 'funciones.php';
include '../conexion.php';
 ?>
<!DOCTYPE html>


<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>

<body >






        <div class="w3-container" style="margin-top: -50px">
 <center><font><div class="page-header"><h2></h2></div></font></center>
    <center>
                  <div class="btn-group">
                <button class="w3-button" data-calendar-nav="prev" style="font-size: 20px;"><i class="fas fa-angle-left"></i></button>
                <button class="w3-button w3-blue" data-calendar-nav="today" style="font-size: 20px;">Hoy </button>
                <button class="w3-button" data-calendar-nav="next" style="font-size: 20px;"><i class="fas fa-angle-right"></i></button>
                   </div><br><br>
                    <div class="btn-group">
                        <button class="w3-button w3-teal" data-calendar-view="year">Año</button>
                        <button class="w3-button w3-teal" data-calendar-view="month">Mes</button>
                        <button class="w3-button w3-teal" data-calendar-view="week">Semana</button>
                        <button class="w3-button w3-teal" data-calendar-view="day">Dia</button>
                     </div>
                                        <br>
    </center>                                    

                <div class="row">
                        <div id="calendar"></div> 
                        <br><br>
                </div>
<br>

        </div>
        <br>

    </center>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">

        (function($){

                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

     
                var options = {

                
                        modal: '#events-modal', 

              
                        modal_type:'iframe',    

              
                        events_source: '<?=$base_url?>obtener_eventos.php', 

                 
                        view: 'month',             

               
                        day: yyyy+"-"+mm+"-"+dd,   


             
                        language: 'es-ES', 

                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


              
                        time_start: '08:00', 

            
                        time_end: '22:00',   

                        time_split: '30',    

                
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>


</body>
</html>
