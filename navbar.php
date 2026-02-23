<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<body class="bg-gray-50 font-sans text-gray-900">
    
    <header class="flex justify-between items-center px-10 py-6 bg-white min-h-[120px] md:min-h-0">
        <div class="w-1/5"></div>
        <div class="flex justify-center w-3/5">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="Polor" class="h-20 md:h-12 w-auto object-contain"></a>
        </div>
        <div class="flex items-center space-x-6 justify-end w-1/5">
            <button class="text-xl"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </header>

    <nav class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 px-6 mb-6">
        <?php gallo_custom_menu(); ?>
    </nav>