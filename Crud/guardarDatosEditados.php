<?php

include_once "../DataBase/database_connection.php";
#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["apellido"]) ||
	!isset($_POST["sexo"]) || !isset($_POST["email"]) ||
	!isset($_POST["id"])||
    !isset($_POST["usuario"])||
    !isset($_POST["fecha"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...


$id = $_POST["id"];
$usuario = $_POST["usuario"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$sexo = $_POST["sexo"];
$email = $_POST["email"];
$fecha = $_POST["fecha"];

$sentencia = $connect->prepare("UPDATE tb_usuarios SET LOGIN = ?, NOMBRE = ?, APELLIDO = ?,FECHA_NACIMIENTO =?, GENERO = ?,EMAIL=? WHERE ID_USUARIO = ?;");
$resultado = $sentencia->execute([$usuario, $nombre, $apellidos,$fecha, $sexo,$email, $id]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados ";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario ";
?>

<a href="tabla.php" title="Ir la página anterior">Volver</a>
