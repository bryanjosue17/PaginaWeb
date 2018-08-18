<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../DataBase/database_connection.php";
$sentencia = $connect->prepare("SELECT * 
        FROM tb_usuarios 
        inner join
        tb_roles  
        on
        tb_usuarios.ID_ROL = tb_roles.ID_ROL
        inner join 
        tb_unidad_trabajo 
        on
        tb_usuarios.ID_UNIDAD= tb_unidad_trabajo.ID_UNIDAD_TRABAJO WHERE ID_USUARIO = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
    #No existe
    echo "¡No existe alguna persona con ese ID!";
    exit();
}

#Si la persona existe, se ejecuta esta parte del código
?>
<!DOCTYPE html>
<html>	
<head>
<title>Catalogo Proyectos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<!--//webfonts-->

</head>
<body>
<h1>Catalogos de Proyectos</h1>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				
					<div id="wrapper">

                        <form method="post" action="guardarDatosEditados.php">
                            <!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
                            <input type="hidden" name="id" value="<?php echo $persona->ID_USUARIO; ?>">

								<div id="login" class="animate w3layouts agileits form">
								<div class="ferry ferry-from">
                                    <label for="usuario">Usuario:</label>
                                    <input value="<?php echo $persona->LOGIN ?>" name="usuario" required type="text" id="usuario" placeholder="Escribe tu usuario...">
									</div>
									<div class="tickets">
									<div class="ferry ferry-from">
                                        <label for="nombre">Nombre:</label>
                                        <input value="<?php echo $persona->NOMBRE ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre...">
									</div>
									<div class="ferry ferry-from">
                                        <label for="apellidos">Apellidos:</label>
                                        <input value="<?php echo $persona->APELLIDO ?>" name="apellido" required type="text" id="apellidos" placeholder="Escribe tus apellidos...">
									</div>
									<div class="ferry ferry-from">
                                        <label for="fecha">Fecha de Nacimiento:</label>
                                        <input value="<?php echo $persona->FECHA_NACIMIENTO ?>" name="fecha" required type="text" id="fecha" placeholder="Escribe tu fecha de nacimiento...">
                                    </div>
                                        <div class="ferry ferry-from">
                                            <label>Genero:</label>
                                            <select name="sexo" required name="sexo" id="sexo">
                                                <!--
                                                Para seleccionar una opción con defecto, se debe poner el atributo selected.
                                                Usamos el operador ternario para que, si es esa opción, marquemos la opción seleccionada
                                                 -->
                                                <option value="">--Selecciona--</option>
                                                <option <?php echo $persona->GENERO === 'M' ? "selected='selected'": "" ?> value="M">Masculino</option>
                                                <option <?php echo $persona->GENERO === 'F' ? "selected='selected'": "" ?> value="F">Femenino</option>
                                            </select>
                                        </div>
                                        <div class="ferry ferry-from">
                                            <label>Email:</label>
                                            <input value="<?php echo $persona->EMAIL ?>" name="email" required type="text" id="email" placeholder="Ingresa tu email...">
                                        </div>

									<div class="wthreesubmitaits">
                                        <input type="submit" value="Guardar cambios">

									</div>
								</div>
								</form>


						</div>
			</div>
		</div>
		<div class="w3lsfooteragileits">
			<p> Copyright &copy; Primer Proyecto Desarrollo Web</p>
		</div>
		<!-- Necessary-JavaScript-Files-&-Links -->
			<!-- Date-Picker-JavaScript -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script  src="js/jquery-ui.js"></script>	
<script  src="js/wickedpicker.js"></script>
				<script type="text/javascript">
					$(function() {
						$( "#datepicker,#datepicker1,#datepicker2" ).datepicker();
					});
				</script>
				
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>


			<!-- //Date-Picker-JavaScript -->
		<!-- //Necessary-JavaScript-Files-&-Links -->
	

</body>
</html>