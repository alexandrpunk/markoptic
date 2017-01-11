<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Noticias' clonable='1' order='1'>
    <cms:editable name='contenido' type='richtext' toolbar='full' />
    <cms:editable name='publicacion_image'
                    label='Imagen de la publicacion'
                    desc='imagen para la pubicacion'
                    show_preview='1'
                    preview_height='200'
                    type='image'
    />
     <cms:folder name="importantes" title="importantes" />
</cms:template>

<?php require 'mod/head.php';?>

<link rel="stylesheet" href="css/jssocials.css">
<link rel="stylesheet" href="css/jssocials-theme-classic.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="https://npmcdn.com/flickity@1.2/dist/flickity.min.css">

  
<meta property="og:url"                content="<cms:show k_page_link />" />
<meta property="og:type"               content="article" />
<meta property="og:image"              content="<cms:show publicacion_image />" />
<meta property="og:description"        content="<cms:excerpt count='450'  truncate_chars='1'><cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes></cms:excerpt>" />
<meta property="fb:app_id"             content="1632168933701186" />
</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                <cms:if k_is_page >
                
                <div class="panel panel-default panel-mark">
                    <div class="panel-body panel-body-mark pub">                
                        <h1 class="txt-mark oswald"><cms:show k_page_title /></h1>
                        <p><small><strong>publicado el: <cms:date k_page_date format='j/m/Y' /></strong></small></p>
                        
                        <cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes>
                        

                    </div>
                </div>     
                <div id="share"></div>
                
                <h3>Comentarios</h3><hr />
                <div class="fb-comments" data-href="<cms:show k_page_link />" data-width="100%" data-numposts="3"></div>

                <cms:else />
                    
                <!--se muestra la lista de publicaciones-->
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="cyan">NOTICIAS</div>
                    <div  class="panel-body panel-body-mark">
                        <cms:pages masterpage='publicacion.php' limit='10' paginate='1'>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <a href="<cms:show k_page_link />"><img class="img-thumbnail center-block sombra" src="<cms:show publicacion_image />"></a>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                <h3 class="txt-mark oswald"><a href="<cms:show k_page_link />"><cms:show k_page_title /></a></h3>
                                <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                                <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:do_shortcodes><cms:show contenido /></cms:do_shortcodes></cms:excerpt></p>
                                </div>
                            </div>
                        <hr/>
                            
                    <cms:if k_paginated_bottom >
                       <hr/>
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark pull-left" href="<cms:show k_paginate_link_prev />">Publicaciones recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark strong pull-right" href="<cms:show k_paginate_link_next />">Publicaciones anteriores</a>
                        </cms:if>
                    </cms:if>
                        </cms:pages>
                    </div>
                </div>
                </cms:if>
            </div>
                        
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/lightbox.min.js"></script>
<script src="js/jssocials.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/flex.js"></script>
<script src="https://npmcdn.com/flickity@1.2/dist/flickity.pkgd.min.js"></script>

        <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "email", "pinterest"],
        });
        
        $('.carrusel').flickity({
        // options
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true,
        prevNextButtons: true,
        pageDots: false,
        imagesLoaded: true
        });
    </script>

</body>
</html>
<?php COUCH::invoke(); ?>
