<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Incio' order='10'></cms:template>
<?php require 'mod/head.php';?>
</head>
<body>  
 
<?php require 'mod/navbar.php';?>

    <div class="container ">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                <audio id="player" src="audio/spot.mp3"></audio>
        
                <?php require 'mod/carrousel.php';?>
                
                <div class="panel panel-default panel-mark ">
                    <div class="panel-heading panel-heading-mark" id="verde">¿PORQUÉ DONAR?</div>
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
                
                                <!-- Solicitudes recientes-->
                <div class="panel panel-default panel-mark">
                  <div class="panel-heading panel-heading-mark" id="rosado">¿A QUIÉN ESTOY AYUDANDO?</div>
                    <div class="panel-body panel-body-mark">
                    <div class="row zero">
                    <cms:pages masterpage='historias.php' limit='3'>
                        <div class="col-md-4 col-sm-4 well" style="margin-bottom:0;">
                            <img class="img-quote center-block" src="<cms:show fotografia_thumb />">
                            <h4 class="txt-mark text-center oswald"><cms:show k_page_title /></h4>
                                <p class="quote"><cms:show necesidad /></p>
                        </div>
                    </cms:pages>
                    </div>

                        <hr/>
                        
                        <center><h4 class="txt-mark oswald" ><a class="txt-mark"  href="historias">Conocer todas las historias</a></h4></center>
                    </div>
                </div>
                
                <!-- Ultimas noticias-->
                <div class="panel panel-default panel-mark" id="Noticias">
                  <div class="panel-heading panel-heading-mark" id="cyan">NOTICIAS RECIENTES</div>
                  <div class="panel-body panel-body-mark">
                    <cms:pages masterpage='publicacion.php' limit='4'>
                    <div class="postit">
                        <a href="<cms:show k_page_link />"><img class="thumb-new pull-left" src="<cms:show publicacion_image />"></a>
                        <h4 class="txt-mark"><a  href="<cms:show k_page_link />"><cms:show k_page_title /></a></h4>
                        <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                        <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:show contenido /></cms:excerpt></p>
                    </div>
                    <hr/>
                    </cms:pages>
                    <center><h4 class="txt-mark oswald" ><a class="txt-mark"  href="noticias">Ver todas las noticias</a></h4></center>

                    </div>
                </div>
            
            </div>
                
            <?php require 'mod/lateral.php';?>
                

        </div>
    </div>
    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/modals.php';?>

<?php require 'mod/scripts.php';?>

    <script type="text/javascript">
	$(document).ready(function(){
		$("#itt").modal('show');
	});
</script>

<script src="js/audio.js"></script>

<?php require 'mod/checkCookie.php';?>
    
</body>
</html>
<?php COUCH::invoke(); ?>
