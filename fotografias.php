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
                <div class="panel-heading panel-heading-mark" id="aqua">
                    <a class="pull-left" href="#" onClick="history.go(-1);return true;">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> regresar
                    </a>
                    GALERIA FOTOGRAFICA<cms:if k_is_folder>: <cms:show k_folder_title /></cms:if>
                </div>
                    <div class="panel-body panel-body-mark">
                        <cms:if k_is_folder>
                            <cms:pages folder=k_folder_name>
                                <div class="col-md-3 col-sm-3 col-xs-6 zero gal-item">
                                    <a href="<cms:show gg_image />" data-lightbox="image-1" >
                                        <img class="center-block img-responsive img-thumbnail sombra" src="<cms:show gg_thumb />">
                                    </a>
                                </div>
                            </cms:pages>
                        <cms:else />                            
                            <cms:folders hierarchical = '1' paginate = '1' limit='9'>
                                <cms:if k_paginator_required >
                                <div class="row">
                                </cms:if>
                                <div class="col-md-4 col-sm-4">
                                    <a class="gal-folder" href="<cms:show k_folder_link />" >
                                        <div style="background-image:url(<cms:show k_folder_image />);" class="gal-cover"></div>
                                        <h4><cms:show k_folder_title /></h4>
                                        <p><cms:show k_folder_pagecount /> Fotografias</p>      
                                    </a>
                                </div>                                    
                            <cms:if k_paginated_bottom >
                                <cms:if k_paginator_required >
                                </div>
                                <hr/>
                                </cms:if>                                        
                                    <cms:if k_paginate_link_prev >
                                        <a class="btn btn-success oswald pull-left" href="<cms:show k_paginate_link_prev />">Fotografias recientes</a>
                                    </cms:if>
                                    <cms:if k_paginate_link_next >
                                        <a class="btn btn-success oswald pull-right" href="<cms:show k_paginate_link_next />">Fotografias anteriores</a>
                                    </cms:if>
                            </cms:if>
                            </cms:folders>
                        </cms:if>
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

