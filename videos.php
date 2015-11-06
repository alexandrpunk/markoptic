<?php require_once( 'cms/cms.php' ); ?>

<cms:template title='Videos' clonable='1'  order='3'>
    <cms:editable   name='titulo'
                    desc='titulo del video'
                    type='text'
    />
    
    <cms:editable   name='descripcion'
                    desc='descripcion del video'
                    type='textarea'
                    no_xss_check='1'
    />
    <cms:editable   name='video'
                    desc='colocar el codigo del video del testimonio'
                    type='textarea'
                    no_xss_check='1'
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
                        <div class="row">
                            <cms:pages masterpage="videos.php" limit='8' paginate='1'>
                                <div class="row">
                                <div class="col-md-5">
                                   <cms:show video />
                                </div>
                                <div class="col-md-7">
                                    <h3 class="txt-mark"><cms:show titulo /></h3>
                                    <p class="text-justify"><cms:show descripcion /></p>
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

