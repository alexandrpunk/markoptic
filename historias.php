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
    <cms:folder name="sin-fotografia" title="sin fotografia" />
    <cms:config_list_view searchable='1' />
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
                    <cms:set image="<cms:php> 
                        $len = strlen($_SERVER['HTTP_HOST'])+8;
                        $str='<cms:show fotografia />';
                        $str = substr($str, $len);
                        if(file_exists($str)){echo '<cms:show fotografia />';}else{echo 'img/placeholder.jpg';}
                    </cms:php>" />
                            
                    <cms:set thumb="<cms:php> 
                        $len = strlen($_SERVER['HTTP_HOST'])+8;
                        $str='<cms:show fotografia />';
                        $str = substr($str, $len);
                        if(file_exists($str)){echo '<cms:show fotografia_thumb />';}else{echo 'img/placeholder.jpg';}
                    </cms:php>" />
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <div  class="panel-body panel-body-mark">
                        <div class="row hist-box sombra">
                               
                                <div class="col-md-4 col-sm-4">
                                    <a href="<cms:show image />" data-lightbox="image-1">
                                        <img src="<cms:show thumb />" class="img-thumbnail center-block sombra">
                                    </a>
                                    <h3 class="text-capitalize text-center"><strong><cms:show k_page_title /></strong></h3>                             
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <dl class="dl-horizontal">
                                        <dt  class="txt-mark">Solicitó:</dt>
                                        <dd class="txt-gris"><i><cms:show dispositivo /> <cms:show descripcion /></i></dd>
                                    
                                        <dt class="txt-mark">Edad:</dt>
                                        <dd class="txt-gris"><i><cms:show edad /></i></dd>
                                        
                                        <dt class="txt-mark">Vive en:</dt>
                                        <dd class="txt-gris"><i><cms:show ciudad />, <cms:show estado />, <cms:show pais/></i></dd>
                                        
                                        <dt class="txt-mark">¿Por qué lo necesita?</dt>
                                        <dd class="txt-gris text-lowercase"><i><cms:show necesidad /></i></dd>
                                    </dl>
                                    <div class="text-center" style="margin-top:10px;">
                                        <a href="" class="btn btn-success oswald" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_title />', '<cms:show k_page_id />')" data-target="#solicitar_email" >
                                            Apadrinar
                                        </a>
                                    </div>
                                </div>
                                
                        </div>
                    
                    </div>
                </div>
                        
                <cms:else />
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A QUIENES NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">                    
                    <cms:pages masterpage='historias.php' limit='5' paginate='1'>
                            <cms:set image="<cms:php> 
                            $len = strlen($_SERVER['HTTP_HOST'])+8;
                            $str='<cms:show fotografia />';
                            $str = substr($str, $len);
                            if(file_exists($str)){echo '<cms:show fotografia />';}else{echo 'img/placeholder.jpg';}
                            </cms:php>" />
                            
                            <cms:set thumb="<cms:php> 
                            $len = strlen($_SERVER['HTTP_HOST'])+8;
                            $str='<cms:show fotografia />';
                            $str = substr($str, $len);
                            if(file_exists($str)){echo '<cms:show fotografia_thumb />';}else{echo 'img/placeholder.jpg';}
                            </cms:php>" />

                            <div class="row hist-box sombra">
                                <div class="col-md-4 col-sm-4">
                                    <a href="<cms:show image />" data-lightbox="image-1">
                                        <img src="<cms:show thumb />" class="img-thumbnail center-block sombra">
                                    </a>
                                    <h3 class="text-capitalize text-center"><strong><cms:show k_page_title /></strong></h3>                             
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <dl class="dl-horizontal">
                                        <dt  class="txt-mark">Solicitó:</dt>
                                        <dd class="txt-gris"><i><cms:show dispositivo /> <cms:show descripcion /></i></dd>
                                    
                                        <dt class="txt-mark">Edad:</dt>
                                        <dd class="txt-gris"><i><cms:show edad /></i></dd>
                                        
                                        <dt class="txt-mark">Vive en:</dt>
                                        <dd class="txt-gris"><i><cms:show ciudad />, <cms:show estado />, <cms:show pais/></i></dd>
                                        
                                        <dt class="txt-mark">¿Por qué lo necesita?</dt>
                                        <dd class="txt-gris text-lowercase scroll-box"><i><cms:show necesidad /></i></dd>
                                    </dl>
                                    <div class="text-center" style="margin-top:10px;">
                                        <a class="btn btn-primary oswald" href="<cms:show k_page_link />" role="button">
                                            Conoce la historia
                                        </a> 
                                        <a href="" class="btn btn-success oswald" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_title />', '<cms:show k_page_id />')" data-target="#solicitar_email" >
                                            Apadrinar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                    <cms:if k_paginated_bottom >
                       <hr/>
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark oswald pull-left" href="<cms:show k_paginate_link_prev />">Historias recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark oswald strong pull-right" href="<cms:show k_paginate_link_next />">Historias anteriores</a>
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
                                <dd>Banco Bajio</dd>
                                <dt>Nombre:</dt>
                                <dd>Fundación Markoptic A.C.</dd>
                                <dt>Cuenta:</dt>
                                <dd>0155513280201</dd>
                            </dl>
                    </section>
                    <section id="transferencia" class="modal-rosado" style="color:#F05B6F;">
                        <h2 class="oswald"><a href="#transferencia">Transferencia Electrónica <i class="fa fa-credit-card" aria-hidden="true"></i></a></h2>
                        <p class="txt-gris">Si deseas hacer tu donativo mediante Transferencia Electrónica Bancaria los datos son los siguientes.</p>
                            <dl class="txt-gris text-center">
                                <dt>Banco:</dt>
                                <dd>Banco Bajio</dd>
                                <dt>Nombre:</dt>
                                <dd>Fundación Markoptic A.C.</dd>
                                <dt>CLABE:</dt>
                                <dd>030730900007328992</dd>
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
    
</body>
</html>
<?php COUCH::invoke(); ?>

