<?php require_once( 'cms/cms.php' ); ?>
<?php $titulo = "Inicio"; ?>
<?php require 'mod/head.php';?>

<body>  
 
<?php require 'mod/navbar.php';?>

    <div class="container ">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9 ">
                
                <?php require 'mod/menu.php';?>
        
                <?php require 'mod/carrousel.php';?>
                
                <div class="panel panel-default panel-mark ">
                    <div class="panel-heading panel-heading-mark" id="verde">CAUSAS PORQUÉ DONAR</div>
                    <div style="padding:0;" class="panel-body panel-body-mark">
                        <div class="foo-center">
                            
                        <a class="foo" id="reflex" data-toggle="modal"href="#" data-target="#foo1"><span>
                            <p>Dispositivos Donados a la Sociedad</p>
                            <img src="img/disp.jpg">
                            </span>
                        </a>
                            
                        <a class="foo" id="cyan" data-toggle="modal" href="#" data-target="#foo2"><span>
                            <p>Mejorar la Calidad <br>de Vida</p>
                            <img src="img/qualitylife.jpg">
                            </span>
                        </a>
                            
                        <a class="foo" id="militar" data-toggle="modal" href="#" data-target="#foo3"><span>
                            <p>Primera Fundación Tecnológica en México</p>
                            <img src="img/arm.png">
                            </span>
                        </a>
                        
                        <a class="foo" id="morado" data-toggle="modal" href="#" data-target="#foo4"><span>
                            <p>Desarrollo de Tecnología</p>
                            <img src="img/development.jpg">
                            </span>
                        </a>
                            
                        <a id="amarillo" class="foo" data-toggle="modal" href="#" data-target="#foo5"><span>
                            <p>Laboratorio de Clase Mundial</p>
                            <img src="img/lab.jpg">
                            </span>
                        </a> 
                            
                        <a id="naranja" class="foo" data-toggle="modal" href="#" data-target="#foo6"><span>
                            <p>Jóvenes en Actividades de Desarrollo Tecnológico</p>
                            <img src="img/group.jpg">
                            </span>
                        </a>
                        
                        <a id="mark" class="foo" data-toggle="modal" href="#" data-target="#foo7"><span>
                            <p>Oportunidad <br>de Trabajo</p>
                            <img src="img/work.jpeg">
                            </span>
                        </a>
                            
                        <a id="aqua" class="foo" data-toggle="modal" href="#" data-target="#foo8"><span>
                            <p>Tecnología para Donar a más Familias</p>
                            <img src="img/family.png">
                            </span>
                        </a>
                            
                        <a id="rosado" class="foo" data-toggle="modal" href="#" data-target="#foo9"><span>
                            <p>Se Dona a Quien más lo Necesita</p>
                            <img src="img/charity.jpg">
                            </span>
                        </a>
                            
                        <a id="verde" class="foo" data-toggle="modal" href="#" data-target="#foo10"><span>
                            <p>Vinculación con las Universidades Prestigiadas</p>
                            <img src="img/university.png">
                            </span>
                        </a>
                           
                        </div>
                    </div>
                </div>     
                
                <div class="panel panel-default panel-mark" id="Noticias">
                  <div class="panel-heading panel-heading-mark" id="cyan">ULTIMAS NOTICIAS</div>
                  <div class="panel-body panel-body-mark">

                    <div class="postit">
                        <a data-toggle="modal" href="#" data-target="#noticia9"><img class="thumb-new" src="img/ben_1.jpg"></a>
                        <a data-toggle="modal" href="#" data-target="#noticia9"><h4>Conociendo a: Adoniram Abimelec Castro López</h4></a>
                        <p>Adoniram actualmente es estudiante de tercer grado de la carrera de licenciatura de educación física en la UAS, proveniente de la cuidad de Los Mochis, logra venir a Culiacán a estudiar la universidad al recibir una beca de estudio que le fue otorgado por su activa participación en eventos de personas con capacidades diferentes.<a data-toggle="modal" href="#noticia9"> Leer Más...</a></p>                    
                    </div>

                    <hr>
                      
                    <button class="btn btn-mark btn-block"><strong>ver todas las noticias</strong></button>

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

<?php require 'mod/checkCookie.php';?>
    
</body>
</html>
<?php COUCH::invoke(); ?>
