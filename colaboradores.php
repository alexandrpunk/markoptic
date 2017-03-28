<?php require_once( 'cms/cms.php' ); ?>

<cms:template title='Colaboradores' gallery='1'  order='7'>
    
    <cms:editable   name="gg_image"
                    label="Colaborador"
                    desc="Indica el logotipo del colaborador que quieres subir aqui"
                    show_preview='1'
                    preview_height='200'
                    type="image"
    />
    <cms:editable
                    name="gg_thumb"
                    assoc_field="gg_image"
                    label="Miniatura de la imagen"
                    desc="Miniatura de la imagen"
                    width='250'
                    height='250'
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
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="amarillo">DONADORES</div>
                    <div class="panel-body panel-body-mark">
                        <h1 class="text-center">¡Muchas Gracias!</h1>
                        <p class="text-center">Agradecemos a nuestros colaboradores por la confianza que nos dan, de mejorar la calidad de vida de personas con discapacidad.</p>
                        <center>
                        <cms:pages masterpage="colaboradores.php">
                         <img class="col" src="<cms:show gg_image />">     
                        </cms:pages>
                        </center>
                    </div>
                </div>     
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
