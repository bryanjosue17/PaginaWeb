<?php
include("../DataBase/database_connection.php");

$id_departamento = $_POST['id_departamento'];

$queryM = "SELECT tb_cat_municipios.ID_MUNICIPIO,
    tb_cat_municipios.DESCRIPCION_MUNICIPIO,
    tb_cat_municipios.ID_DEPARTAMENTO
FROM proyecto.tb_cat_municipios where ID_DEPARTAMENTO ='$id_departamento' ORDER BY tb_cat_municipios.DESCRIPCION_MUNICIPIO";
$data = $connect->prepare($queryM);    // Prepare query for execution
$data->execute();// Execute (run) the query

$html= "<option value='0'>Seleccionar Municipio</option>";

while($rowM=$data->fetch(PDO::FETCH_ASSOC))
{
    $html.= "<option value='".$rowM['ID_MUNICIPIO']."'>".$rowM['DESCRIPCION_MUNICIPIO']."</option>";
}

echo $html;
?>
