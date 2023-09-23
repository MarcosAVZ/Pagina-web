<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/galeria.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <main class="container">
        <div class="row galeria-title">
            <div class="col s12 center-align">
                <h1 class="titulo">Galería</h1>
            </div>
        </div>
        <div class="row galeria">
            <?php
            $directorio = 'galeria/';
            $imagenes = glob($directorio . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($imagenes as $imagen) {
                echo '<div class="col s12 m4 l3"><div class="material-placeholder">';
                echo '<img src="' . $imagen . '" alt="Imagen" class="responsive-img materialboxed">';
                echo '</div></div>';
            }
            ?>
        </div>
        <a href="Principal.php" class="waves-effect waves-teal btn-flat">Volver al inicio</a>
    </main>
    <footer>
        <div class="contenedor">
            <p>&copy El Concilio 2023. Todos los derechos reservados </p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>


</html>