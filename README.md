# Gallardo

Gallardo es una plantilla personalizada para WordPress con un diseño moderno y minimalista, optimizada para blogs personales y publicaciones de contenido.

## Características

- Diseño moderno con Tailwind CSS y componentes redondeados
- Sistema de taxonomías personalizadas para series de posts
- Diseño completamente adaptativo (móvil, tablet, desktop)
- Tarjetas de posts con hover effects y transiciones suaves
- Optimización del head de WordPress (eliminación de scripts innecesarios)
- Paginación personalizada y limpia
- Barra de administración oculta en el frontend

## Estructura del tema

```
gallardo/
├── css/
│   ├── custom.css          # Estilos personalizados
│   ├── wp.css              # Estilos para contenido de WordPress
│   └── codecolorer.css     # Estilos para bloques de código
├── images/                 # Imágenes del tema
├── include/
│   ├── function-series.php # Funciones relacionadas con series
│   └── gallo-share.php     # Componente de compartir en redes
├── archive.php             # Plantilla de archivos y categorías
├── footer.php              # Pie de página
├── functions.php           # Funciones del tema
├── header.php              # Cabecera con meta tags
├── hero.php                # Sección hero con último post
├── home.php                # Página principal
├── index.php               # Plantilla índice
├── navbar.php              # Navegación principal
├── searchform.php          # Formulario de búsqueda
├── series.php              # Slider de series
├── sidebar.php             # Barra lateral con widgets
├── single.php              # Plantilla de posts individuales
└── style.css               # Hoja de estilos principal
```

## Características técnicas

### Funcionalidades
- `get_navbar()` - Incluye el navbar
- `get_hero()` - Incluye la sección hero
- `get_series()` - Incluye el slider de series
- `gallo_share()` - Botones de compartir en redes sociales
- `gallo_custom_menu()` - Menú personalizado con grid responsive
- Taxonomía personalizada "series" para agrupar posts relacionados
- Paginación sin texto redundante, solo números y navegación

### Optimizaciones
- Head limpio: eliminados emojis, RSS feeds innecesarios, shortlinks, meta generator
- Eliminación de wp-embed.js
- Imágenes con lazy loading y object-fit
- Transiciones CSS suaves en hover states

## Empezando

### Instalación

Para utilizar Gallardo en WordPress solo hace falta tener una instalación activa y descargar los archivos del repositorio dentro del directorio de plantillas.

```bash
cd <directorio_wp>/wp-content/themes
git clone https://github.com/linkmoises/gallardo.git
```

Ahora es cuestión de cambiar los permisos al usuario de nuestra instalación:

```bash
chown -R www-data:www-data <directoriowp>/wp-content/themes
```

Luego en el panel de control de WordPress, en _Apariencia_ > _Temas_ activar la plantilla.

### Construido con

- [Tailwind CSS](https://tailwindcss.com/) - Framework CSS utilizado (CDN)
- [FontAwesome](https://fontawesome.com/) - Para los íconos
- [WordPress](https://wordpress.org/) - CMS

## Autor

- **Moisés Serrano Samudio** - [linkmoises](https://github.com/linkmoises)
