<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
    $nombre_usuario=$_SESSION["session_username"];
    $estado_sesion='<a href="logout.php"> Cerrar Sesion </a>';
    $registroe="";
}else
{
    $nombre_usuario="Anonimo";
    $estado_sesion='<a href="login.php"> Iniciar Sesion </a>';
    $registroe='<a href="register.php">Registrate</a>';
}
?>

<?php
    $peticion = "SELECT * FROM publicacion_mascotas";
    $query =mysql_query($peticion);
    $cantidad_publicaciones=mysql_num_rows($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PetME: Inicio</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">}
    <link rel="shortcut icon" type="image/png" href="img/aaa.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/menu.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <strong><a href="registroMascota.php">Registrar Mascota!</a></strong>
                    </li>
                    <li class="page-scroll">
                        <a href="#page-top"><?php echo $nombre_usuario ?></a>
                    </li>
                    <li class="page-scroll"><?php echo $estado_sesion ?></li>
                    <li class="page-scroll"><?php echo $registroe ?></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">


            <div class="row">
                <div class="col-lg-12 text-center">
                    <br><br>
                    <h2>Mascotas en Adopcion</h2>
                    <hr class="star-primary">
                </div>
            </div>


            <div class="row">
                <?php while($row=mysql_fetch_assoc($query)) { $contador++ ?>
                        <div class="col-sm-4 portfolio-item">
                            <a href=#modal_<?php echo $contador ?>  class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content"><?php echo $row['titulo'] ?><br>
                                    </div>
                                </div>
                                <img src="img/portfolio/cabin.png" class="img-responsive" alt="Cabin">
                            </a>
                        </div>
                <div class="portfolio-modal modal fade" id="modal_<?php echo $contador ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">

                                <h2><?php echo $row['titulo'] ?></h2>
                                <hr class="star-primary">
                                <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                                <p><?php echo $row['descripcion'] ?> </p>
                                <ul class="list-inline item-details">
                                    <li><strong>Categoria:</strong>
                                        <?php echo $row['categoria'] ?>
                                    </li>

                                    <li><strong>Edad de la Mascota:</strong>
                                        <?php echo $row['edad_mascota'] ?>
                                    </li>
                                        <br>
                                    <li><strong>Lugar de Encuentro:</strong>
                                        <?php echo $row['lugar'] ?>
                                    </li>

                                    <li><strong>Fecha:</strong>
                                        <?php echo $row['fecha'] ?>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <i class="fa fa-times"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

               <?php  } ?>

            </div> <!--Class Row -->

        </div>
    </section>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>

</body>

</html>
