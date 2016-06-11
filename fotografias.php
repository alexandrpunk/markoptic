<?php require_once( 'cms/cms.php' ); ?>

<cms:template title='Fotografias' gallery='1' order='3' dynamic_folders='1'>
    
    <cms:editable   name="gg_image"
                    label="Imagen"
                    desc="Indica la imagen que quieres subir aqui"
                    show_preview='1'
                    preview_height='200'
                    type="image"
    />

    <cms:editable
                    name="gg_thumb"
                    assoc_field="gg_image"
                    label="Miniatura de la imagen"
                    desc="Miniatura de la imagen"
                    width='250'
                    height='250'
                    crop='1'
                    type="thumbnail"
    />
</cms:template>
<?php require 'mod/head.php';?>

</head>
<body class="animated fadeIn"> 
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                <div class="panel panel-default panel-mark ">
                    <div class="panel-heading panel-heading-mark" id="aqua">GALERIA FOTOGRAFICA</div>
                    <div class="panel-body panel-body-mark"> 
                        <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Eventos</span></h2>  
                        <div class="row">
                            <cms:folders>
                                <div class="col-md-4 col-sm-4">
                                    <a class="gal-folder sombra" href="<cms:show k_folder_link />" >
                                        <div>
                                            <img class="img-responsive" src="<cms:show k_folder_image />" />
                                            <h4><cms:show k_folder_title /></4>
                                            <p><cms:show k_folder_pagecount /> Fotografias</p>
                                        </div>
                                    </a>
                                </div>
                            </cms:folders>
                        </div>
                        <hr />
                    </div>
                </div> 
            </div>

                <?php require 'mod/lateral.php';?>

        </div>

    </div>
    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
        
</body>
</html>
<?php COUCH::invoke(); ?>

