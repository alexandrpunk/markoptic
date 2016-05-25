<?php

$title = 'estadisticas de solicitudes';

require 'mod/head.php';

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn ">
                    <div class="panel-heading panel-heading-mark" id="rosado">Estadisticas de Solicitudes</div>
                    <div class="panel-body panel-body-mark">

                    <div class="charts" id="columnchart_values" style=""></div>
                    <hr/>
                    <h3 class="text-center"><strong>Solicitudes a nivel mundial</strong></h3>
                    <div class="charts" id="regions_div" style=""></div>
                    <hr/>
                    <h3 class="text-center"><strong>Solicitudes a nivel nacional</strong></h3>
                    <div class="charts" id="chart_div" style=""></div>

    


                    </div>
                </div>     
            </div>
            
            <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>

    
<?php require 'mod/scripts.php';?>

<script type="text/javascript">



        google.charts.load("current", {packages:["corechart", "geochart", "map"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawMap);
        google.charts.setOnLoadCallback(drawRegionsMap);


        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Solicitud', 'Numero de Solicitudes', { role: 'style' } ],
            ['Protesis Inferior Derecha',     <?php echo $num_pid; ?>, 'color: #A17AB3'],
            ['Protesis Inferior Izquierda',      <?php echo $num_pii; ?>, 'color: #FCCF14'],
            ['Protesis Superior Derecha',  <?php echo $num_psd; ?>, 'color: #25AAE3'],
            ['Protesis Superior Izquierda', <?php echo $num_psi; ?>, 'color: #63C62F'],
            ['Colchon Antiescaras', <?php echo $num_ca; ?>, 'color: #F05B6F']
          ]);


          var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                             { calc: "stringify",
                               sourceColumn: 1,
                               type: "string",
                               role: "annotation" },
                             2]);

          var options = {
              title: "Estadisticas de Solicitudes",
              legend: { position: "none" },
          };
        
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
          chart.draw(view, options);
        }

     

        function drawMap() {
          var data = google.visualization.arrayToDataTable([
            ['Ciudad',   'Solicitudes'],
            <?php echo $estados; ?>
          ]);

          var options = {
              mapType: 'normal',
              showTip: true,
            };

          var map = new google.visualization.Map(document.getElementById('chart_div'));
          map.draw(data, options);
        };

        function drawRegionsMap() {

          var data = google.visualization.arrayToDataTable([
            ['Pais', 'Solicitudes'],
            <?php echo $paises; ?>
          ]);

          var options = {
            colorAxis: {colors: ['#F05B6F','#25AAE3']},
          };

          var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

          chart.draw(data, options);
        }

    </script>

    
</body>
</html>