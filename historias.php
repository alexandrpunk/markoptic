<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Historias' clonable='1'>
    
    <cms:editable   name='nombre'
                    desc='Nombre del solicitante'
                    type='text'
    />
    
    <cms:editable   name='edad'
                    desc='Edad del solicitante'
                    validator='non_negative_integer'
                    type='text'
    />
    
    <cms:editable   name='vive'
                    desc='donde vive'
                    type='text'
    />
    
    
    <cms:editable   name='necesidad'
                    desc='Porque necesita la ayuda'
                    type='text'
    />

    <cms:editable   name='fotografia'
                    label='fotografia del solicitante'
                    desc='fotografia del solicitanten'
                    show_preview='1'
                    preview_height='200'
                    type='image'
    />
    
    <cms:editable   name="fotografia_thumb"
                    assoc_field="fotografia"
                    label="Miniatura de la fotografia"
                    desc="Miniatura de la fotografia"
                    width='150'
                    height='150'
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
                
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A LAS PERSONAS QUE NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">
                    <cms:pages masterpage='historias.php' limit='10' paginate='1'>
                        
                    <div class="postit">
                        <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="thumb-new" src="<cms:show fotografia />"></a>                
                        <a href="<cms:show k_page_link />"><h4 class="txt-mark"><cms:show k_page_title /></h4></a>
                        <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                        <p><cms:excerpt count='45' trail="&nbsp;<a href='<cms:show k_page_link />' style='font-weight: bold;'>leer mas..</a>"><cms:show contenido /></cms:excerpt></p>
                    </div>
                    <hr/>
                    
                    <cms:if k_paginated_bottom >
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark pull-right" href="<cms:show k_paginate_link_prev />">publicaciones mas recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark strong pull-left" href="<cms:show k_paginate_link_next />">publicaciones anteriores</a>
                        </cms:if>
                    </cms:if>

                    </cms:pages>

                  </div>
                </div>
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/modals.php';?>

<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

