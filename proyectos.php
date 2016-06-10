<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Proyectos' clonable='1' order='6'>
    
    <cms:editable   name='descripcion'
                    desc='descripcion del proyecto'
                    type='richtext'
                    toolbar='full'
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
                
                <cms:if k_is_page >
                
                <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-body panel-body-mark pub">                
                        <h1 class="txt-mark oswald"><cms:show k_page_title /></h1>
                        <p><small><strong>publicado el: <cms:date k_page_date format='j/m/Y' /></strong></small></p>
                        
                        <cms:do_shortcodes><cms:show descripcion /></cms:do_shortcodes>
                        

                    </div>
                </div>     
                <cms:else />
                    
                <!--se muestra la lista de publicaciones-->
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="naranja">PROYECTOS</div>
                    <div  class="panel-body panel-body-mark">
                        <cms:pages masterpage='proyectos.php' limit='5' paginate='1'>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <a href="<cms:show k_page_link />"><img class="img-thumbnail center-block sombra" src="<cms:show imagen />"></a>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                <h3 class="txt-mark oswald"><a href="<cms:show k_page_link />"><cms:show k_page_title /></a></h3>
                                <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                                <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:do_shortcodes><cms:show descripcion /></cms:do_shortcodes></cms:excerpt></p>
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
    
<script async src="js/lightbox.min.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
