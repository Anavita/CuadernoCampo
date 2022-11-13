<?php
	//Se reanuda la sesión
	session_start();

	//Se comprueba si el usario está logueado
	//Si no lo está, se le redirecciona al index
	//Si lo está, se define el botón de cerrar sesión y la duración de la sesión
	if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
		header('Location: index.php');
	} else {
		$estado = $_SESSION['usuario'];
		$salir = '<a href="php/salir.php" target="_self">Salir</a>';
		require('php/sesiones.php');
	};
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bienvenido a tu Cuaderno de Campo</title>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuaderno de campo</title>

    <!-- Vinculación AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vinculación fichero CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Vinculación fichero CSS media-queries -->
    <link rel="stylesheet" href="media-queries.css" />

    <!-- Vinculación fichero CSS animaciones -->
    <link rel="stylesheet" href="animate.css">

    <!-- Vinculación galería iconos SVG Bootstrap -->
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />

    <!-- Vinculación Google Fonts · Tipografía: Ms Madis -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&display=swap" rel="stylesheet">

    <!-- Vinculación Google Fonts · Montserrat Alternates -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200;400&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- HEAD -->
    <!-- Barra navbar -->
    <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
        <div class="container-fluid">
            <!--Logo pequeño navbar que reedirige a la portada de inicio -->
            <a class="navbar-brand" href="index.php"><img src="./img/logo02.png" width="75%"
                    alt="Logo pequeño Cuaderno de Campo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#proyecto">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Conócenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeria">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
				
                <!-- Menú usuario cuando está logueado -->
                <!-- Con ms-auto consigo alienar el div que contiene el grupo de botones al final del navbar-->
                <div class="btn-group ms-auto" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenid@ <?php echo $estado; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="ficha.php">Cubrir ficha</a></li>
                        <li><a class="dropdown-item" href="inventario.php">Inventario</a></li>
						<li><a class="dropdown-item" href="#">Galería</a></li>
						<li><a class="dropdown-item" href="#">Mapa</a></li>
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
    <!--  Sección "Sobre el proyecto" -->
    <div class="proyecto-container section-container" id="proyecto">
        <div class="container">
            <div class="row">
                <div class="col proyecto section-description wow fadeIn">
                    <h2>Sobre el proyecto</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 proyecto-box wow fadeInUp">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="proyecto-box-icon">
                                <img src="./img/ciervo.png" alt="Ciervo" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Investigación</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 proyecto-box wow fadeInDown">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="proyecto-box-icon">
                                <img src="./img/lince.png" alt="Lince" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Compartir</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 proyecto-box wow fadeInUp">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="proyecto-box-icon">
                                <img src="./img/pescador.png" alt="Martín Pescador" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Comunidad naturalista</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección "Sobre nosotros" -->
    <div class="nosotros-container section-container section-container-gray-bg" id="nosotros">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 nosotros-box wow fadeInLeft">
                    <div class="about-us-box-text">
                        <h2>Sobre nosotros</h2>
                        <p class="medium-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et.
                            Ut wisi enim ad minim veniam, quis nostrud.
                            Exerci tation ullamcorper suscipit <a href="#inicio">lobortis nisl</a> ut aliquip ex ea
                            commodo consequat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et.
                            Ut wisi enim ad minim veniam, quis nostrud.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et.
                            Ut wisi enim ad minim veniam, quis nostrud.
                            Exerci tation ullamcorper suscipit <a href="#inicio">lobortis nisl</a> ut aliquip ex ea
                            commodo consequat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                        </p>
                    </div>
                </div>
                <!-- Queda pendiente arreglar este div -->
                <!-- <div class="col-12 col-lg-5 nosotros-box wow fadeInUp">
                    <div class="about-us-box-img">
                        <img src="" class="cuaderno" alt="Sobre nosotros" data-at2x="">
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <!-- Sección "Blog" -->
    <div class="blog-container section-container" id="blog">
        <div class="container">
            <div class="row">
                <div class="col blog section-description wow fadeIn">
                    <h2>Blog</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                    <p>Últimas entradas añadidas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 blog-box wow fadeInUp">
                    <div class="blog-box-image">
                        <img src="img/flores.jpg" alt="" data-at2x="img/flores.jpg">
                    </div>
                    <h3><a href="#">El mundo secreto de las abejas</a> <i class="fas fa-angle-right"></i></h3>
                    <div class="blog-box-date"><i class="far fa-calendar"></i> Sep 2022</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et.
                    </p>
                </div>
                <div class="col-md-4 blog-box wow fadeInUp">
                    <div class="blog-box-image">
                        <img src="img/prismaticos.jpg" alt="" data-at2x="img/prismaticos.jpg">
                    </div>
                    <h3><a href="#">Salir al campo con niños</a> <i class="fas fa-angle-right"></i></h3>
                    <div class="blog-box-date"><i class="far fa-calendar"></i> Ago 2022</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et.
                    </p>
                </div>
                <div class="col-md-4 blog-box wow fadeInUp">
                    <div class="blog-box-image">
                        <img src="img/mariposa.jpg" alt="" data-at2x="img/mariposa.jpg">
                    </div>
                    <h3><a href="#">la delicadeza del mundo que nos rodea</a> <i class="fas fa-angle-right"></i></h3>
                    <div class="blog-box-date"><i class="far fa-calendar"></i> Jul 2022</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col section-bottom-button wow fadeInUp">
                    <a class="btn btn-primary btn-link-3" href="#">Ver más</a>
                </div>
            </div>
        </div>
    </div>

    <!--  Sección "Contacto" -->
    <div class="contacto-container section-container" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col contacto section-description wow fadeIn">
                    <h2>Contacto</h2>
                </div>
            </div>

            <div class="row">
                <div class="container py-4">
                    <form id="contactForm">

                        <div class="mb-3">
                            <label class="form-label" for="name">Nombre</label>
                            <input class="form-control" id="name" type="text" placeholder="Nombre" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Correo Electrónico</label>
                            <input class="form-control" id="email" type="email" placeholder="Correo Electrónico" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="mensaje">Mensaje</label>
                            <textarea class="form-control" id="mensaje" type="text" placeholder="Mensaje"
                                style="height: 10rem;"></textarea>
                        </div>

                        <div class="d-grid gap-2 col-2 mx-auto">
                            <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Termina BODY -->


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
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4 text-center">
                            <i class="fas fa-gem me-3 text-secondary"></i>Cuaderno de Campo
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.</p>
                        <img class="mx-auto d-block" src="./img/logo03.png" alt="Logo pequeño Cuaderno de Campo" />
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
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
                    <!-- Grid column -->

                    <!-- Grid column -->
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
                    <!-- Grid column -->

                    <!-- Grid column -->
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
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

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