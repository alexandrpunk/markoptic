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
                        <div class="row">
                            <cms:if k_is_folder>
                                <cms:pages folder=k_folder_name>
                                    <div class="col-md-3 col-sm-3">
                                        <a  href="<cms:show gg_image />" data-lightbox="image-1" >
                                            <img class="img-responsive img-thumbnail" src="<cms:show gg_thumb />">
                                        </a>
                                    </div>
                                </cms:pages>
                            <cms:else />
                                <cms:folders limit='2'>
                                    <div class="col-md-4 col-sm-4">
                                        <a class="gal-folder sombra" href="<cms:show k_folder_link />" >
                                            <div style="background-image:url(<cms:show k_folder_image />);" class="gal-cover"></div>
                                            <h4><cms:show k_folder_title /></h4>
                                            <p><cms:show k_folder_pagecount /> Fotografias</p>      
                                        </a>
                                    </div>
                                    
                                    <cms:if k_paginated_bottom >
                                        <hr/>
                                        <cms:if k_paginate_link_prev >
                                            <a class="btn btn-md btn-mark oswald pull-left" href="<cms:show k_paginate_link_prev />">Fotografias recientes</a>
                                        </cms:if>
                                        <cms:if k_paginate_link_next >
                                            <a class="btn btn-md btn-mark oswald strong pull-right" href="<cms:show k_paginate_link_next />">Fotografias anteriores</a>
                                        </cms:if>
                                    </cms:if>
                                </cms:folders>
                            </cms:if>
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

