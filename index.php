<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Inicio' order='10'></cms:template>
<?php require 'mod/head.php';?>
</head>
<body>  
 
<?php require 'mod/navbar.php';?>

    <div class="container ">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                <cms:ignore><audio id="player" src="audio/spot.mp3"></audio></cms:ignore>
        
                <?php require 'mod/carrousel.php';?>

                                <!-- Solicitudes recientes-->
                <div class="panel panel-default panel-mark">
                  <div class="panel-heading panel-heading-mark">¿A QUIÉN ESTOY AYUDANDO?</div>
                    <div class="panel-body panel-body-mark">
                    <div class="row zero">
                    <cms:pages masterpage='historias.php' limit='3' folder='NOT sin-fotografia'>
                        
                        <div class="col-md-4 col-sm-4 zero">
                        <a href="<cms:show k_page_link />" class="hist-box sombra" style="height: 326px;">

                            <img class="img-quote center-block" src="<cms:show fotografia_thumb />">
                            <h4 class="txt-mark text-center oswald text-capitalize"><cms:show k_page_title /></h4>
                            <p><strong>Edad: </strong><cms:show edad /></p>
                            <p><strong>Vive en: </strong><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                            <p><strong>Necesidad: </strong><cms:show dispositivo /> <cms:show descripcion /></p>
                          </a>
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
                        <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes></cms:excerpt></p>
                    </div>
                    <hr/>
                    </cms:pages>
                    <center><h4 class="txt-mark oswald" ><a class="txt-mark"  href="publicacion">Ver todas las noticias</a></h4></center>

                    </div>
                </div>
            
            </div>
                
            <?php require 'mod/lateral.php';?>
                

        </div>
    </div>
    
<?php require 'mod/footer.php';?>
    

<?php require 'mod/scripts.php';?>

    <cms:ignore><script type="text/javascript">
	$(document).ready(function(){
		$("#itt").modal('show');
	});
</script></cms:ignore>

<!--<script src="js/audio.js"></script>-->

<?php require 'mod/checkCookie.php';?>
    
</body>
</html>
<?php COUCH::invoke(); ?>
