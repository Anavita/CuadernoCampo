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
<title>Crear ficha Cuaderno de Campo</title>
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
                        <a class="nav-link" href="pagina.php#proyecto">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina.php#nosotros">Conócenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina.php#galeria">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina.php#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina.php#contacto">Contacto</a>
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
                        <li><a class="dropdown-item" href="#">Inventario</a></li>
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

    <!--  Sección formulario "Crear Ficha" -->
    <div class="ficha-container section-container" id="ficha">
        <div class="container">
            <div class="row">
                <div class="col ficha section-description wow fadeIn">
                    <h2>Crear una nueva ficha</h2>
                </div>
            </div>
            <div class="row">
                <div class="container py-4">
                    <form id="fichaForm">
                        <div class="mb-3">
                            <label class="form-label" for="nombreFicha">Nombre de la ficha</label>
                            <input class="form-control" id="nombreFicha" type="text" placeholder="Nombre de la ficha (Fecha y nombre de la especie. Ej: 10022022OsoPardo)" />
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label" for="coordenadasFicha">Lugar / Coordenadas</label>
                                <input class="form-control" id="coordenadasFicha" type="text" placeholder="Lugar / Coordenadas" />
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="fechaFicha">Fecha</label>
                                <input class="form-control" id="fechaFicha" type="text" placeholder="Fecha" />
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="horaFicha">Hora</label>
                                <input class="form-control" id="horaFicha" type="text" placeholder="Hora" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" aria-label="Estado del cielo">
                                    <option hidden >Estado del cielo</option>
                                    <option value="1">Despejado</option>
                                    <option value="2">Sol y nubes</option>
                                    <option value="3">Nublado</option>
                                    <option value="4">Tormentoso</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" aria-label="Clima">
                                    <option hidden >Clima</option>
                                    <option value="1">Cálido</option>
                                    <option value="2">Frío</option>
                                    <option value="3">Seco</option>
                                    <option value="4">Húmedo</option>
                                    <option value="5">Viento</option>
                                    <option value="6">Tormenta</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="nomEspFicha">Nombre de la especie</label>
                                <input class="form-control" id="nomEspFicha" type="text" placeholder="Nombre de la especie" />
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="nomCieFicha">Nombre científico de la especie</label>
                                <input class="form-control" id="nomCieFicha" type="text" placeholder="Nombre científico de la especie" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select">
                                    <optgroup label="Vertebrado" class="vertebrado">
                                        <option hidden >Clasificación</option>
                                        <option value="1-1">Pez</option>
                                        <option value="1-2">Anfibio</option>
                                        <option value="1-3">Reptil</option>
                                        <option value="1-4">Ave</option>
                                        <option value="1-5">Mamífero</option>
                                    </optgroup>
                                    <optgroup label="Invertebrado" class="invertebrado">
                                        <option value="2-1">Porífero</option>
                                        <option value="2-2">Celentéreo</option>
                                        <option value="2-3">Guasano</option>
                                        <option value="2-4">Artrópodo</option>
                                        <option value="2-5">Molusco</option>
                                        <option value="2-6">Equidermo</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" aria-label="Alimentación">
                                    <option hidden > Tipo de alimentación</option>
                                    <option value="1">Herbívoro</option>
                                    <option value="3">Omnnívoro</option>
                                    <option value="3">Carnívoro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" aria-label="Desarrollo embrionario">
                                    <option hidden >Desarrollo embrionario</option>
                                    <option value="1">Vivíparo</option>
                                    <option value="2">Ovíparo</option>
                                    <option value="3">Ovovivíparo</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" aria-label="Hábitat">
                                    <option hidden >Hábitat</option>
                                    <option value="1">Acuático</option>
                                    <option value="2">Terrestre</option>
                                    <option value="3">Mixto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" aria-label="Género">
                                    <option hidden >Género</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="3">NS</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" aria-label="Tamaño">
                                    <option hidden >Tamaño aproximado</option>
                                    <option value="1">Pequeño</option>
                                    <option value="2">Mediano</option>
                                    <option value="3">Grande</option>
                                    <option value="4">Muy grande</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="descripcionFicha">Descripción de la especie</label>
                            <textarea class="form-control" id="descripcionFicha" type="text" placeholder="Descripción de la especie" style="height: 10rem;"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="comportamientoFicha">Comportamiento de la especie</label>
                            <textarea class="form-control" id="descripcionFicha" type="text" placeholder="Descripción de la especie" style="height: 10rem;"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="arch01">
                                    <label class="input-group-text" for="arch01">Subir</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="arch02">
                                    <label class="input-group-text" for="arch02">Subir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="arch03">
                                    <label class="input-group-text" for="arch03">Subir</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="arch04">
                                    <label class="input-group-text" for="arch04">Subir</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-2 mx-auto">
                            <button class="btn btn-primary btn-sm" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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