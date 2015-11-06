<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Noticias'></cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="cyan">NOTICIAS</div>
                    <div  class="panel-body panel-body-mark">
                    <cms:pages masterpage='publicacion.php' limit='10' paginate='1'>
                    <div class="postit">
                        <a href="<cms:show k_page_link />"><img class="thumb-new" src="<cms:show publicacion_image />"></a>
                        <h4 class="txt-mark"><a  href="<cms:show k_page_link />"><cms:show k_page_title /></a></h4>
                        <p><small>Publicado el: <cms:date k_page_date format='j-m-Y'/></small></p>
                        <p><cms:excerpt count='450'  truncate_chars='1' trail="&nbsp;<a href='<cms:show k_page_link />' class='badge btn-mark'>leer mas..</a>"><cms:show contenido /></cms:excerpt></p>
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

<script src="js/scroll.js"></script>
<script async src="js/responsiveslides.min.js"></script>
<script async src="js/initslides.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

