<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='blog' clonable='1'>
    <cms:editable name='contenido' type='richtext' />
    <cms:editable name='blog_image'
                    label='Image'
                    desc='imagen para el post'
                    type='image'
    />
</cms:template>
<?php $titulo = "publicacion"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-body panel-body-mark">                
                         
                        <h1 class="txt-mark oswald"><cms:show k_page_title /></h1>
                        <p><small><strong>publicado el: <cms:date k_page_date format='j/m/Y' />.</strong></small></p>
                        
                        <hr />
                        
                        <cms:show contenido />

                    </div>
                </div>     
                <div class="pull-left print"><div id="share"></div></div>
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/lightbox.min.js"></script>
<script src="js/jssocials.min.js"></script>
        <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest"]
        });
    </script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
