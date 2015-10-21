<?php $titulo = "Noticias"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="cyan">LISTA DE SOLICITANTES</div>
                    <div  class="panel-body panel-body-mark"> 

                    <div class="postit">
                        <a data-toggle="modal" href="#" data-target="#noticia9"><img class="thumb-new" src="img/ben_1.jpg"></a>
                        <a data-toggle="modal" href="#" data-target="#noticia9"><h4>Conociendo a: Adoniram Abimelec Castro López</h4></a>
                        <p>Adoniram actualmente es estudiante de tercer grado de la carrera de licenciatura de educación física en la UAS, proveniente de la cuidad de Los Mochis, logra venir a Culiacán a estudiar la universidad al recibir una beca de estudio que le fue otorgado por su activa participación en eventos de personas con capacidades diferentes.<a data-toggle="modal" href="#noticia9"> Leer Más...</a></p>                    
                    </div>

                    <hr>

                    <div class="postit">
                        <a data-toggle="modal" href="#" data-target="#noticia8"><img class="thumb-new" src="img/ben_2.jpg"></a>
                        <a data-toggle="modal" href="#" data-target="#noticia8"><h4>Conociendo a: Sergio Arturo Santos Cabrera</h4></a>
                        <p>Sergio Santos con 29 años de edad actualmente reside en la ciudad de Culiacán, Sinaloa junto con su esposa y un hijo. A la edad de 11 años sufrió un accidente por electricidad el cual provoco la amputación de ambas manos; desde entonces y por cuestiones económicas él se vio en la necesidad de utilizar prótesis de pinza con las cueles solo puede realizar tareas básicas laboral y personalmente.<a data-toggle="modal" href="#noticia8"> Leer Más...</a></p>                    
                    </div>
                  </div>
                </div>
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/modals.php';?>

<?php require 'mod/scripts.php';?>

<script src="js/scroll.js"></script>
<script async src="js/responsiveslides.min.js"></script>
<script async src="js/initslides.js"></script>
    
</body>
</html>
