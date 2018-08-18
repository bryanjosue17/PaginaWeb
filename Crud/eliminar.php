<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../DataBase/database_connection.php";
$sentencia = $connect->prepare("DELETE FROM TB_USUARIOS WHERE ID_USUARIO = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente ";
else echo "Algo salió mal ";
?>
<a href="tabla.php" title="Ir la página anterior">Volver</a>

