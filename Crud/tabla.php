<?php
include_once "../DataBase/database_connection.php";
$sentencia = $connect->query("SELECT * 
        FROM tb_usuarios 
        inner join
        tb_roles  
        on
        tb_usuarios.ID_ROL = tb_roles.ID_ROL
        inner join 
        tb_unidad_trabajo 
        on
        tb_usuarios.ID_UNIDAD= tb_unidad_trabajo.ID_UNIDAD_TRABAJO");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tabla</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
                                <th class="column1">ID</th>
                                <th class="column2" >Usuario</th>
                                <th class="column3">Nombre</th>
                                <th class="column4">Apellido</th>
                                <th class="column5">Fecha de Nacimiento</th>
                                <th class="column6">Género</th>
                                <th class="column1">Email</th>
                                <th class="column2">Editar</th>
                                <th class="column3">Eliminar</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach($personas as $persona){ ?>
                            <tr>
                                <td class="column1"><?php echo $persona->ID_USUARIO ?></td>
                                <td class="column2"><?php echo $persona->LOGIN ?></td>
                                <td class="column3"><?php echo $persona->NOMBRE ?></td>
                                <td class="column4"><?php echo $persona->APELLIDO ?></td>
                                <td class="column5"><?php echo $persona->FECHA_NACIMIENTO ?></td>
                                <td class="column6"><?php echo $persona->GENERO?></td>
                                <td class="column1"><?php echo $persona->EMAIL ?></td>
                                <td class="column2"><a href="<?php echo "update.php?id=" . $persona->ID_USUARIO?>">Editar</a></td>
                                <td class="column3"><a href="<?php echo "eliminar.php?id=" . $persona->ID_USUARIO?>">Eliminar</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <div align="right">
                        <a href="../index.php" title="Ir al inicio" style="color:rgb(255,255,255);" ><b>Volver</b></a>
                    </div>

				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>