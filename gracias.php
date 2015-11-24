<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Gracias' order='16'></cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="aqua">Gracias por tu Donación</div>
                    <div class="panel-body panel-body-mark">    
                    <img class=" grat center-block img-responsive" src="img/gracias.svg">
                    <h2 class="pacificoh">Tu donación nos ayudara a hacer la diferencia en la vida de las personas que lo necesitan.</h2>
                    </div>
                </div>     
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
        
<?php require 'mod/scripts.php';?>
    
</body>
</html>
<?php COUCH::invoke(); ?>
