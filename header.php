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
<?php wp_head(); ?>
</head>
<body id="inicio" class="layout-default">

<!-- Navegación
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top">
	<a class="navbar-brand my-0 mr-md-auto"><img src="<?php bloginfo("template_url"); ?>/assets/img/logo.png" width="40%"/></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	<div class="collapse navbar-collapse" id="navbarToggler">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Sobre mí</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Escribe para buscar...">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
		</form>
	</div>
</nav>
<!-- Termina Navegación
================================================== -->
<?php if ( is_front_page() ) { ?>

<div id="contenido-home" class="site-content"> <!-- Empieza .site-content -->

<?php } else { ?>

<div id="contenido-post" class="site-content"> <!-- Empieza .site-content -->

<?php } ?>
