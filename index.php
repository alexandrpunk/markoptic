<?php
require_once( 'cms/cms.php' );

$title = 'Inicio';

require 'mod/head.php';
?>

<link rel="stylesheet" href="https://npmcdn.com/flickity@1.2/dist/flickity.min.css">
</head>
<body>  
 
<?php require 'mod/navbar.php';?>

    <div class="container ">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
        
                <?php require 'mod/carrousel.php';?>

                                <!-- Solicitudes recientes-->
                <div class="panel panel-default panel-mark">
                  <div class="panel-heading panel-heading-mark" id="mark">¿A QUIÉN ESTOY AYUDANDO?</div>
                    <div class="panel-body panel-body-mark">
                    <div class="row zero">
                        
                    <div class="main-carousel">
                    <cms:pages masterpage='historias.php' limit='5' folder='NOT sin-fotografia' orderby='random'>
                        
                        <div class="carousel-cell col-md-4 col-sm-4 zero">
                        <a href="<cms:show k_page_link />" class="hist-box sombra" style="height: 326px;">

                            <img class="img-quote center-block" src="<cms:show fotografia_thumb />">
                            <h4 class="txt-mark text-center oswald text-capitalize"><cms:show k_page_title /></h4>
                            <p><strong>Edad: </strong><cms:show edad /></p>
                            <p><strong>Vive en: </strong><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                            <p><strong>Necesidad: </strong><cms:show dispositivo /> <cms:show descripcion /></p>
                          </a>
                        </div>
                    </cms:pages>
                    </div><!--fin del div del carrousel-->
                        
                    </div>

                    <hr/>
                        
                    <div class="text-center"><a class="btn btn-mark oswald" href="historias" style="font-size:1.15em">Conocer todas las historias</a></div>
                    </div>
                </div>
                
                <!-- Ultimas noticias-->
                <div class="panel panel-default panel-mark" id="Noticias">
                  <div class="panel-heading panel-heading-mark" id="cyan">NOTICIAS RECIENTES</div>
                  <div class="panel-body panel-body-mark">
                      <cms:pages masterpage='publicacion.php' limit='4'>
                          <div class="row">
                              <div class="col-md-3 col-sm-3">
                                  <a href="<cms:show k_page_link />">
                                      <img class="img-thumbnail center-block sombra" src="<cms:show publicacion_image />">
                                  </a>
                              </div>
                              <div class="col-md-9 col-sm-9">
                                  <h3 class="txt-mark oswald">
                                      <a href="<cms:show k_page_link />">
                                          <cms:show k_page_title />
                                      </a>
                                  </h3>
                                  <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                                  <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes></cms:excerpt></p>
                              </div>
                          </div>
                          <hr/>
                      </cms:pages>
                      <div class="text-center">
                            <a class="btn btn-mark oswald" style="font-size:1.15em" href="publicacion">Ver todas las noticias</a>
                        </div>
                    </div>
                </div>
            
            </div>
                
            <?php require 'mod/lateral.php';?>
                

        </div>
    </div>
    
<?php require 'mod/footer.php';?>
    

<?php require 'mod/scripts.php';?>
<script src="https://npmcdn.com/flickity@1.2/dist/flickity.pkgd.min.js"></script>


    <script type="text/javascript">
	$(document).ready(function(){
		//$("#itt").modal('show');
	});
        
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true,
        prevNextButtons: true,
        pageDots: false
    });
    </script>

    
</body>
</html>
<?php COUCH::invoke(); ?>
