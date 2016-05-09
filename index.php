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
                <!--<audio id="player" src="audio/spot.mp3"></audio>-->
        
                <?php require 'mod/carrousel.php';?>

                                <!-- Solicitudes recientes-->
                <div class="panel panel-default panel-mark">
                  <div class="panel-heading panel-heading-mark">¿A QUIÉN ESTOY AYUDANDO?</div>
                    <div class="panel-body panel-body-mark">
                    <div class="row zero">
                    <cms:pages masterpage='historias.php' limit='3'>
                        <div class="col-md-4 col-sm-4 well" style="margin-bottom:0;">
                            <img class="img-quote center-block" src="<cms:show fotografia_thumb />">
                            <h4 class="txt-mark text-center oswald"><a href="<cms:show k_page_link />"><cms:show k_page_title /></a></h4>
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
                        <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes></cms:excerpt></p>
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
		//$("#itt").modal('show');
	});
</script>

<!--<script src="js/audio.js"></script>-->

<?php require 'mod/checkCookie.php';?>
    
</body>
</html>
<?php COUCH::invoke(); ?>
