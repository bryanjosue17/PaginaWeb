<?php
//index.php

include ('Clases/user.php');

if(!isset($_SESSION["use"]))
{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">



  </head>

  <body id="page-top">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">

        <br />
        <div class="nav-item mx-0 mx-lg-1">

        </div>
        <div  class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

          </ul>
            <?php
            $user = new user;
            $usuario= $user->getRol();
            echo   " <a href='Clases/logout.php'>$usuario</a>"
            ?>
        </div>



    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div id="palabra" class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/480.png" alt="">
        <h1 class="text-uppercase mb-0">Primer Proyecto</h1>
        <hr class="star-light">
    <h2 align="center">Desarrollo Web</h2>

      </div>


    </header>

]

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Integrantes</h2>
        <hr class="star-dark mb-5">
            <center>
              <p class="lead">Bryan Josué Xol Muñoz, Carné: 0905-15-2223</p>
              <p class="lead">Ronald Alberto Medina Montoya, Carné: 0905-15-3950</p>
            </center>
      </div>
    </section>



    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Ubicacion</h4>
            <p class="lead mb-0">Jutiapa
              <br>Jutiapa</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Encuentranos!</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.facebook.com/BryanJosueXM">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://plus.google.com/u/0/115049651873324742965">
                  <i class="fa fa-fw fa-google-plus"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/BryanJosue_17">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.linkedin.com/in/josue-mu%C3%B1oz-37aaa66b/">
                  <i class="fa fa-fw fa-linkedin"></i>
                </a>
              </li>

            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">Exitos :D</h4>
            <p class="lead mb-0">Por terrible que parezca la vida siempre hay algo que puedes hacer con éxito. Mientras haya vida, hay esperanza.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Primer Proyecto Desarrollo Web</small>
      </div>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
