<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Galeria' order='8'></cms:template>
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
                                <iframe class="center-block" width="285" height="200" src="https://www.youtube.com/embed/<cms:show video />" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-7">
                                <h3 class="txt-mark"><cms:show k_page_title /></h3>
                                <p class="text-justify"><cms:show testimonio /></p>
                            </div>
                            </div>
                            <hr/>
                        </cms:pages>
                        <center><h4 class="txt-mark oswald" ><a class="txt-mark"  href="testimonios">ver todos los testimonios</a></h4></center>
                    <cms:ignore>
                    <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Galería Fotografica</span></h2>                         <ul class="row image-list">

<cms:folders masterpage='fotografias.php'>
    <img src="<cms:show k_folder_image />">
    <a href="<cms:show k_folder_link />"><cms:show k_folder_title /></a> <br>
</cms:folders>
                        </ul>
                        <hr/></cms:ignore>
                        
                        <h2 style="margin:10px 8%;" class="text-center decor-gal"><span class="decor-span">Videos</span></h2>

                            <cms:pages masterpage="videos.php" limit='3' >
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
                            <center><h4 class="txt-mark oswald" ><a class="txt-mark"  href="videos">ver todos los videos</a></h4></center>
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

