<?php
    //Inicio de sesión
    session_start();

    //Petición al archivo que controla la duración de las sesiones
    require('php/sesiones.php');
?>

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

                <!-- Grupo botones menú login/registro -->
                <!-- Con ms-auto consigo alienar el div que contiene el grupo de botones al final del navbar-->
                <div class="btn-group ms-auto" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalLogin">Login</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalReg">Registro</a></li>
                    </ul>
                </div>

                <!-- Modal para el login -->
                <div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close btn-close-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="myform">
                                    <h1 class="text-center">Acceso Usuario</h1>
                                    <form id="loginUsuario">
                                        <div class="mb-3 mt-4">
                                            <label for="correoLogin" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="correoLogin" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="passLogin" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="passLogin">
                                        </div>
                                        <!-- DIV mensaje -->
                                        <div class="mb-3" id="mensaje">
                                        </div>
                                        <button type="submit" class="btn btn-light mt-3">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para el registro -->
                <div class="modal fade modal-lg" id="ModalReg" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close btn-close-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="myform">
                                    <h1 class="text-center">Registro de usuario</h1>
                                    <form id="regUsuario">
                                        <div class="mb-3 mt-4">
                                            <label for="nombreReg" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombreReg">
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <label for="apellidosReg" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidosReg">
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <label for="correoReg" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="correoReg">
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <label for="aliasReg" class="form-label">Alias</label>
                                            <input type="text" class="form-control" id="aliasReg">
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <label for="passReg" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="passReg">
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="termReg" required>
                                            <label for="terminos" class="form-check-label text-primary">Acepto los
                                                términos y condiciones</label>
                                            </input>
                                        </div>
                                        <!-- DIV mensaje -->
                                        <div class="mb-3" id="mensaje2">
                                        </div>
                                        <button type="submit" class="btn btn-light mt-3">Registro</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="col proyecto section-description">
                    <h2>Sobre el proyecto</h2>
                    <div class="divider-1"><span></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 proyecto-box">
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
                <div class="col-md-4 proyecto-box">
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
                <div class="col-md-4 proyecto-box">
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
                <div class="col-12 col-lg-12 nosotros-box">
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
                <!-- <div class="col-12 col-lg-5 nosotros-box">
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
                <div class="col blog section-description">
                    <h2>Blog</h2>
                    <div class="divider-1"><span></span></div>
                    <p>Últimas entradas añadidas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 blog-box">
                    <div class="blog-box-image">
                        <img src="img/flores.jpg" alt="" data-at2x="img/flores.jpg">
                    </div>
                    <h3><a href="#">El mundo secreto de las abejas</a> <i class="fas fa-angle-right"></i></h3>
                    <div class="blog-box-date"><i class="far fa-calendar"></i> Sep 2022</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et.
                    </p>
                </div>
                <div class="col-md-4 blog-box">
                    <div class="blog-box-image">
                        <img src="img/prismaticos.jpg" alt="" data-at2x="img/prismaticos.jpg">
                    </div>
                    <h3><a href="#">Salir al campo con niños</a> <i class="fas fa-angle-right"></i></h3>
                    <div class="blog-box-date"><i class="far fa-calendar"></i> Ago 2022</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et.
                    </p>
                </div>
                <div class="col-md-4 blog-box">
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
                <div class="col section-bottom-button">
                    <a class="btn btn-primary btn-link-3" href="#">Ver más</a>
                </div>
            </div>
        </div>
    </div>

    <!--  Sección "Contacto" -->
    <div class="contacto-container section-container" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col contacto section-description">
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
                            <textarea class="form-control" id="mensaje" type="text" placeholder="Mensaje" style="height: 10rem;"></textarea>
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
                            <a href="index.php" class="text-reset">Inicio</a>
                        </p>
                        <p>
                            <a href="#proyecto" class="text-reset">Proyecto</a>
                        </p>
                        <p>
                            <a href="#nosotros" class="text-reset">Conócenos</a>
                        </p>
                        <p>
                            <a href="#blog" class="text-reset">Blog</a>
                        </p>
                        <p>
                            <a href="#galeria" class="text-reset">Galería</a>
                        </p>
                        <p>
                            <a href="#contacto" class="text-reset">Contacto</a>
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

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://cuadernodecampo.com/">Cuaderno de Campo</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script>
        //Guardo el controlador del div ID mensaje en una variable, tanto para
        // el modal del login como el modal de registro
        var mensaje = $("#mensaje");
        var mensaje2 = $("#mensaje2");
        //Posteriormente oculto el div
        mensaje.hide();
        mensaje2.hide();

        //Cuando el formulario con ID loginUsuario se envíe...
        $("#loginUsuario").on("submit", function(e) {
            //Evito que se envíe por defecto
            e.preventDefault();
            formData = new FormData();
            formData.append("correoLogin", $('#correoLogin').val());
            formData.append("passLogin", $('#passLogin').val());

            //Llamo a la función AJAX de jQuery
            $.ajax({
                //Defino la URL del archivo al cual se va a enviar los datos
                url: "php/acceder.php",
                type: "POST",
                dataType: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(echo) {
                window.location.href = "pagina.php";
                //Una vez que la respuesta es recibida
                //se comprueba si la misma no está vacía
                if (echo !== "") {
                    mensaje.html(echo);
                    mensaje.slideDown(500);
                } else {
                    window.location.replace("");
                }
            });
        });

        //Cuando el formulario con ID regUsuario se envíe...
        $("#regUsuario").on("submit", function(e) {
            e.preventDefault();

            formData = new FormData();
            formData.append("nombreReg", $('#nombreReg').val());
            formData.append("apellidosReg", $('#apellidosReg').val());
            formData.append("correoReg", $('#correoReg').val());
            formData.append("aliasReg", $('#aliasReg').val());
            formData.append("passReg", $('#passReg').val());

            //Mismos pasos que el formulario de login
            $.ajax({
                url: "php/registro.php",
                type: "POST",
                dataType: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(echo) {
                mensaje2.html(echo);
                mensaje2.slideDown(500);
            });
        });
    </script>

</body>

</html>