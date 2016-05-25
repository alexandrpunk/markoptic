<?php
session_start();
require_once( 'cms/cms.php' );
?>

<cms:template title='Historias' clonable='1' order='2'>
      
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
</cms:template>
<?php require 'mod/head.php';?>

</head>
<body>
<cms:editable type='message' name='admin_navlinks' dynamic='default_data' order='-100'>cms_navlinks.html</cms:editable>
<?php require 'mod/navbar.php';?>
    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                <cms:if k_is_page >
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <div  class="panel-body panel-body-mark">
                       
                        <div class="well sombra" style="margin:0;">
                            <div class="row">
                               
                                <div class="col-md-3 col-sm-3">
                                <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="<cms:show fotografia_thumb />"></a>
                                <cms:ignore>
                                <a href="" class="btn-pad" id="cyan" data-toggle="modal" OnClick="setinfo('<cms:show k_page_id />', '<cms:show k_page_title />')" data-target="#solicitar_email">Apadrinar</a>
                                </cms:ignore>
                                </div>
                                
                                <div class="col-md-9 col-sm-9">
                                    <label class="txt-mark">Nombre:</label><p><strong><cms:show k_page_title /></strong></p>
                                    <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                    <label class="txt-mark">Vive en:</label><p><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                                    <label class="txt-mark">Solicito:</label><p class="text-justify"><i><cms:show dispositivo /></i></p>
                                    <label class="txt-mark">Descripcion de su necesidad:</label><p class="text-justify"><i><cms:show descripcion /></i></p>
                                    <label class="txt-mark">¿Por que lo necesita?:</label><p class="text-justify"><i><cms:show necesidad /></i></p>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                        
                    <cms:else />
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A QUIENES NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">                    
                    <cms:pages masterpage='historias.php' limit='10' paginate='1'>
                        <div class="well sombra">
                            <div class="row">
                               
                                <div class="col-md-4 col-sm-4">
                                <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="<cms:show fotografia_thumb />"></a>
                                <p class="text-capitalize"><strong><cms:show k_page_title /></strong></p>
                                <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                <label class="txt-mark">Vive en:</label><p><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                                <label class="txt-mark">Solicito:</label><p class="text-justify "><i><cms:show dispositivo /> <cms:show descripcion /></i></p>
                                    
                                <cms:ignore>
                                <a href="" class="btn-pad" id="cyan" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_id />', '<cms:show k_page_title />')" data-target="#solicitar_email" >Apadrinar</a>
                                </cms:ignore>
                                    
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <label class="txt-mark">¿Por que lo necesita?:</label><p class="text-justify text-lowercase scroll-box"><i><cms:show necesidad /></i></p>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    
                    <cms:if k_paginated_bottom >
                       <hr/>
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark pull-left" href="<cms:show k_paginate_link_prev />">Historias recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark strong pull-right" href="<cms:show k_paginate_link_next />">Historias anteriores</a>
                        </cms:if>
                    </cms:if>
                    </cms:pages>
                    </div>
                    </div>
                    </cms:if>
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>

<!-- moda de solicitud de email -->
<div class="modal fade" id="solicitar_email" tabindex="-1" role="dialog" aria-labelledby="Correo electronico del padrino">
    <div class="modal-dialog modal-content" role="document">
        <div class="modal-header modal-mark modal-morado text-center" ><strong><h4 class="zero oswald">Apadrina la historia de <span id='nombre'>&nbsp;</span></h4></strong></div>
        <div class="modal-body">
        <h4 class="text-center oswald">¿Qué debo hace para apadrinar esta historia?</h4>
        <p class="news">Tu donativo puede ayudar a mejorar una vida, si quieres apadrinar esta historia primero debes realizar un donativo mediante alguna de las tres formas que te mencionamos a continuacion.</p>
        
            <article class="accordion">
                <section id="deposito" class="modal-verde" style="color:#63c62f;">
                    <h2 class="oswald"><a href="#deposito">Deposito <i class="fa fa-money" aria-hidden="true"></i></a></h2>
                     <p class="news">Si desea hacer su donativo mediante depósito en efectivo o cheque a nombre de Fundación Markoptic AC puede hacerlo en nuestra Cuenta autorizada en <strong>Banamex 7007-3742542</strong> (Las Donaciones en efectivo solo serán recibidas mediante depósito Bancario).</p>
                </section>
                <section id="transferencia" class="modal-rosado" style="color:#F05B6F;">
                    <h2 class="oswald"><a href="#transferencia">Trasnferencia Electronica <i class="fa fa-credit-card" aria-hidden="true"></i></a></h2>
                    <p class="news">Si desea hacernos llegar su donativo mediante Transferencia Bancaria Electrónica nuestra <strong>Clabe Interbancaria</strong> es <strong>002730700737425429</strong> en Banamex.</p>
                </section>
                <section id="paypal" class="modal-cyan" style="color:#25AAE3;">
                    <h2 class="oswald"> <a href="#paypal">Paypal <i class="fa fa-cc-paypal" aria-hidden="true"></i></a></h2>
                    <p class="news">En caso de que usted cuente con una cuenta PayPal y desee hacernos llegar su donativo por este medio, solo debe hacer clic en el siguiente botón.</p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="YDDHME7ZN8YRL">
                    <input class="center-block" style="margin-bottom:5px;" type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </section>
            </article>
            
            <h4 class="text-center oswald">Ya hice mi donativo, ¿qué hago ahora?</h4>
            <p class="news">Una vez hecho el donativo ingresa tu correo electronico para que llenes el formulario de apadrinamiento, ademas podras solicitar un recbo deducible de impuestos en caso de necesitarlo.</p>
            <form id="donar">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                     <input onload="focusOnInput()" type="email" name="correo_donador" id="correo_donador" class="form-control" placeholder="Correo Electronico" required  maxlength="255" autofocus autocomplete="off">
                </div>                
                <center><button type="submit" id="donar" class="btn btn-mark" style="margin-top:10px;" name="donar"><strong>Apadrinar esta historia</strong></button></center>
            </form>       
      </div>
    </div>
</div>


<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
<script src="js/donar.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

