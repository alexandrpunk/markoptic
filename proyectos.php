<?php $titulo = "Nuestros Proyectos"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="naranja">PROYECTOS</div>
                    <div class="panel-body panel-body-mark">                
  
                    <div class="postit">
                        <a href="img/arm.png" data-lightbox="image-1"><img class="thumb-new" src="img/thumb/thumb-arm.jpg"></a>
                        <h2 class="txt-mark">Prótesis de Miembro superior</h2>
                        <p>Es un dispositivo que permite regresar a una persona algunos de los movimientos naturales, de un brazo amputado.</p>
                    </div>
                        
                        <hr>
                        
                    <div class="postit">
                        <a href="img/mattress.jpg" data-lightbox="image-1"><img class="thumb-new" src="img/thumb/thumb-mattress.jpg"></a>
                        <h2 class="txt-mark">Colchón Inflable Automatizado</h2>
                        <p>Es un dispositivo innovador, para evitar neumonía y ulceras en la piel en pacientes postrados.</p>
                    </div>
                        <hr>
                        
                    <div class="postit">
                        <a href="img/car.jpg" data-lightbox="image-1"><img class="thumb-new" src="img/thumb/thumb-car.jpg"></a>
                        <h2 class="txt-mark">Mini Carro</h2>
                        <p>Es un dispositivo que ofrece movilidad urbana a personas en silla de ruedas.</p>
                    </div>

                    </div>
                </div>     
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script async src="js/lightbox.min.js"></script>
    
</body>
</html>
