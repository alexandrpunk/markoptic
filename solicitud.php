<?php
require_once("inc/solicitud.repo.php");

$paises = Paises(); 

?>
<?php $titulo = "Solicitud"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">Solicitud de Prótesis/Colchón</div>
                    <div class="panel-body panel-body-mark">    
                        <form method="POST" action="inc/solicitud.post.php" enctype="multipart/form-data" onsubmit="return funcionEnviar()">

                        <!--seccion donde selecciona la ayuda-->
                        <div class="" id="form-solicitud-seccion1">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">¿CON QUE TE PODEMOS AYUDAR?</span></h3>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="peticion" class="col-sm-3 control-label">Petición</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="peticion" id="peticion">
                                            <option value="">Seleccioné Una Opción</option>
                                            <option value="Protesis">Prótesis</option>
                                            <option value="Colchon Antiescaras">Colchón Anti-escaras</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="form-solicitud-seccion1-1">
                                    <label for="opcion_protesis" class="col-sm-3 control-label">Opciones de Prótesis</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="opcion_protesis" id="opcion_protesis">
                                            <option value="">Seleccioné Una Opción</option>
                                            <option value="Superior Izquierda">Superior Izquierda</option>
                                            <option value="Superior Derecha">Superior Derecha</option>
                                            <option value="Inferior Izquierda">Inferior Izquierda</option>
                                            <option value="Inferior Derecha">Inferior Derecha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center><a class="btn btn-lg btn-success" id="btn-cont-ss1">Continuar</a></center>
                                </div>
                            </div>
                        </div>

                        <!--Informacion del beneficiario-->
                        <div class="hidden" id="form-solicitud-seccion2">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">DATOS DEL BENEFICIARIO</span></h3>
                            <div class="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control" name="sexo" id="sexo">
                                            <option value="">Seleccioné Su Sexo</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fecha_nac">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Date">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" readonly="readonly">
                                    </div>
                                </div>

                                <center><h4 >Dirección</h4></center>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <select class="form-control" name="pais" id="pais">
                                            <option value="">Seleccioné Su País</option>
                                            <?php
                                            foreach ($paises as $p) {
                                            ?>
                                            <option value = <?php echo $p["id"]?> > <?php echo $p["nombre"]; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="">Seleccioné Su Estado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad o Localidad</label>
                                        <select class="form-control" name="ciudad" id="ciudad">
                                            <option value="">Seleccioné Su Ciudad o Localidad</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="direccion">Calle y Número</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle y Número">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="colonia">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cp">Código Postal</label>
                                        <input type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-primary btn-form" id="btn-volver-ss2">Volver</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-success btn-form" id="btn-cont-ss2">Continuar</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="hidden" id="form-solicitud-seccion3">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">AGREGAR TUTOR</span></h3>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><a class="btn btn-md btn-success" id="btn-si-ss3" style="width: 100px;">Si</a></center>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><a class="btn btn-md btn-success" id="btn-no-ss3" style="width: 100px;">No</a></center>
                                </div>
                            </div>
                        </div>

                        <!--Informacion del tutor-->
                        <div class="hidden" id="form-solicitud-seccion4">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">DATOS DEL TUTOR</span></h3>
                            <div class="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="t_nombre" name="t_nombre" placeholder="Nombre">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="t_apellido" name="t_apellido" placeholder="Apellido">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control" name="t_sexo" id="t_sexo">
                                            <option value="">Seleccioné Su Sexo</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fecha_nac">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="t_fecha_nac" name="t_fecha_nac" placeholder="Date">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="text" class="form-control" id="t_edad" name="t_edad" placeholder="Edad" readonly="readonly">
                                    </div>
                                </div>

                                <center><h4 >Dirección</h4></center>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <select class="form-control" name="t_pais" id="t_pais">
                                            <option value="">Seleccioné Su País</option>
                                            <?php
                                            foreach ($paises as $p) {
                                            ?>
                                            <option value = <?php echo $p["id"]?> > <?php echo $p["nombre"]; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="t_estado" id="t_estado">
                                            <option value="">Seleccioné Su Estado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad o Localidad</label>
                                        <select class="form-control" name="t_ciudad" id="t_ciudad">
                                            <option value="">Seleccioné Su Ciudad o Localidad</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="direccion">Calle y Número</label>
                                        <input type="text" class="form-control" id="t_direccion" name="t_direccion" placeholder="Calle y Número">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="colonia">Colonia</label>
                                        <input type="text" class="form-control" id="t_colonia" name="t_colonia" placeholder="Colonia">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cp">Código Postal</label>
                                        <input type="text" class="form-control" id="t_cp" name="t_cp" placeholder="Codigo Postal">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" id="t_telefono" name="t_telefono" placeholder="Telefono">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="t_email" name="t_email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="parentesco">Parentesco</label>
                                        <input type="text" class="form-control" id="t_parentesco" name="t_parentesco" placeholder="Parentesco">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-primary btn-form" id="btn-volver-ss4">Volver</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-success btn-form" id="btn-cont-ss4">Continuar</a></center>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <!--Informacion de porque la necesita-->
                        <div class="hidden" id="form-solicitud-seccion5">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">YA CASI TERMINAMOS</span></h3>
                            <div class="">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="porque">Cuéntanos Porque La Necesitas</label>
                                        <textarea type="textarea" class="form-control" id="porque" name="porque" placeholder="Porque la necesitas.." rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="medio_difusion">Como Supiste De Nosotros</label>
                                        <textarea type="textarea" class="form-control" id="medio_difusion" name="medio_difusion" placeholder="Como supiste de nosotros.." rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <center><h4>Envíanos Fotografías o Vídeo</h4></center>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="adjunto1">Adjunto Uno</label>
                                        <input type="file" id="adjunto1" name="adjunto1">
                                        <p class="help-block">Tamaño máximo de archivo 20 MB</p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="adjunto2">Adjunto Dos</label>
                                        <input type="file" id="adjunto2" name="adjunto2">
                                        <p class="help-block">Tamaño máximo de archivo 20 MB</p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="adjunto3">Adjunto Tres</label>
                                        <input type="file" id="adjunto3" name="adjunto3">
                                        <p class="help-block">Tamaño máximo de archivo 20 MB</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-primary btn-form" id="btn-volver-ss5">Volver</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-success btn-form" id="btn-cont-ss5">Continuar</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="hidden" id="form-solicitud-seccion6">
                            <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">TERMINOS Y CONDICIONES</span></h3>
                            <div class="">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea type="textarea" class="form-control" style="resize: none;" rows="10" readonly="true">
TERMINOS Y CONDICIONES DE USO Y PRIVACIDAD
A los Usuarios les informamos de los siguientes Términos y Condiciones de Uso y Privacidad, les son aplicables por el simple uso o acceso a cualquiera de las Páginas que integran el Portal de FUNDACIÓN MARKOPTIC A.C. (“LA PAGINA”) por lo que entenderemos que los acepta, y acuerda en obligarse en su cumplimiento.
El Usuario entendido como aquella persona que realiza el acceso mediante equipo de cómputo y/o de comunicación, conviene en no utilizar dispositivos, software, o cualquier otro medio tendiente a interferir tanto en las actividades y/u operaciones del “LA PAGINA” o en las bases de datos y/o información que se contenga en el mismo.

1. PROPIEDAD INTELECTUAL
De una parte Fundación Markoptic A.C. (FMAC) y domiciliado en la calle Frida Kahlo #2411 Norte Fraccionamiento Rincón Alameda, Culiacán, Sinaloa, México. C.P. 80020, y representada por el Lic. Manuel Humberto Gallardo Inzunza presidente de Fundación Markoptic, según lo dispuesto en el Diario Oficial de la Federación, Ley Federal del Derecho de Autor DOF 27-01-2012 y las plasmadas en la Ley de Acceso a la Información Publica del Estado de Sinaloa Capitulo Quinto del Procedimiento para el ejercicio del Derecho de Acceso a la Información Pública, Artículos 26 al 32.
FUNDACIÓN MARKOPTIC A.C. y EL BENEFICIARIO Declaran:
    EL BENEFICIARIO autoriza a FUNDACIÓN MARKOPTIC A.C., así como a todas aquellas terceras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO.
    Mi autorización tiene ámbito geográfico, determinado por lo que la institución y otras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO, en cualquier país.
    Mi autorización se refiere a la totalidad de usos que puedan tener las imágenes, o partes de las mismas, en las que aparezco, utilizando los medios técnicos conocidos en la actualidad y los que pudieran desarrollarse en el futuro, y para cualquier aplicación. Todo ello con la única salvedad y limitación de aquellas utilizaciones o aplicaciones que pudieran atentar al derecho al honor en los términos previstos en la Ley Orgánica 1/85, de 5 de Mayo, de Protección Civil al Derecho al Honor, la Intimidad Personal y familiar y a la Propia Imagen. Y al art. 87 de la Ley Federal del Derecho de Autor: “El retrato de una persona sólo puede ser usado o publicado, con su consentimiento expreso, o bien con el de sus representantes o los titulares de los derechos correspondientes. La autorización de usar o publicar el retrato podrá revocarse por quien la otorgó quién, en su caso, responderá por los daños y perjuicios que pudiera ocasionar dicha revocación. 
    Cuando a cambio de una remuneración o aún sin ella, una persona se dejare retratar, se presume que ha otorgado el consentimiento a que se refiere el párrafo anterior y no tendrá derecho a revocarlo, siempre que se utilice en los términos y para los fines pactados. 
    No será necesario el consentimiento a que se refiere este artículo cuando se trate del retrato de una persona que forme parte menor de un conjunto o la imagen sea tomada en un lugar público y con fines informativos o periodísticos. “
    Mi autorización fija límite de tiempo para su concesión y para la explotación de las imágenes, así como la pista sonora o parte de las mismas, en las que intervengo como EL BENEFICIARIO, por lo que mi autorización se considera concedida por un plazo de tiempo ilimitado para televisión y cualquier medio electrónico, incluyendo Internet, y para cualquier medio impreso.  Se considera como inicio del tiempo, una vez que la campaña tanto visual como gráfica, salga por primera vez al aire o este por primera vez en algún  medio impreso, respectivamente. 
    EL BENEFICIARIO se libera de cualquier cuestión jurídica, a FUNDACIÓN MARKOPTIC A.C., en lo establecido por el Instituto de Transparencia e Información Pública del Estado de Sinaloa, en el presente o futuro, debiendo de sujetarse a lo acordado en este contrato.
    Se considera que es GRATUITO por concepto de pago por la cesión de mis derechos de imágenes y pista sonora, aceptando estar conforme con el citado acuerdo.

2. USOS PERMITIDOS
El aprovechamiento de los Servicios y Contenidos del “LA PAGINA” es exclusiva responsabilidad del Usuario, quien en todo caso deberá servirse de ellos acorde a las funcionalidades permitidas en la propia Página y a los usos autorizados en los presentes Términos y Condiciones de Uso y Privacidad, por lo que el Usuario se obliga a utilizarlos de modo tal que no atenten contra las normas de uso y convivencia en Internet, las leyes de los Estados Unidos Mexicanos y la legislación vigente en el país en que el Usuario se encuentre al usarlos, las buenas costumbres, la dignidad de la persona y los derechos de terceros. “LA PAGINA” es para el uso individual del Usuario por lo que no podrá comercializar de manera alguna los Servicios y Contenidos.

3. CONFIDENCIALIDAD
FUNDACIÓN MARKOPTIC A.C. se obliga a mantener confidencial la información que reciba del Usuario que tenga dicho carácter conforme a las disposiciones legales aplicables, en los Estados Unidos Mexicanos.

4. MODIFICACIONES 
Reservamos el derecho a modificar esta Declaración de Privacidad en cualquier momento. Su uso continuo de cualquier porción de este sitio tras la notificación o anuncio de tales modificaciones constituirá su aceptación de tales cambios.”

5. ACEPTAR TERMINOS
Al aceptar estos Términos y Condiciones FUNDACIÓN MARKOPTIC A.C. “Implica su aceptación plena y sin reservas a todas y cada una de las disposiciones incluidas en este Aviso Legal, por lo que si usted no está de acuerdo con cualquiera de las condiciones aquí establecidas, no deberá usar u/o acceder a este sitio. Queda a disposición de los datos aquí ingresados, y no significa en ningún sentido el compromiso u obligación por parte de la organización en aceptar el seguimiento, desarrollo o fabricación de cualquier dispositivo.
Fundación Markoptic A.C. iniciará un proceso de estudio de la solicitud y se contactara con usted personalmente al momento de haber analizado y ser verificada la información proporcionada, si en caso contrario de no haber sido aceptada su solicitud será incluido a la lista de espera.
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="checkbox-inline">
                                        <input type="checkbox" id="checkbox-tyc" value="aceptyc">  Acepto los Términos y Condiciones.
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        <center><a class="btn btn-lg btn-primary btn-form" id="btn-volver-ss6">Volver</a></center>
                                    </div>
                                    <div class="col-sm-3">
                                    <center><input type="submit" value="Enviar Solicitud" class="btn btn-lg btn-success btn-form" id="btn-enviar-solicitud" disabled></center>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </form>

                    </div>
                </div>     
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>
    
<?php require 'mod/scripts.php';?>

<script type="text/javascript" src="js/funciones.js"></script>

    
</body>
</html>
