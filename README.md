# Gallardo

Gallardo es una plantilla personalizada para WordPress inspirada en el diseño limpio de Medium.com y DEV.to.

## Características

- Diseño limpio y ligero con estética moderna
- Slider de series rotatorio infinito (4 items)
- Sistema de navegación con navbar
- Hero section personalizable
- Optimización del head de WordPress (eliminación de scripts innecesarios)
- Soporte para miniaturas en posts
- Barra de administración oculta en el frontend

## Estructura del tema

```
gallardo/
├── css/
│   └── custom.css          # Estilos personalizados
├── images/                 # Imágenes del tema
├── include/
│   └── function-series.php # Funciones relacionadas con series
├── footer.php              # Pie de página
├── functions.php           # Funciones del tema
├── header.php              # Cabecera
├── hero.php                # Sección hero
├── home.php                # Página principal
├── navbar.php              # Navegación
├── series.php              # Slider de series
└── single.php              # Plantilla de posts individuales
```

## Cambios recientes (2026)

### functions.php
- Añadidos comentarios explicativos en español para todas las funciones
- Funciones organizadas:
  - `get_navbar()` - Incluye el navbar
  - `gallo_reading_time()` - Estima tiempo de lectura
  - `gallo_cita_random()` - Muestra cita aleatoria
  - `gallo_deregister_scripts()` - Elimina script wp-embed
- Limpieza del head: eliminados emojis, RSS, shortlinks, meta generator, y otros elementos innecesarios

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

- [Tailwind CSS](https://tailwindcss.com/) - Framework CSS utilizado
- [FontAwesome](https://fontawesome.com/) - Para los íconos
- [WordPress](https://wordpress.org/) - CMS

## Autor

- **Moisés Serrano Samudio** - [linkmoises](https://github.com/linkmoises)
