<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Proyectos' clonable='1' order='6'>
    
    <cms:editable   name='descripcion'
                    desc='descripcion del proyecto'
                    type='richtext'
    />
  
    <cms:editable   name='imagen'
                    label='imagen del proyecto'
                    desc='imagen del proyecto'
                    show_preview='1'
                    preview_height='200'
                    type='image'
    />
    
    <cms:editable   name="imagen_thumb"
                    assoc_field="imagen"
                    label="Miniatura de la imagen"
                    desc="Miniatura de la imagen"
                    width='200'
                    height='200'
                    crop='1'
                    type="thumbnail"
    />
</cms:template>
<?php require 'mod/head.php';?>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="naranja">PROYECTOS</div>
                    <div class="panel-body panel-body-mark">  
                        
                        <cms:pages masterpage="proyectos.php" limit='10' >
                            <div class="postit">
                                <a href="<cms:show imagen_thumb />" data-lightbox="image-1"><img class="thumb-new pull-left" src="<cms:show imagen_thumb />"></a>
                                <h2 class="txt-mark"><cms:show k_page_title /></h2>
                                <p><cms:show descripcion/></p>
                            </div>
                            <hr/>
            
                        </cms:pages> 

                    </div>
                </div>     
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script async src="js/lightbox.min.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
