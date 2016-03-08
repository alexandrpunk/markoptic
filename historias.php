<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Historias' clonable='1' order='2'>
      
    <cms:editable   name='edad'
                    desc='Edad del solicitante'
                    validator='non_negative_integer'
                    type='text'
                    order='1'
    />
    
    <cms:editable   name='ciudad'
                    desc='ciudad donde vive'
                    type='text'
                    order='2'
    />
    
    <cms:editable   name='estado'
                    desc='estado donde vive'
                    type='text'
                    order='3'
    />
    
    <cms:editable   name='pais'
                    desc='pais donde vive'
                    type='text'
                    order='4'
    />
    
    <cms:editable   name='dispositivo'
                    desc='Que dispositivo necesita'
                    type='text'
                    order='5'
    />
    
    <cms:editable   name='descripcion'
                    desc='descripcion del dispositivo solicitado'
                    type='textarea'
                    order='6'
    />
        
    <cms:editable   name='necesidad'
                    desc='Porque necesita la ayuda'
                    type='textarea'
                    order='7'
    />
    
    <cms:editable   name='fotografia'
                    label='fotografia del solicitante'
                    desc='fotografia del solicitanten'
                    show_preview='1'
                    preview_height='200'
                    type='image'
                    order='8'
    />
    
    <cms:editable   name="fotografia_thumb"
                    assoc_field="fotografia"
                    label="Miniatura de la fotografia"
                    desc="Miniatura de la fotografia"
                    width='170'
                    height='170'
                    crop='1'
                    type="thumbnail"
                    order='9'
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
                <cms:if k_is_page >
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <div  class="panel-body panel-body-mark">
                        <div class="well sombra" style="margin:0;">
                            <div class="row">
                                <div class="col-md-3">
                                <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="<cms:show fotografia_thumb />"></a>
                                </div>
                                <div class="col-md-9">
                                    <label class="txt-mark">Nombre:</label><p><strong><cms:show k_page_title /></strong></p>
                                    <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                    <label class="txt-mark">Vive en:</label><p><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                                    <label class="txt-mark">Solicito:</label><p class="text-justify"><i><cms:show dispositivo /></i></p>
                                    <label class="txt-mark">Descripcion de su necesidad:</label><p class="text-justify"><i><cms:show descripcion /></i></p>
                                    <label class="txt-mark">¿Por que lo necesita?:</label><p class="text-justify"><i><cms:show necesidad /></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        
                    <cms:else />
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A QUIENES NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">                    
                    <cms:pages masterpage='historias.php' limit='10' paginate='1'>
                        <div class="row">
                            <div class="col-md-3">
                            <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block" src="<cms:show fotografia_thumb />"></a>
                            </div>
                            <div class="col-md-9">
                                    <div class="well">
                                    <label class="txt-mark">Nombre:</label><p><strong><cms:show k_page_title /></strong></p>
                                    <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                    <label class="txt-mark">Vive en:</label><p><cms:show vive /></p>
                                    <label class="txt-mark">Necesidad:</label><p class="text-justify"><i><cms:show necesidad /></i></p>
                                    </div>
                                
                            </div>
                        </div> 
                    <hr/>
                    
                    <cms:if k_paginated_bottom >
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark pull-left" href="<cms:show k_paginate_link_prev />">publicaciones mas recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark strong pull-right" href="<cms:show k_paginate_link_next />">publicaciones anteriores</a>
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
    
<?php require 'mod/modals.php';?>

<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

