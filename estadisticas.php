<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'gallbo_markoptic');

mysqli_set_charset($mysqli, "utf8");

$query_od = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Otro Dispositivo'");
$num_od = mysqli_num_rows($query_od);

$query_ca = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Colchon Antiescaras'");
$num_ca = mysqli_num_rows($query_ca);

$query_p = mysqli_query($mysqli, "SELECT * FROM solicitud where peticion = 'Protesis'");
$num_p = mysqli_num_rows($query_p);

$query_psi = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Superior Izquierda'");
$num_psi = mysqli_num_rows($query_psi);

$query_psd = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Superior Derecha'");
$num_psd = mysqli_num_rows($query_psd);

$query_pii = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Inferior Izquierda'");
$num_pii = mysqli_num_rows($query_pii);

$query_pid = mysqli_query($mysqli, "SELECT * FROM solicitud where descripcion = 'Inferior Derecha'");
$num_pid = mysqli_num_rows($query_pid);
?>

<?php require 'mod/head.php';?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">



        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Solicitud', 'Numero de Solicitudes', { role: 'style' } ],
          ['Protesis Inferior Derecha',     <?php echo $num_pid; ?>, 'color: red'],
          ['Protesis Inferior Izquierda',      <?php echo $num_pii; ?>, 'color: orange'],
          ['Protesis Superior Derecha',  <?php echo $num_psd; ?>, 'color: blue'],
          ['Protesis Superior Izquierda', <?php echo $num_psi; ?>, 'color: green'],
          ['Colchon Antiescaras', <?php echo $num_ca; ?>, 'color: purple'],
          ['Otros Dispositivos',    <?php echo $num_od; ?>, 'color: brown']
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

    </script>



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
                    <div class="panel-body panel-body-mark" style="background-color: #ffffff;">

                    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
    


                    </div>
                </div>     
            </div>
            
            <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>

    
<?php require 'mod/scripts.php';?>
<script type="text/javascript" src="js/funciones.js"></script>

    
</body>
</html>
