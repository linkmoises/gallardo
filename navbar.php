<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<body class="bg-gray-50 font-sans text-gray-900">
    
    <header class="flex justify-between items-center px-10 py-6 bg-white">
        <div class="w-1/3"></div>
        <div class="h-12 flex justify-center w-1/3">
            <img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="Polor" class="h-full">
        </div>
        <div class="flex items-center space-x-6 justify-end w-1/3">
            <button class="text-xl"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </header>

    <nav class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 px-6 mb-6">
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-solid fa-network-wired"></i> Tecnología y Redes
        </a>
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-solid fa-graduation-cap"></i> EdTech
        </a>
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-brands fa-linux"></i> Linux & FOSS
        </a>
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-solid fa-gamepad"></i> Juegos & Aprendizaje
        </a>
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-solid fa-music"></i> Música & Arte
        </a>
        <a href="#" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center">
            <i class="fa-solid fa-person-biking"></i> MTB
        </a>
    </nav>