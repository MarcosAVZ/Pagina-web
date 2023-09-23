<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
</head>

<body>
    <?php
    include_once('../conexion.php');
    include_once('header.php');
    ?>
    <section id="insertar">
        <form action="insertar.php" method="post">
            <pre>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" required>

            <label for="contenido">Contenido</label>
            <textarea name="contenido" rows="4" required></textarea>

            <input type="submit" value="Enviar">
            </pre>
        </form>
    </section>
</body>

</html>
<?php
include_once('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    $sql = "INSERT INTO noticias (titulo, contenido) VALUES (?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ss", $titulo, $contenido);

        if ($stmt->execute()) {
            $stmt->close();
            $conexion->close();
            header('Location: listar.php');
            exit;
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
}
$conexion->close();
?>