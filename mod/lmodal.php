<!-- Modal contacto -->
<div class="modal fade" id="contacto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header modal-mark">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contacto</h4>
                </div>
                <form action="inc/contacto.post.php" method="POST" class="form" accept-charset="utf-8" role="form">
                <div class="modal-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Nombre" class="form-control" id="c_nombre" name="c_nombre" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Apellido" class="form-control" id="c_apellido" name="c_apellido" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="tel" placeholder="Teléfono" class="form-control" id="c_telefono" name="c_telefono" ></div>
                                </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" placeholder="Correo Electrónico" class="form-control" id="c_correo" name="c_correo" required=""></div>
                                </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Dejanos tu comentario..." rows="4" id="c_comentario" name="c_comentario" required="" style="resize: none;"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input id="submit" type="submit" name="submit" class="btn btn-success" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="contacto-success-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ENHORABUENA!!</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <center><h4>Tu comentario fue enviado satisfactoriamente.</h4></center>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contacto-error-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Ocurrió un error error, intenta enviar el comentario mas tarde</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="vinculo" tabindex="-1" role="dialog" aria-labelledby="Vinculación con las Universidades Prestigiadas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-mark modal-verde">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="foo10">Vinculación con las Universidades Prestigiadas</h4>
      </div>
        <div class="modal-body">
            <img class="img-responsive center-block" src="img/universidades.jpg">
            <p class="news">La gran diversidad educativa con la que cuenta México hoy en día, nos permite tener vinculación con diferentes instituciones las cuales son:</p>
            <ul class="news">
                <li>Instituto Tecnológico de Culiacán</li>
                <li>Universidad de Occidente</li>
                <li>Universidad Autónoma de Sinaloa</li>
                <li>Universidad Politécnica de Sinaloa</li>
                <li>Benemérita Universidad Autónoma de Puebla.</li>
            </ul>
<p class="news">Y contar con la valiosa participación de maestros y doctores que gozan de gran reconocimiento en las áreas que representan.</p>
      </div>
    </div>
  </div>
</div>
