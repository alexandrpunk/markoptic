<?php
require_once( 'cms/cms.php' ); 
$title = 'Galeria';
require 'mod/head.php';
?>

</head>
<body class="animated fadeIn"> 
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                <div class="panel panel-default panel-mark" style="border-top:solid 6px #09d3c5;border-bottom:solid 6px #09d3c5;">
                    <div class="panel-body panel-body-mark"> 
                    <h2  class="text-center decor-gal"><span class="decor-span">Galería Fotografica</span></h2>
                    <div class="row">
                        <cms:folders masterpage='fotografias.php' limit='3'>
                            <div class="col-md-4 col-sm-4">
                                <a class="gal-folder" href="<cms:show k_folder_link />" >
                                    <div style="background-image:url(<cms:show k_folder_image />);" class="gal-cover"></div>
                                    <h4><cms:show k_folder_title /></h4>
                                    <p><cms:show k_folder_pagecount /> Fotografias</p>      
                                </a>
                            </div>
                        </cms:folders>
                    </div>
                    <div class="text-center"><a class="btn btn-mark oswald" href="fotografias">ver la galeria fotografica completa</a></div>
                    <hr/>
                        
                    <h2 class="text-center decor-gal"><span class="decor-span">Videos</span></h2>
                    <cms:pages masterpage="videos.php" limit='3'>
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
                    </cms:pages> 
                    <div class="text-center"><a class="btn btn-mark oswald" href="videos">ver todos los videos</a></div>
                    <hr />

                    <h2 class="text-center decor-gal"><span class="decor-span">Testimonios</span></h2>  
                        <cms:pages masterpage="testimonios.php"  limit='2' >
                            <div class="row">
                                <div class="col-md-5">
                                    <iframe class="center-block" width="285" height="200" src="https://www.youtube.com/embed/<cms:show video />" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-7">
                                    <h3 class="txt-mark"><cms:show k_page_title /></h3>
                                    <p class="text-justify"><cms:show testimonio /></p>
                                </div>
                            </div>
                            <hr/>
                        </cms:pages>
                        <div class="text-center"><a class="btn btn-mark oswald" href="testimonios">ver todos los testimonios</a></div>
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

