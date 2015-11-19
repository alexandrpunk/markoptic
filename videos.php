<?php require_once( 'cms/cms.php' ); ?>

<cms:template title='Videos' clonable='1'  order='4'>
    <cms:editable   name='descripcion'
                    desc='descripcion del video'
                    type='richtext'
    />
    <cms:editable   name='video'
                    desc='colocar el codigo del video del testimonio'
                    type='text'
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
                    <div class="panel-heading panel-heading-mark" id="aqua">GALERIA DE VIDEOS</div>
                    <div class="panel-body panel-body-mark">            
                            <cms:pages masterpage="videos.php" limit='8' paginate='1'>
                                <div class="row">
                                    <div class="col-md-5">
                                       <iframe class="center-block" width="285" height="200" src="https://www.youtube.com/embed/<cms:show video />" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-md-7">
                                        <h3 class="txt-mark"><cms:show k_page_title /></h3>
                                        <cms:show descripcion />
                                    </div>
                                </div>
                                <hr/>
                                <cms:if k_paginated_bottom >
                                    <cms:if k_paginate_link_prev >
                                        <a class="btn btn-md btn-mark pull-right" href="<cms:show k_paginate_link_prev />">videos recientes</a>
                                    </cms:if>
                                    <cms:if k_paginate_link_next >
                                        <a class="btn btn-md btn-mark strong pull-left" href="<cms:show k_paginate_link_next />">videos anteriores</a>
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
    
<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
        
</body>
</html>
<?php COUCH::invoke(); ?>

