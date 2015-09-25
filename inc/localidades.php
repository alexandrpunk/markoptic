<?php
include_once("solicitud.repo.php");
$id_estado = $_GET['id_estado'];
$localidades = Localidades($id_estado); 
?>

<option value="">Seleccioné Su Ciudad o Localidad</option>
<?php
foreach ($localidades as $l) {
?>
<option value = <?php echo $l["id"]?> > <?php echo $l["nombre"]; ?> </option>
<?php
}
?>

<?php

?>