<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: iniciar_sesion.html');
    exit;
}

include_once('conexion.php');

// validar el stmt
$stmt = $conexion->prepare("SELECT password, email FROM cuentas WHERE id = ?");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/perfil.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="contenedor">
            <div id="volver">
                <a href="index.php">Inicio</a>
                <?php
                if (isset($_SESSION['rol_id']) && $_SESSION['rol_id'] === 1) {
                    // Mostrar contenido solo para administradores
                    echo "<a href='noticias/noticias.php'>Noticias </a>";
                } ?>

            </div>
        </div>
    </header>

    <main>
        <section id="perfil">
            <div class="contenedor">
                <h1><?= $_SESSION['name'] ?></h1>
                <div id="datos-usuario">
                    <img src="imagen_de_perfil.jpg" alt="Foto de Perfil">
                    <!-- <p>Descripción: </p> -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="contenedor2">
            <p>&copy El Concilio 2023. Todos los derechos reservados </p>
        </div>
    </footer>
</body>

</html>


<!-- En el HTML, reemplaza los datos estáticos con los datos dinámicos obtenidos de la base de datos -->
<!-- <img src="<?php echo $fotoPerfilUsuario; ?>" alt="Foto de Perfil">
<h2><?php echo $nombreUsuario; ?></h2>
<p>Rol: <?php echo $rolUsuario; ?></p>
<p>Descripción: <?php echo $descripcionUsuario; ?></p>

<form action="procesar_imagen.php" method="post" enctype="multipart/form-data">
    <label for="imagen">Selecciona una imagen de perfil:</label>
    <input type="file" name="imagen" id="imagen">
    <input type="submit" value="Cargar Imagen">
</form> -->