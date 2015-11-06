<?php require_once( 'cms/cms.php' ); ?>

<cms:template title='Fotografias' gallery='1'  order='2'>
    
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
                        <ul class="image-list">
                        <cms:pages masterpage="fotografias.php" limit='42' paginate='1'>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                <a href="<cms:show gg_image />" data-lightbox="image-1"><img src="<cms:show gg_thumb />"></a>
                            </li>
                            
                            <cms:if k_paginated_bottom >
                                    <cms:if k_paginate_link_prev >
                                        <a class="btn btn-md btn-mark pull-right" href="<cms:show k_paginate_link_prev />">fotografias recientes</a>
                                    </cms:if>
                                    <cms:if k_paginate_link_next >
                                        <a class="btn btn-md btn-mark strong pull-left" href="<cms:show k_paginate_link_next />">fotografias anteriores</a>
                                    </cms:if>
                                </cms:if>
                        </cms:pages>
                        </ul>
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

