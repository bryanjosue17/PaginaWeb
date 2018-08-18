<?php
//index.php
session_start();
if(!isset($_SESSION["use"]))
{
    header("location: ../login.php");
}

include("../DataBase/database_connection.php");


$query = "SELECT tb_cat_departamento.ID_DEPARTAMENTO,
    tb_cat_departamento.DESCRIPCION_DEPARTAMENTO
FROM proyecto.tb_cat_departamento order by
DESCRIPCION_DEPARTAMENTO asc";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_desarrolladores";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query

if(isset($_POST['submit']))
{
    if(isset($_POST['proyecto'])) {
        $proyecto = $_POST['proyecto'];
    }
    if(isset($_POST['latitud'])) {
        $latitud = $_POST['latitud'];
    }
    if(isset($_POST['longitud'])) {
        $longitud = $_POST['longitud'];
    }
    if(isset($_POST['montog'])) {
        $montog = $_POST['montog'];
    }

    if(isset($_POST['montos'])) {
        $montos = $_POST['montos'];
    }
    if(isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
    }
    if(isset($_POST['info'])) {
        $info = $_POST['info'];
    }
    if(isset($_POST['cbx_departamento'])) {
        $departamento = $_POST['cbx_departamento'];
    }
    if(isset($_POST['cbx_municipio'])) {
        $municipio= $_POST['cbx_municipio'];
    }
    if(isset($_POST['desarrolladores'])) {
        $desarrolladores= $_POST['desarrolladores'];
    }

    $query3 = "INSERT INTO proyecto.tb_cat_proyectos
(ID_MUNICIPIO_PROYECTO,
ID_DESARROLLADOR,
NOMBRE_PROYECTO,
LONGITUD_PROYECTO,
LATITUD_PROYECTO,
MONTO_APROXIMADO_PROYECTO,
MONTO_SOLICITADO_PROYECTO,
FECHA_INICIO_TRABAJOS,
INFORMACION_ADICIONAL)

VALUES(?,?,?,?,?,?,?,STR_TO_DATE(?,'%m/%d/%Y'),?)";

    $stm = $connect->prepare($query3);

    $stm->execute(array($_POST['cbx_municipio'],
        $_POST['desarrolladores'],$_POST['proyecto'],
        $_POST['longitud'],$_POST['latitud'],
        $_POST['montog'],$_POST['montos'],
        $_POST['fecha'],$_POST['info']));

    header("Location: ../aprobado.php");

}

?>

<!DOCTYPE html>
<html>	
<head>
<title>Formulario Creacion de Proyectos</title>
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
<h1>Formulario Creacion de Proyectos</h1>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				
					<div id="wrapper">
							<form action="#" method="post"  >
								<div id="login" class="animate w3layouts agileits form">
								<div class="ferry ferry-from">
										<label>Nombre del Proyecto:</label>
										<input type="text" name="proyecto" id="proyecto"placeholder="Ingrese nombre del proyecto" required>
									</div>
									<div class="tickets">
									<div class="ferry ferry-from">
										<label>Longitud del Proyecto:</label>
										<input type="text" name="longitud" id="longitud" placeholder="Ingrese longitud de la ubicacion" required>
									</div>
									<div class="ferry ferry-from">
										<label>Latitud del Proyecto:</label>
										<input type="text" name="latitud" placeholder="Ingrese latitud de la ubicacion" required>
									</div>
									<div class="ferry ferry-from">
										<label>Monto Aproximado A Gastar:</label>
										<input type="text" name="montog" placeholder="Ingrese monto a gastar" required>
									</div>
                                        <div class="ferry ferry-from">
                                            <label>Monto Solicitado A Gastar:</label>
                                            <input type="text" name="montos" placeholder="Ingrese monto a gastar" required>
                                        </div>
									</div>
									<div class="book-pag agileits w3layouts">

										<div class="book-pag-frm1 agileits w3layouts">
											<label>Fecha A Realizarse:</label>
											<input class="date agileits w3layouts" name="fecha"id="datepicker2" type="text" value="Ingrese fecha estimada" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
										</div>

                                        <div class="ferry ferry-from">
                                            <label>Informacion Adicional:</label>
                                            <input type="text" name="info" id="info"placeholder="Ingrese nombre del proyecto" required>
                                        </div>

                                        <div class="ferry ferry-from">
                                            <label>Desarrollador:</label>
                                            <select name="desarrolladores" >
                                                <option value="0">Seleccione un desarrollador</option>
                                                <?php
                                                while($row2=$data2->fetch(PDO::FETCH_ASSOC)){
                                                    echo '<option value="'.$row2['ID_DESARROLLADOR'].'">'.$row2['NOMBRE_DESARROLLADOR'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="ferry ferry-from">
                                            <label>Departamento:</label>
                                            <select name="cbx_departamento" id="cbx_departamento">
                                                <option value="0">Seleccionar Departamento</option>
                                                <?php
                                                while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                                    echo '<option value="'.$row['ID_DEPARTAMENTO'].'">'.$row['DESCRIPCION_DEPARTAMENTO'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="ferry ferry-from">
                                            <label>Municipio:</label>
                                            <select name="cbx_municipio" id="cbx_municipio"></select>


                                        </div>


                                        <div class="clear"></div>
									</div>



									<div class="wthreesubmitaits">
										<input type="submit" name="submit" value="Ingresar">

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
<script language="javascript">
    $(document).ready(function(){
        $("#cbx_departamento").change(function () {


            $("#cbx_departamento option:selected").each(function () {
                id_departamento = $(this).val();
                $.post("../Clases/getMunicipio.php", { id_departamento: id_departamento }, function(data){
                    $("#cbx_municipio").html(data);
                });
            });
        })
    });

</script>
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