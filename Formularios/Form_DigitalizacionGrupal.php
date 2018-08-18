<?php  session_start();

error_reporting(0);
//index.php
include("../DataBase/database_connection.php");

if(!isset($_SESSION["use"]))
{
    header("location: ../login.php");
}

if(isset($_POST['myfile'])) {
    $tipo = $_POST['myfile'];
}

$query = "SELECT * FROM proyecto.tb_tipo_digitalizacion";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$currentDir = '../DataBase/' ;
$uploadDirectory = 'Data/';

$errors = []; // Store all foreseen and unforseen errors here

$fileExtensions = ['jpeg','jpg','png','pdf']; // Get all the file extensions

$fileName = $_FILES['myfile']['name'];
$fileSize = $_FILES['myfile']['size'];
$fileTmpName  = $_FILES['myfile']['tmp_name'];
$fileType = $_FILES['myfile']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));


$uploadPath = $currentDir . $uploadDirectory . basename($fileName);



if(isset($_POST['submit'])||isset($_POST['submit2']))
{
    if(isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    }


    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        header("Location: Form_InformacionGrupal.php");
        if ($didUpload) {

        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }




    $query3 = "INSERT INTO proyecto.tb_digitalizacion
(ID_INFORMACION_SOLICITANTE,
ID_TIPO_DIGITALIZACION,
PATH_DOCUMENTO)
values
( (SELECT ID_INFORMACION_SOLICITANTE
FROM tb_informacion_personas_involucradas
ORDER by ID_INFORMACION_SOLICITANTE DESC
LIMIT 1),?,?)";

    $stm = $connect->prepare($query3);


    $stm->execute(array($tipo,$uploadPath));

}
if(isset($_POST['submit'])||isset($_POST['submit2']))
{
    if(isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    }


    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        header("Location: Form_InformacionGrupal.php");
        if ($didUpload) {

        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }




    $query3 = "INSERT INTO proyecto.tb_digitalizacion
(ID_INFORMACION_SOLICITANTE,
ID_TIPO_DIGITALIZACION,
PATH_DOCUMENTO)
values
( (SELECT ID_INFORMACION_SOLICITANTE
FROM tb_informacion_personas_involucradas
ORDER by ID_INFORMACION_SOLICITANTE DESC
LIMIT 1),?,?)";

    $stm = $connect->prepare($query3);


    $stm->execute(array($tipo,$uploadPath));

}
if(isset($_POST['submit2']))
{
    if(isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    }


    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        header("Location: ../Catalogos/Cat_Proyectos.php");
        if ($didUpload) {

        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }




    $query3 = "INSERT INTO proyecto.tb_digitalizacion
(ID_INFORMACION_SOLICITANTE,
ID_TIPO_DIGITALIZACION,
PATH_DOCUMENTO)
values
( (SELECT ID_INFORMACION_SOLICITANTE
FROM tb_informacion_personas_involucradas
ORDER by ID_INFORMACION_SOLICITANTE DESC
LIMIT 1),?,?)";

    $stm = $connect->prepare($query3);


    $stm->execute(array($tipo,$uploadPath));

}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Digitalizacion Grupal</title>
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
<h1> Formulario de Digitalizacion Grupal</h1>
<div class="containerw3layouts-agileits">
    <div class="w3layoutscontactagileits">

        <div id="wrapper">
            <form method="post" enctype="multipart/form-data">

                <div class="ferry ferry-from">
                    <label>Seleccione tipo de archivo</label>
                    <select name="tipo" id="tipo">
                        <option value="0">Seleccione el tipo archivo</option>
                        <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['ID_TIPO_DIGITALIZACION'].'">'.$row['DESCRIPCION'].'</option>';
                            //print_r($row);
                        }
                        ?>
                    </select>
                </div>

                <div class="ferry ferry-from">
                    <input style="color:rgb(255,255,255);" type="file" name="myfile" id="fileToUpload">
                </div>

                <br>
                <div class="wthreesubmitaits">
                    <input type="submit" name="submit" value="Adjuntar Archivo" class="btn btn-info">
                    <input type="submit" name="submit2" value="Continuar" class="btn btn-info">


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