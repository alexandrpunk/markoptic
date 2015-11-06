<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Galeria' order='1'></cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="aqua">GALERÍA</div>
                     <div class="panel-body panel-body-mark"> 
                         
                    <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Testimonios</span></h2>         
                        <cms:pages masterpage="testimonios.php"  limit='2' >
                            <div class="row">
                            <div class="col-md-5">
                               <cms:show video />
                            </div>
                            <div class="col-md-7">
                                <h3 class="txt-mark"><cms:show nombre /></h3>
                                <p class="text-justify"><cms:show testimonio /></p>
                            </div>
                            </div>
                            <hr/>
                        </cms:pages>

                    <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Galería Fotografica</span></h2>                         <ul class="row image-list">
                            <cms:pages masterpage="fotografias.php" limit='17' >
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                            <a href="<cms:show gg_image />" data-lightbox="image-1"><img src="<cms:show gg_thumb />"></a>
                            </li>
                            </cms:pages>
                        </ul>
                    <hr/>
                        
                        <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Videos</span></h2>

                            <cms:pages masterpage="videos.php" limit='3' >
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

