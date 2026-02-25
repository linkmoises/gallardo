<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<body class="bg-gray-50 font-sans text-gray-900">
    
    <header class="flex justify-between items-center px-10 py-6 bg-white min-h-[120px] md:min-h-0">
        <div class="w-1/5"></div>
        <div class="flex justify-center w-3/5">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="Polor" class="h-20 md:h-12 w-auto object-contain"></a>
        </div>
        <div class="flex items-center space-x-6 justify-end w-1/5">
            <button id="search-toggle" class="text-xl hover:text-gray-600 transition-colors"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </header>

    <!-- Search Form -->
    <div id="search-form" class="hidden bg-white border-b border-gray-200 px-10 py-4">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="flex items-stretch gap-2 max-w-2xl mx-auto">
            <input 
                type="search" 
                name="s" 
                placeholder="Escribe para buscar..." 
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"
                autofocus
            >
            <button type="submit" class="px-6 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <nav class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 px-6 mb-6">
        <?php gallo_custom_menu(); ?>
    </nav>

    <script>
        document.getElementById('search-toggle').addEventListener('click', function() {
            const searchForm = document.getElementById('search-form');
            searchForm.classList.toggle('hidden');
            if (!searchForm.classList.contains('hidden')) {
                searchForm.querySelector('input[name="s"]').focus();
            }
        });
    </script>