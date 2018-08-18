<?php
session_start();
//login.php

include("DataBase/database_connection.php");

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location: index.php");
}

$message = '';

if(isset($_POST["login"]))
{
    if(empty($_POST["EMAIL"]) || empty($_POST["CLAVE"]))
    {
        $message = "<div class='alert alert-danger'>Espacios Requeridos</div>";
    }
    else
    {
        $query = "SELECT * 
        FROM tb_usuarios 
        inner join
        tb_roles  
        on
        tb_usuarios.ID_ROL = tb_roles.ID_ROL
        inner join 
        tb_unidad_trabajo 
        on
        tb_usuarios.ID_UNIDAD= tb_unidad_trabajo.ID_UNIDAD_TRABAJO
        where
        EMAIL = :EMAIL";

        $statement = $connect->prepare($query);
        $statement->execute(array('EMAIL' => $_POST["EMAIL"]));
        $count = $statement->rowCount();
        if($count > 0)
        {
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                if(password_verify($_POST["CLAVE"], $row["CLAVE"])) {
                    $_SESSION['use'] = $row['EMAIL'];
                    $_SESSION['rol'] = $row["DESCRIPCION_ROL"];


                    if ($_SESSION['rol'] == 'Administrador')
                    {
                        header("Location: index.php");

                    }
                    if ($_SESSION['rol'] == 'Usuario')
                    {
                        header("Location: indexusuario.php");

                }
                    if ($_SESSION['rol'] == 'Invitado')
                    {
                        header("Location: indexinvitado.php");

                    }


                }
                else
                {
                    $message = '<div class="alert alert-danger">Contraseña Incorrecta</div>';
                }
            }
        }
        else
        {
            $message = "<div class='alert alert-danger'>Correo electronico Incorrecto</div>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body background='img/imagen.jpg'>

<br />
<div class="container" id="inicio">
    <br><br><br>
    <h2 align="center" style="color:rgb(255,255,255);" >Inicio de Sesion</h2>
    <br />
    <div class="panel panel-default">

        <div class="panel-heading"><b>Login</b></div>
        <div class="panel-body">
            <span><?php echo $message; ?></span>
            <form method="post">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="EMAIL" id="EMAIL" placeholder="Ingrese correo electronico de sesion" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="CLAVE" id="CLAVE" placeholder="Ingrese contraseña de sesion" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" id="login" class="btn btn-info" value="Iniciar Sesion" />
                    <input type="button" onclick="location.href='Formularios/Form_Usuarios.php';" value="Crear Usuario" class="btn btn-info"/>
                </div>
            </form>
        </div>
    </div>
    <br />
</div>
</body>
</html>
