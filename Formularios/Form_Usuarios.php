<?php
//index.php

include("../DataBase/database_connection.php");


$query = "SELECT *
FROM proyecto.tb_roles order by DESCRIPCION_ROL asc
";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_unidad_trabajo order by DESCRIPCION_UNIDAD asc
";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query


if(isset($_POST['submit']))
{
    if(isset($_POST['login'])) {
        $login = $_POST['login'];
    }
    if(isset($_POST['rol'])) {
        $rol = $_POST['rol'];
    }
    if(isset($_POST['unidad'])) {
        $unidad = $_POST['unidad'];
    }
    if(isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['apellido'])) {
        $apellido = $_POST['apellido'];
    }
    if(isset($_POST['fechanac'])) {
        $fechanac = $_POST['fechanac'];
    }
    if(isset($_POST['genero'])) {
        $genero = $_POST['genero'];
    }
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if(isset($_POST['clave'])) {
        $clave = $_POST['clave'];
    }

    $options = [
        'cost' => 12,
    ];

    $contra=password_hash($clave, PASSWORD_BCRYPT, $options);

    $query3 = "INSERT INTO proyecto.tb_usuarios(LOGIN,ID_ROL,ID_UNIDAD,NOMBRE,APELLIDO,FECHA_NACIMIENTO,GENERO,EMAIL,CLAVE)VALUES(:login,:rol,:unidad,:nombre,:apellido,STR_TO_DATE(:fechanac,'%m/%d/%Y'),:genero,:email,:clave)";


    $stm = $connect->prepare($query3);

    $result =$stm ->execute(array(":login"=>$login,":rol"=>$rol,":unidad"=>$unidad,":nombre"=>$nombre,":apellido"=>$apellido,":fechanac"=>$fechanac,":genero"=>$genero,":email"=>$email,":clave"=>$contra));

}

?>

<!DOCTYPE html>
<html>	
<head>
<title>Formulario de Usuarios</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Doctor Availability Form Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<!--//webfonts-->

</head>
<body>
<h1>Creacion Usuario</h1>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				
					<div id="wrapper">
							<form  method="post">
								<div class="ferry ferry-from">
									<label>Nombres:</label>
									<input type="text" name="nombre"  placeholder="Ingrese el nombre del usuario" required>
								</div>

								<div class="ferry ferry-from">
									<label>Apellidos:</label>
									<input type="text" name="apellido" placeholder="Ingrese el apellido del usuario" required>
								</div>
                                <div class="book-pag-frm1 agileits w3layouts">
                                    <label>Fecha de nacimiento:</label>
                                    <input class="date agileits w3layouts" name="fechanac" id="datepicker2" type="text" placeholder="Ingrese fecha de nacimiento" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
                                </div>
								<div class="ferry ferry-from">
									<label>Correo electronico:</label>
									<input type="text" name="email" placeholder="Ingrese correo electronico" required>
								</div>
								<div class="ferry ferry-from">
									<label>Usuario:</label>
									<input type="text" name="login" placeholder="Ingrese usuario a crear" required>
								</div>
								<div class="ferry ferry-from">
									<label>Clave del usuario:</label>
									<input type="text" name="clave" placeholder="Ingrese la clave del usuario" required>
								</div>
                                <div class="ferry ferry-from">
                                    <label>Genero:</label>
                                    <select name='genero' >
                                        <option title='Seleccione un genero' value='0'>Seleccione un genero</option>
                                        <option title='Masculino' value='M'>Masculino</option>
                                        <option title='Femenino' value='F'>Femenino</option>
                                    </select>
                                </div>
                                <div class="ferry ferry-from">
                                    <label>Rol:</label>
                                    <select name="rol" id="cbx_departamento">
                                        <option value="0">Seleccione un rol</option>
                                        <?php
                                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$row['ID_ROL'].'">'.$row['DESCRIPCION_ROL'].'</option>';
                                            //print_r($row);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="ferry ferry-from">
                                    <label>Unidad:</label>
                                    <select name="unidad" id="cbx_departamento">
                                        <option value="0">Seleccione una unidad</option>
                                        <?php
                                        while($row2=$data2->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$row2['ID_UNIDAD_TRABAJO'].'">'.$row2['DESCRIPCION_UNIDAD'].'</option>';
                                            //print_r($row);
                                        }
                                        ?>
                                    </select>
                                </div>
									<div class="wthreesubmitaits">
										<input type="submit" name="submit" id="submit"value="Crear Usuario">
                                        <input type="button" onclick="location.href='../';" value="Regresar" class="btn btn-info"/>
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