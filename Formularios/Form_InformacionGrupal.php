<?php

session_start();

include("../DataBase/database_connection.php");

if(!isset($_SESSION["use"]))
{
    header("Location: ../login.php");
}


$query = "SELECT * FROM proyecto.tb_cat_relacion_familiar";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_expediente";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query


if(isset($_POST['submit'])) {

    if (isset($_POST['relacion'])) {
        $relacion = $_POST['relacion'];
    }
    if (isset($_POST['expediente'])) {
        $expediente = $_POST['expediente'];
    }

    if (isset($_POST['documento'])) {
        $dpi = $_POST['documento'];
    }
    if (isset($_POST['nombre1'])) {
        $nombre1 = $_POST['nombre1'];
    }
    if (isset($_POST['nombre2'])) {
        $nombre2 = $_POST['nombre2'];
    }
    if (isset($_POST['nombre3'])) {
        $nombre3 = $_POST['nombre3'];
    }
    if (isset($_POST['apellido1'])) {
        $apellido1 = $_POST['apellido1'];
    }
    if (isset($_POST['apellido2'])) {
        $apellido2 = $_POST['apellido2'];
    }

    if (isset($_POST['casado'])) {
        $casado = $_POST['casado'];
    }
    if (isset($_POST['sueldo'])) {
        $sueldo = $_POST['sueldo'];
    }
    if (isset($_POST['fechanac'])) {
        $fechanac = $_POST['fechanac'];
    }

    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }

    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    }

    $query3 = "INSERT INTO proyecto.tb_informacion_personas_involucradas
(ID_RELACION_FAMILIAR,
ID_NUMERO_EXPEDIENTE,
NUMERO_DOCUMENTO,
NOMBRE1,
NOMBRE2,
NOMBRE3,
APELLIDO1,
APELLIDO2,
APELLIDOCASADA,
SUELDO,
FECHA_NACIMIENTO,
DIRECCION,
TELEFONO)
VALUES(?,?,?,?,?,?,?,?,?,?,STR_TO_DATE(?,'%m/%d/%Y'),?,?)";

    $stm = $connect->prepare($query3);

    $stm->execute(array($_POST['relacion'],$_POST['expediente'], $_POST['documento'], $_POST['nombre1'], $_POST['nombre2'], $_POST['nombre3'], $_POST['apellido1'], $_POST['apellido2'], $_POST['casado'], $_POST['sueldo'], $_POST['fechanac'] ,$_POST['direccion'],$_POST['telefono']));

    if(  $sueldo<3000) {


        header("Location: Form_DigitalizacionGrupal.php");
    }
    else{
        header("Location: ../reprobado.php");
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario Grupos Involucrados</title>
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
<h1>Informacion de Grupos Involucrados </h1>
<div class="containerw3layouts-agileits">
    <div class="w3layoutscontactagileits">
        <div id="wrapper">
            <form action="#" method="post">

                <div id="login" class="animate w3layouts agileits form">

                    <div class="ferry ferry-from">
                        <label>Relacion Familiar</label>
                        <select name="relacion" id="relacion">
                            <option value="0">Seleccione el codigo del expediente </option>
                            <?php
                            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row['ID_RELACION_FAMILIAR'].'">'.$row['DESCRIPCION'].'</option>';

                            }
                            ?>
                        </select>
                    </div>

                    <div class="ferry ferry-from">
                        <label>Expediente Relacionado</label>
                        <select name="expediente" id="expediente">
                            <option value="0">Seleccione el codigo del expediente </option>
                            <?php
                            while($row2=$data2->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row2['ID_NUMERO_EXPEDIENTE'].'">'.$row2['CODIGO_EXPEDIENTE'].'</option>';
                                //print_r($row);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="ferry ferry-from">
                        <label>Primer nombre:</label>
                        <input type="text" name="nombre1" id ="nombre1" placeholder="Ingrese primer nombre" required>
                    </div>
                    <div class="ferry ferry-from">
                        <label>Segundo nombre:</label>
                        <input type="text" name="nombre2" placeholder="Ingrese segundo nombre" >
                    </div>
                    <div class="ferry ferry-from">
                        <label>Tercer nombre:</label>
                        <input type="text" name="nombre3" id ="nombre3" placeholder="Ingrese tercer nombre" >
                    </div>
                    <div class="ferry ferry-from">
                        <label>Primer apellido:</label>
                        <input type="text" name="apellido1"id ="apellido1" placeholder="Ingrese primer apellido" required>
                    </div>
                    <div class="ferry ferry-from">
                        <label>Segundo apellido:</label>
                        <input type="text" name="apellido2" id ="apellido2"placeholder="Ingrese segundo apellido" >
                    </div>
                    <div class="ferry ferry-from">
                        <label>Apellido de casado:</label>
                        <input type="text" name="casado" id ="casado"placeholder="Ingrese apellido casado" >
                    </div>
                    <div class="ferry ferry-from">
                        <label>DPI</label>
                        <input placeholder="Ingrese su numero de DPI" name="documento"id ="documento" type="text" minlength="13" maxlength="13" required="">
                    </div>

                    <div class="book-pag agileits w3layouts">

                        <div class="book-pag-frm1 agileits w3layouts">
                            <label>Fecha de nacimiento:</label>
                            <input class="date agileits w3layouts" placeholder="Ingrese su fecha de registro" name="fechanac" id="datepicker2" type="text" value="Fecha" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="ferry ferry-from">
                        <label>Sueldo:</label>
                        <input type="text" name="sueldo" id ="sueldo"placeholder="Ingrese sueldo de la persona" required>
                    </div>

                    <div class="ferry ferry-from">
                        <label>Ingrese direccion:</label>
                        <input type="text" name="direccion"id ="direccion" placeholder="Ingrese la direccion" required>
                    </div>

                    <div class="ferry ferry-from">
                        <label>Ingrese numero de teléfono:</label>
                        <input type="text" name="telefono" id ="telefono"placeholder="Ingrese numero de telefono" required>
                    </div>
                    <div class="wthreesubmitaits">
                        <input type="submit" name="submit" value="Ingresar">
                        <input type="button" onclick="location.href='../Catalogos/Cat_Proyectos.php';" value="Continuar" class="btn btn-info"/>
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