<?php $titulo = "Noticias"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="cyan">LISTA DE SOLICITANTES</div>
                    <div  class="panel-body panel-body-mark"> 

                    <div class="postit">  
                        <table border="0">
                            <tr>
                                <td rowspan="5"><img class="thumb-new" src="img/ben_1.jpg"></td>
                                <td valign="top"><a data-toggle="modal"><strong>Nombre:</strong></a></td>
                                <td valign="top">Adoniram Abimelec Castro López.</td>
                            </tr>
                            <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Edad:</strong></a></td>
                                <td valign="top">21 años.</td>
                            </tr>
                            <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Vive en:</strong></a></td>
                                <td valign="top">Los Mochis, Sinaloa, México.</td>
                            </tr>
                             <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Necesidad:&nbsp;</strong></a></td>
                                <td valign="top">Desde mi nacimiento nací con mi mano derecha hasta el codo, para mi es indispensable para mi desenvolvimiento mejor en las tareas domésticas, personales.</td>
                            </tr>
                             <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Mensaje:</strong></a></td>
                                <td valign="top">Adoniram actualmente es estudiante de tercer grado de la carrera de licenciatura de educación física en la UAS, proveniente de la cuidad de Los Mochis, logra venir a Culiacán a estudiar la universidad al recibir una beca de estudio que le fue otorgado por su activa participación en eventos de personas con capacidades diferentes.</td>
                            </tr>
                        </table>
                    </div>

                    <hr>

                    <div class="postit">  
                        <table border="0">
                            <tr>
                                <td rowspan="5"><img class="thumb-new" src="img/ben_2.jpg"></td>
                                <td valign="top"><a data-toggle="modal"><strong>Nombre:</strong></a></td>
                                <td valign="top">Sergio Arturo Santos Cabrera.</td>
                            </tr>
                            <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Edad:</strong></a></td>
                                <td valign="top">29 años.</td>
                            </tr>
                            <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Vive en:</strong></a></td>
                                <td valign="top">Culiacán, Sinaloa, México.</td>
                            </tr>
                             <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Necesidad:&nbsp;</strong></a></td>
                                <td valign="top">Es una herramienta indispensable para mi desarrollo personal y profesional, llega a facilitar mis tareas como Papa y pilar económico en mi familia.</td>
                            </tr>
                             <tr>
                                <td valign="top"><a data-toggle="modal"><strong>Mensaje:</strong></a></td>
                                <td valign="top">Sergio Santos con 29 años de edad actualmente reside en la ciudad de Culiacán, Sinaloa junto con su esposa y un hijo. A la edad de 11 años sufrió un accidente por electricidad el cual provoco la amputación de ambas manos; desde entonces y por cuestiones económicas él se vio en la necesidad de utilizar prótesis de pinza con las cueles solo puede realizar tareas básicas laboral y personalmente.</td>
                            </tr>
                        </table>
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
