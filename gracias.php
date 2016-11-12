<?php
session_start();

$title = 'Gracias por tu aportacion';

/*if(!$_SESSION['donativo_valido']){
    header('Location: /');   
}
$_SESSION['donativo_valido'] = FALSE;*/

require 'mod/head.php';
?>

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
                        <h1 class="bitter text-center">¡Gracias por tu donativo!</h1>
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

