<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Solicitud concluida' order='14'></cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="rosado">Solicitud Concluida</div>
                    <div class="panel-body panel-body-mark">
                    <img class="img-responsive" src="img/solicitud-concluida.svg">
                       <p class="text-center">Le agradecemos la confianza depositada en Fundación Markoptic A.C., en breve recibirá un correo donde podrá verificar su información, así como el folio con el que quedo registrada su solicitud.</p>
                        <p class="text-center"><strong>En Fundación Markoptic A.C. trabajamos por el bienestar de las personas.</strong></p>

                    </div>
                </div>
                <div style="margin:15px;"><center><a href="index" class="btn btn-success">Volver a la Pagina Principal</a></center></div>
            </div>
                            
            <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>
    
<?php require 'mod/scripts.php';?>

<script type="text/javascript" src="js/funciones.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
