<?php
session_start();

include("../DataBase/database_connection.php");

if(!isset($_SESSION["use"]))
{
    header("Location: ../login.php");
}

$query = "SELECT * FROM proyecto.tb_tipo_ingreso;";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_cat_destino_subsidio";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query

if(isset($_POST['submit']))
{
    if(isset($_POST['tipoproyecto'])) {
        $tipoproyecto = $_POST['tipoproyecto'];
    }
    if(isset($_POST['tiposubsidio'])) {
        $tiposubsidio = $_POST['tiposubsidio'];
    }
    if(isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
    }

    if(isset($_POST['fecharegistro'])) {
        $fecharegistro = $_POST['fecharegistro'];
    }
    if(isset($_POST['observaciones'])) {
        $observaciones = $_POST['observaciones'];
    }
    if(isset($_POST['montosolicitado'])) {
        $montosolicitado = $_POST['montosolicitado'];
    }
    if(isset($_POST['latitud'])) {
        $latitud = $_POST['latitud'];
    }
    if(isset($_POST['longitud'])) {
        $longitud= $_POST['longitud'];
    }
    if(isset($_POST['anio'])) {
        $anio= $_POST['anio'];
    }
    $query3 = "INSERT INTO proyecto.tb_expediente
(ID_TIPO_INGRESO,
ID_TIPO_SOILCITUD_SUBSIDIO,
CODIGO_EXPEDIENTE,
FECHA_REGISTRO,
OBSERVACIONES_EXPEDIENTE,
MONTO_SOLICITADO,
LONGITUD_PROYECTO,
LATITUD_PROYECTO,
ANIO)
VALUES(?,?,?,STR_TO_DATE(?,'%m/%d/%Y'),?,?,?,?,?)";

    $stm = $connect->prepare($query3);

    $stm->execute(array($_POST['tipoproyecto'],
        $_POST['tiposubsidio'],$_POST['codigo'],
        $_POST['fecharegistro'],$_POST['observaciones'],
        $_POST['montosolicitado'],$_POST['longitud'],
        $_POST['latitud'],$_POST['anio']));

    if ($_POST['tipoproyecto'] == 1)
    {
        header("Location: ../Formularios/Form_InformacionPersonal.php");

    }
    else{

        header("Location: ../Formularios/Form_InformacionGrupal.php");

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Expedientes</title>
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
<h1>Informacion de los Expedientes</h1>
<div class="containerw3layouts-agileits">
    <div class="w3layoutscontactagileits">

        <div id="wrapper">
            <form  method="post">
                <div class="ferry ferry-from">
                    <label>Tipo de proyecto</label>
                    <select name="tipoproyecto" id="tipoproyecto">
                        <option value="0">Seleccione tipo de proyecto</option>
                        <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['ID_TIPO_INGRESO'].'">'.$row['DESCRIPCION_INGRESO'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="ferry ferry-from">
                    <label>Tipo de Subsidio</label>
                    <select name="tiposubsidio" id="tiposubsidio">
                        <option value="0">Seleccione tipo de subsidio</option>
                        <?php
                        while($row2=$data2->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row2['ID_TIPO_SOILCITUD_SUBSIDIO'].'">'.$row2['DESCRIPCION'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="ferry ferry-from">
                    <label>Codigo Expediente</label>
                    <input placeholder="Ingrese el codigo de expediente" name="codigo" id="codigo" type="text" required="">
                </div>
                <div class="ferry ferry-from">
                    <label>Fecha de registro</label>
                    <input class="date agileits w3layouts" name="fecharegistro" id="datepicker2" type="text" placeholder="Ingrese fecha de registro" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
                </div>

                <div class="ferry ferry-from">
                    <label>Observaciones</label>
                    <input placeholder="Ingrese el monto que desea solicitar" name="observaciones" id="observaciones"type="text" required="">
                </div>
                <div class="ferry ferry-from">
                    <label>Monto solicitado</label>
                    <input placeholder="Ingrese el monto que desea solicitar" name="montosolicitado" id="montosolicitado"type="number" required="">
                </div>

                <div class="ferry ferry-from">
                    <label>Longitud</label>
                    <input placeholder="Ingrese la longitud" name="longitud" id="longitud"type="text" required="">
                </div>
                <div class="ferry ferry-from">
                    <label>Latitud</label>
                    <input placeholder="Ingrese latitud" name="latitud" id="latitud"type="text" required="">

                </div>
                <div class="ferry ferry-from">
                    <label>Año</label>
                    <input placeholder="Ingrese año" name="anio" id="anio"type="text" required="">
                </div>
                <div class="wthreesubmitaits">
                    <input type="submit"  name="submit" id="submit" value="Ingresar">
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