<?php
include_once("solicitud.repo.php");
$id_pais = $_GET['id_pais'];
$estados = Estados($id_pais); 
?>

<option value="">Seleccioné Su Estado</option>
<?php
foreach ($estados as $e) {
?>
<option value = <?php echo $e["id"]?> > <?php echo $e["nombre"]; ?> </option>
<?php
}
?>

<?php

?>