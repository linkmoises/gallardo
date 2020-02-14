<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/bootstrap.min.css">
	<link href="<?php bloginfo("template_url"); ?>/css/screen.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/main.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
	<script src="https://kit.fontawesome.com/0f01975e5a.js" crossorigin="anonymous"></script>
<!-- seo_bravo()
================================================== -->
<?php echo seo_wp_bravo(); ?>
<!-- fin seo_bravo()
================================================== -->
<!-- inicia wp_head()
================================================== -->
<?php wp_head(); ?>
<!-- fin wp_head()
================================================== -->
</head>
<body id="inicio" class="layout-default">

<!-- Navegación
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top">
	<a class="navbar-brand">
		<div class="logo-image">
			<img class="img-fluid" src="<?php bloginfo("template_url"); ?>/assets/img/logo.png"/>
		</div>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarToggler">
<?php if (function_exists( gallo_custom_menu() ) ) gallo_custom_menu(); ?>
<?php get_search_form(); ?>
	</div>
</nav>
<!-- Termina Navegación
================================================== -->
<?php if ( is_front_page() ) { ?>

<div id="contenido-home" class="site-content"> <!-- Empieza .site-content -->

<?php } else { ?>

<div id="contenido-post" class="site-content"> <!-- Empieza .site-content -->

<?php } ?>
