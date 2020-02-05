<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/bootstrap.min.css">
	<link href="<?php bloginfo("template_url"); ?>/css/screen.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/main.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
	<script src="https://kit.fontawesome.com/0f01975e5a.js" crossorigin="anonymous"></script>
</head>
<body id="inicio" class="layout-default">

<!-- Navegación
================================================== -->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
	<a class="navbar-brand my-0 mr-md-auto"><img src="<?php bloginfo("template_url"); ?>/assets/img/logo.png" width="40%"/></a>
	<nav class="my-2 my-md-0 mr-md-3">
		<a class="p-2 text-dark active" href="#">Inicio</a>
		<a class="p-2 text-dark" href="#">Blog</a>
		<a class="p-2 text-dark" href="#">Sobre mí</a>
		<a class="p-2 text-dark" href="#">Contacto</a>
	</nav>
	<form class="form-inline mt-2 mt-md-0">
		<input class="form-control mr-sm-2" type="text" placeholder="Escribe para buscar..." aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
	</form>
</div>
<!-- Termina Navegación
================================================== -->

<div id="contenido" class="site-content"> <!-- Empieza .site-content -->
