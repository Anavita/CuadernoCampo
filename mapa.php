<?php
//Se reanuda la sesión
session_start();

//Se comprueba si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, se define el botón de cerrar sesión y la duración de la sesión
if (!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
    header('Location: index.php');
} else {
    $estado = $_SESSION['usuario'];
    $salir = '<a href="php/salir.php" target="_self">Salir</a>';
    require('php/sesiones.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuaderno de campo · Mapa</title>

    <!-- Vinculación AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vinculación fichero CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Vinculación fichero CSS media-queries -->
    <link rel="stylesheet" href="media-queries.css" />

    <!-- Vinculación galería iconos SVG Bootstrap -->
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />

    <!-- Vinculación Google Fonts · Tipografía: Ms Madis -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&display=swap" rel="stylesheet">

    <!-- Vinculación Google Fonts · Montserrat Alternates -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200;400&display=swap" rel="stylesheet">

    <!-- Script Google Maps -->
    <script type="text/javascript">
        //Inicializar y añadir el mapa
        function initMap() {

            var bounds = new google.maps.LatLngBounds();
            var myLatlng = new google.maps.LatLng(43.28233333, -8.29776389);
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: myLatlng,
            });

            //Se crean múltiples marcadores desde la BD
            var marcadores = [
                <?php include('phpmapa/marcadores.php'); ?>
            ];

            //Ventana de información para cada marcador
            var ventanaInfo = [
                <?php include('phpmapa/infomarcadores.php'); ?>
            ];
            console.log(ventanaInfo);

            //Ventana de información con los marcadores 
            var mostrarMarcadores = new google.maps.InfoWindow(),
                marcadores, i;

            for (i = 0; i < marcadores.length; i++) {
                console.log(marcadores[i][0]);
                console.log(marcadores[i][1]);
                const posicion = {
                    lat: marcadores[i][0],
                    lng: marcadores[i][1]
                };
                const marker = new google.maps.Marker({
                    position: posicion,
                    map: map,
                });
                bounds.extend(posicion);

                // Colocar la ventana de información de cada marcador del mapa
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        mostrarMarcadores.setContent(ventanaInfo[i][0]);
                        mostrarMarcadores.open(map, marker);
                    }
                })(marker, i));

                //Se centra el mapa para que todos los marcadores se puedan ver 
                map.fitBounds(bounds);
            }
        }
        window.initMap = initMap;
    </script>

</head>

<body>
    <!-- HEAD -->
    <!-- Barra navbar -->
    <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
        <div class="container-fluid">
            <!--Logo pequeño navbar que reedirige a la portada de inicio -->
            <a class="navbar-brand" href="index.php"><img src="./img/logo02.png" width="75%" alt="Logo pequeño Cuaderno de Campo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#proyecto">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#nosotros">Conócenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#galeria">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contacto">Contacto</a>
                    </li>
                </ul>

                <!-- Menú usuario cuando está logueado -->
                <!-- Con ms-auto consigo alienar el div que contiene el grupo de botones al final del navbar-->
                <div class="btn-group ms-auto" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenid@ <?php echo $estado; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="ficha.php">Cubrir ficha</a></li>
                        <li><a class="dropdown-item" href="inventario.php">Inventario</a></li>
                        <li><a class="dropdown-item" href="galeria.php">Galería</a></li>
                        <li><a class="dropdown-item" href="mapa.php">Mapa</a></li>
                        <li><a class="dropdown-item" href="#"><?php echo $salir; ?></p></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Portada efecto parallax -->
    <section>
        <div id="portada" class="row">
            <div class="row h-100">
                <!--Div contenedor logo-->
                <div class="col-md-12 align-self-center">
                    <img src="./img/logo.png" id="logo" class="mx-auto d-block" alt="Logo Cuaderno de Campo" />
                </div>
            </div>
            <div class="container">
            </div>
        </div>
    </section>
    <!-- Termina HEAD -->

    <!--BODY -->
    <h1>Mapa</h1>
    <!-- Contenedor del Mapa de Google -->
    <div id="map"></div>

    <!-- Script API de Google -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC24ijm-lHtDY82rYH82wodWnCDgtEp3gI&callback=initMap&v=weekly"></script>


    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-secondary text-muted">
        <!-- Sección Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary">
                        <a href="https://www.facebook.com" class="me-4 link-primary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <span class="visually-hidden">Button</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary">
                        <a href="https://www.twitter.com" class="me-4 link-primary">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <span class="visually-hidden">Button</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary">
                        <a href="https://www.instagram.com" class="me-4 link-primary">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <span class="visually-hidden">Button</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary">
                        <a href="https://www.pinterest.com" class="me-4 link-primary">
                            <i class="bi bi-pinterest"></i>
                        </a>
                        <span class="visually-hidden">Button</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Sección Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4 text-center">
                            <i class="fas fa-gem me-3 text-secondary"></i>Cuaderno de Campo
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.</p>
                        <img class="mx-auto d-block" src="./img/logo03.png" alt="Logo pequeño Cuaderno de Campo" />
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-center">
                            Aviso Legal
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Política de cookies</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Política de privacidad</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Protección de datos</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Aviso legal</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-center">
                            Mapa del sitio
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Inicio</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Proyecto</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Comunidad</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Contacto</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-center">Contacto</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i>Universidade da Coruña</p>
                        <p>
                        <p><i class="fas fa-home me-3 text-secondary"></i>Zapateira, 15008 A Coruña</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            hola@cuadernodecampo.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> +34 881 01 20 60</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> +34 881 01 20 62</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Termina sección links -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://cuadernodecampo.com/">Cuaderno de Campo</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>

</html>