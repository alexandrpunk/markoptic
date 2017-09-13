<?php
include_once("solicitud.repo.php");
$id_pais = $_GET['id_pais'];
$estados = Estados($id_pais); 

echo '<option value="">Seleccioné su Estado</option>';
foreach ($estados as $e) {
echo'<option value ='.$e["id"].' >'.$e["nombre"].'</option>';
}
?>