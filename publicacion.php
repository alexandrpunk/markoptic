<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Publicaciones' clonable='1' dynamic_folders='1'>
    <cms:editable name='contenido' type='richtext' />
    <cms:editable name='publicacion_image'
                    label='Imagen de la publicacion'
                    desc='imagen para la pubicacion'
                    show_preview='1'
                    preview_height='200'
                    type='image'
    />
</cms:template>

<?php require 'mod/head.php';?>

<link rel="stylesheet" href="css/jssocials.css">
<link rel="stylesheet" href="css/jssocials-theme-classic.css">
</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-body panel-body-mark pub">                
                        <h1 class="txt-mark oswald"><cms:show k_page_title /></h1>
                        <p><small><strong>publicado el: <cms:date k_page_date format='j/m/Y' /></strong></small></p>
                        
                        <cms:show contenido />

                    </div>
                </div>     
                <div id="share"></div>
                
                <h3>Comentarios</h3><hr />
                <div class="fb-comments" data-href="<cms:show k_page_link />" data-width="100%" data-numposts="3"></div>
            </div>
                        
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/lightbox.min.js"></script>
<script src="js/jssocials.min.js"></script>
        <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "email", "pinterest"],
            url: "<cms:show k_page_link />",
            text: "<hola mundi mundo mudno mudno mudnidnsodaiewqnfaifd"
        });
    </script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
