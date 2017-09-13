<?php
session_start();
require_once( 'cms/cms.php' );
require_once("inc/solicitud.repo.php");
$paises = Paises(); 
?>

<cms:template title='Historias' clonable='1' order='2'>
    <cms:config_list_view searchable='1' />      
    <cms:editable   name='edad'
                    desc='Edad del solicitante'
                    validator='non_negative_integer'
                    type='text'
                    order='1'
    />
    
    <cms:editable   name='ciudad'
                    desc='ciudad donde vive'
                    type='text'
                    order='2'
    />
    
    <cms:editable   name='estado'
                    desc='estado donde vive'
                    type='text'
                    order='3'
    />
    
    <cms:editable   name='pais'
                    desc='pais donde vive'
                    type='text'
                    order='4'
    />
    
    <cms:editable   name='dispositivo'
                    desc='Que dispositivo necesita'
                    type='text'
                    order='5'
    />
    
    <cms:editable   name='descripcion'
                    desc='descripcion del dispositivo solicitado'
                    type='textarea'
                    order='6'
    />
        
    <cms:editable   name='necesidad'
                    desc='Porque necesita la ayuda'
                    type='textarea'
                    order='7'
    />
    
    <cms:editable   name='fotografia'
                    label='fotografia del solicitante'
                    desc='fotografia del solicitanten'
                    show_preview='1'
                    preview_height='200'
                    type='image'
                    order='8'
    />
    
    <cms:editable   name="fotografia_thumb"
                    assoc_field="fotografia"
                    label="Miniatura de la fotografia"
                    desc="Miniatura de la fotografia"
                    width='170'
                    height='170'
                    crop='1'
                    type="thumbnail"
                    order='9'
    />
    <cms:folder name="sin-fotografia" title="sin fotografia" />
    <cms:config_list_view searchable='1' />
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
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <cms:if k_is_page >                    
                    <div class="panel-heading panel-heading-mark text-uppercase" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <cms:else />
                    <div class="panel-heading panel-heading-mark" id="rosado">
                        CONOCE A QUIENES NECESITAN TU APOYO
                        <span class="pull-right filter-switch"  data-toggle="collapse" data-target="#demo">
                          <i class="fa fa-search"></i>
                        </span>
                    </div>
                    
                    <!--panel de busqueda    -->
                    <div id="demo" class="filter-panel collapse">
                        <p>Filtrar las historias por:</p>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="ciudad">Pais</label>
                                <select class="form-control" name="pais" id="pais">
                                    <option value="">Seleccioné su País</option>
                                    <?php
                                        foreach ($paises as $p) {
                                        echo'<option value ='.$p["id"].' >'.$p["nombre"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                            
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-control" name="estado" id="estado" disabled>
                                    <option value="">Seleccioné su Estado</option>
                                </select>
                            </div>
                            </div>
                            
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="pais">Ciudad</label>
                                <select class="form-control" name="ciudad" id="ciudad" disabled>
                                    <option value="">Seleccioné su Ciudad o Localidad</option>
                                 </select>
                            </div>
                            </div>
                            
                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="solicitud">Tipo de Solicitud</label>
                                <select id="solicitud" class="form-control">
                                    <option value="">Selecioné el tipo de Solicitud</option>
                                    <option value="Protesis">Protesis</option>
                                    <option value="Colchon Antiescaras">Colchon Antiescaras</option>
                                </select>
                            </div>
                            </div>
                            <button id="buscar" class="btn btn-info oswald" onclick="filtrar();" disabled>Filtrar Historias</button>
                    </div>
                    <!--termina panel de busqueda-->    
                    </cms:if>
                        <div  class="panel-body panel-body-mark">   
                        <cms:if k_is_page >
                            <cms:embed 'body-historias.php' />
                        <cms:else />
                            <cms:search />
                            <cms:if k_search_query >                       
                                <cms:search masterpage='historias.php' limit='5' paginate='1' orderby='publish_date' order='desc'>
                                    <cms:embed 'body-historias.php' />
                                </cms:search>
                            <cms:else />
                                <cms:pages masterpage='historias.php' limit='5' paginate='1' orderby='publish_date' order='desc'>
                                    <cms:embed 'body-historias.php' />
                                </cms:pages>
                            </cms:if>
                        </cms:if>                        
                        </div>
                    </div>
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

<?php require 'mod/footer.php';?>

<!-- moda de solicitud de email -->
<div class="modal fade" id="solicitar_email" tabindex="-1" role="dialog" aria-labelledby="Correo electronico del padrino">
    <div class="modal-dialog modal-content" role="document">
        <div class="modal-header modal-mark modal-morado text-center" ><h4 class="zero oswald">Apadrina la historia de <span class='nombre_hist'>&nbsp;</span></h4></div>
        <div class="modal-body" id="preregistro"> 
            
            <p class="txt-gris">Gracias por su interés en apadrinar la historia de <strong><span class='nombre_hist'>&nbsp;</span></strong>, para inciar el proceso primero debe proporcionarnos su nombre y correo electrónico.</p>
            
            <form method="post" id="registro" action="inc/solicitar.php">
                <div class="form-group">
                    <label class="control-label"  for="correo">Correo Electronico:</label>
                    <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo@electronico" required  onblur="verificar()">
                </div>
                <div class="form-group">
                    <label class="control-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" autofocus name="nombre" placeholder="Nombre completo" required>
                </div>
                <input class="btn btn-success oswald" type="submit" id="btn-siguiente" value="Siguiente" disabled>
            </form>            
        </div>
        
        <div style="display:none;" id="info" class="modal-body">
            <h4 class="text-center oswald">¿Qué debo hacer para apadrinar esta historia?</h4>
            <p class="txt-gris">Tu donativo puede ayudar a mejorar una vida, si quieres apadrinar esta historia primero debes realizar un donativo mediante alguna de las tres formas que te mencionamos a continuación.</p>
        
                <article class="accordion">
                    <section id="deposito" class="modal-verde" style="color:#63c62f;">
                        <h2 class="oswald"><a href="#deposito">Depósito <i class="fa fa-money" aria-hidden="true"></i></a></h2>
                        <p class="txt-gris text-center">Puedes hacer tu donativo mediante depósito en efectivo o cheque en nuestra cuenta bancaria (las donaciones en efectivo solo serán recibidas mediante depósito bancario):</p>
                            <dl class="txt-gris text-center">
                                <dt>Banco:</dt>
                                <dd>Citibanamex</dd>
                                <dt>Nombre:</dt>
                                <dd>Fundación Markoptic A.C.</dd>
                                <dt>Cuenta:</dt>
                                <dd>7007 3742542</dd>
                            </dl>
                    </section>
                    <section id="transferencia" class="modal-rosado" style="color:#F05B6F;">
                        <h2 class="oswald"><a href="#transferencia">Transferencia Electrónica <i class="fa fa-credit-card" aria-hidden="true"></i></a></h2>
                        <p class="txt-gris">Si deseas hacer tu donativo mediante Transferencia Electrónica Bancaria los datos son los siguientes.</p>
                            <dl class="txt-gris text-center">
                                <dt>Banco:</dt>
                                <dd>Citibanamex</dd>
                                <dt>Nombre:</dt>
                                <dd>Fundación Markoptic A.C.</dd>
                                <dt>CLABE:</dt>
                                <dd>002730700737425429</dd>
                            </dl>
                    </section>
                    <section id="paypal" class="modal-cyan" style="color:#25AAE3;">
                        <h2 class="oswald"> <a href="#paypal">Paypal <i class="fa fa-cc-paypal" aria-hidden="true"></i></a></h2>
                        <p class="txt-gris text-center">También puedes hacer tu donativo a través de Paypal, solo debe hacer clic en el siguiente enlace.</p>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="YDDHME7ZN8YRL">
                            <input class="center-block" style="margin-bottom:5px;" type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </section>
                </article>
            
            <h4 class="text-center oswald">Ya hice mi donativo, ¿Qué hago ahora?</h4>
            <p class="txt-gris">Una vez hecho el donativo solo haz click en el siguiente enlace para llenar el formulario de apadrinamiento, además podrás solicitar un recibo deducible de impuestos en caso de necesitarlo.</p>
            
            <div class="text-center">
                <a id="rlink" class="btn btn-success oswald">Apadrinar a <span class='nombre_hist'>&nbsp;</span></a>
            </div>
            
            <p class="txt-gris text-center" style="margin:5px 0 0;"><small><strong>Nota: </strong>Hemos enviado esta información a tu correo electrónico para que puedas consultarla, si no lo ves en tu bandeja de entrada revisa el spam o el correo no deseado.</small></p>
        </div>
    </div>
</div>

<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
<script src="js/donar.js"></script>
    
<script>
function filtrar() {
    var a = '';
    if($("#pais").val()) {
        a += $("#pais option:selected").html()+'+';   
    }
    if($("#estado").val()) {
        a += $("#estado option:selected").html()+'+';   
    }
    if($("#ciudad").val()) {
        a += $("#ciudad option:selected").html()+'+';   
    }
    if($("#solicitud").val()) {
        a += $("#solicitud option:selected").html();   
    }
    //http://www.yoursite.com/search.php?s=hello+world
    var search = window.location.hostname+'/historias?s='+a;
    console.log(search);
    
    
    window.location.href="http://"+search;

}
$(document).ready(function() {
    $('#pais').change(function(){
    	$("#estado").empty();
		var id_pais= document.getElementById("pais").value;
		$('#estado').load('inc/estados.php?id_pais='+id_pais);
        $("#ciudad").empty();
        $('#ciudad').append($('<option>', {
            value: '',
            text: 'Seleccioné su Ciudad o Localidad'
        }));
        $('#estado').removeAttr('disabled');
        $('#ciudad').attr('disabled', 'disabled');
        $('#buscar').removeAttr('disabled');
	});

	$('#estado').change(function(){
		document.getElementById("ciudad").disabled = true;
		var id_estado= document.getElementById("estado").value;
        $("#ciudad").empty();
		$('#ciudad').load('inc/localidades.php?id_estado='+id_estado);
		$('#ciudad').removeAttr('disabled');
		$('#buscar').removeAttr('disabled');
	});
    
    $('#solicitud').change(function(){
		$('#buscar').removeAttr('disabled');
	});
})    

</script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

