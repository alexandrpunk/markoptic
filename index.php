<?php $titulo = "Inicio"; ?>
<?php require 'mod/head.php';?>

<body>  
 
<?php require 'mod/navbar.php';?>

    <div class="container ">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9 ">
                
                <?php require 'mod/menu.php';?>
        
                <video id="video-background" autoplay controls preload="auto">
                    <source src="vid/donar.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
                    <source src="vid/donar.webm" type='video/webm; codecs="vp8, vorbis"'/>
                    <source src="vid/donar.ogv" type='video/ogg; codecs="theora, vorbis"' />
                </video>
                
                <div class="panel panel-default panel-mark ">
                    <div class="panel-heading panel-heading-mark" id="verde">CAUSAS PORQUÉ DONAR</div>
                    <div style="padding:0;" class="panel-body panel-body-mark">
                        <div class="foo-center">
                            
                        <a class="foo" id="reflex" data-toggle="modal" href="#foo1"><span>
                            <p>Dispositivos Donados a la Sociedad</p>
                            <img src="img/disp.jpg">
                            </span>
                        </a>
                            
                        <a class="foo" id="cyan" data-toggle="modal" href="#foo2"><span>
                            <p>Mejorar la Calidad <br>de Vida</p>
                            <img src="img/qualitylife.jpg">
                            </span>
                        </a>
                            
                        <a class="foo" id="militar" data-toggle="modal" href="#foo3"><span>
                            <p>Primera Fundación Tecnológica en México</p>
                            <img src="img/arm.png">
                            </span>
                        </a>
                        
                        <a class="foo" id="morado" data-toggle="modal" href="#foo4"><span>
                            <p>Desarrollo de Tecnología en Sinaloa</p>
                            <img src="img/development.jpg">
                            </span>
                        </a>
                            
                        <a id="amarillo" class="foo" data-toggle="modal" href="#foo5"><span>
                            <p>Laboratorio de Clase Mundial en Sinaloa</p>
                            <img src="img/lab.jpg">
                            </span>
                        </a> 
                            
                        <a id="naranja" class="foo" data-toggle="modal" href="#foo6"><span>
                            <p>Jóvenes en Actividades de Desarrollo Tecnológico</p>
                            <img src="img/group.jpg">
                            </span>
                        </a>
                        
                        <a id="mark" class="foo" data-toggle="modal" href="#foo7"><span>
                            <p>Oportunidad <br>de Trabajo</p>
                            <img src="img/work.jpeg">
                            </span>
                        </a>
                            
                        <a id="aqua" class="foo" data-toggle="modal" href="#foo8"><span>
                            <p>Tecnología para Donar a más Familias</p>
                            <img src="img/family.png">
                            </span>
                        </a>
                            
                        <a id="rosado" class="foo" data-toggle="modal" href="#foo9"><span>
                            <p>Se dona a quien más lo necesita</p>
                            <img src="img/charity.jpg">
                            </span>
                        </a>
                            
                        <a id="verde" class="foo" data-toggle="modal" href="#foo10"><span>
                            <p>Vinculación con las Universidades Prestigiadas</p>
                            <img src="img/university.png">
                            </span>
                        </a>
                           
                        </div>
                    </div>
                </div>     
                
                <div class="panel panel-default panel-mark" id="Noticias">
                  <div class="panel-heading panel-heading-mark" id="cyan">ULTIMAS NOTICIAS</div>
                  <div class="panel-body panel-body-mark">
                    <div class="postit">
                         <div class="postit">
                        <a data-toggle="modal" href="#noticia5"><img class="thumb-new" src="img/verano_15.png"></a>
                        <a data-toggle="modal" href="#noticia5"><h4>Verano FESE 2015</h4></a>
                        <p>Realizar un verano de innovación empresarial fue una experiencia muy gratificante, ya que uno realmente experimenta como es el mundo fuera de la escuela y que uno solo sabe lo teórico y al estar realizando mi verano pude darme cuenta que es muy diferente a la escuela,<a data-toggle="modal" href="#noticia5"> Leer Más...</a></p>                    
                    </div>
                      
                      <hr>
                      
                        <a data-toggle="modal" href="#noticia1"><img class="thumb-new" src="img/recognize_coppel.jpg"></a>
                        <a data-toggle="modal" href="#noticia1"><h4>Donaciones Recientes</h4></a>
                        <p>Agradecemos la confianza de nuestras empresas donadoras, que hacen posible alcanzar el objetivo de donar Dispositivos Médicos Tecnológicos, de acuerdo al programa “Dar Para Donar”.</p>                    
                    </div>
                      
                      <hr>
                      
                    <div class="postit">
                        <a data-toggle="modal" href="#noticia2"><img class="thumb-new" src="img/summer.jpg"></a>
                        <a data-toggle="modal" href="#noticia2"><h4>Jóvenes Emprendedores - Verano 2015</h4></a>
                        <p>Damos el banderazo por el inicio al Verano de Jóvenes Emprendedores 2015 en Fundación Markoptic A.C. el cual se llevara a cabo del 15 de junio al 31 de julio en los cuales destaca la participación del programa FESE.</p>
                    </div> 
                      
                    <hr>
                      
                    <div class="postit">
                        <a data-toggle="modal" href="#noticia3"><img class="thumb-new" src="img/cer_sw.jpg"></a>
                        <a data-toggle="modal" href="#noticia3"><h4>Certificación en SolidWorks</h4></a>
                        <p>Nos sentimos muy contentos al dar a conocer, que nuestros Jóvenes del Centro de Investigación Científica, Desarrollo Tecnológico E Innovación lograron obtener la Certificación en SolidWorks 2015 para el diseño y simulación para el desarrollo de tecnología.</p>
                    </div>
                      
                      <hr>
                      
                    <div class="postit">
                        <a data-toggle="modal" href="#noticia4"><img class="thumb-new" src="img/tax.jpg"></a>
                        <a data-toggle="modal" href="#noticia4"><h4>Recibo Deducible De Impuestos</h4></a>
                        <p>Con agrado informamos que nuestra fundación fue autorizada por el SAT para recibir donativos deducibles de impuestos en México y en el Extranjero, esto de acuerdo al Oficio: 600-04-02-2015-57527, Exp. 24369, Folio: 365660.</p>
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
    
<?php require 'mod/modals.php';?>

<?php require 'mod/scripts.php';?>
    
<script src="js/scroll.js"></script>
<script async src="js/responsiveslides.min.js"></script>
<script async src="js/initslides.js"></script>


    
</body>
</html>
