<?php
include_once("solicitud.repo.php");
$id_estado = $_GET['id_estado'];
$localidades = Localidades($id_estado); 

echo '<option value="">Seleccioné su Ciudad o Localidad</option>';
foreach ($localidades as $l) {
echo'<option value ='.$l["id"].' >'.$l["nombre"].'</option>';
}
?>