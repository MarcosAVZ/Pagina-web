<?php
session_start();
include_once("../conexion.php");
$conexion = conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <link rel="stylesheet" href="../css/comentarios.css">
</head>

<header>
<?php
if (isset($_SESSION['nombre_usuario'])) {
    // Si el usuario ha iniciado sesión, muestra un enlace que lo lleve a SesionIniciada.php
    echo '<a href="../SesionIniciada.php">Volver al Inicio</a>';
} else {
    // Si el usuario no ha iniciado sesión, muestra un enlace que lo lleve a index.php
    echo '<a href="../index.php">Volver al Inicio</a>';
}
?>
</header>

<body>
    <h1>Deja un comentario</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['nombre_usuario'])) {

            $nombre_usuario = $_SESSION['nombre_usuario'];

            if (!$nombre_usuario) {
                $nombre_usuario = "Anónimo";
            }
        } else {
            $nombre_usuario = "Anónimo";
        }

        $comentario = $_POST["comentario"];
        $puntuacion = $_POST["puntuacion"];

        $sql = "INSERT INTO comentarios (nombre_usuario, comentario, puntuacion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssi", $nombre_usuario, $comentario, $puntuacion);

        if ($stmt->execute()) {
            echo '<div id="mensaje-exito" class="mensaje-exito">Comentario guardado exitosamente.</div>';
            echo '<script>
                setTimeout(function() {
                    var mensajeExito = document.getElementById("mensaje-exito");
                    mensajeExito.style.display = "none";
                }, 3000);
            </script>';
        } else {
            echo "Error al guardar el comentario: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <form action="" method="post">
        <textarea name="comentario" rows="4" cols="50" placeholder="Escribe tu comentario"></textarea>
        <br>
        <label for="puntuacion">Puntuación:</label>
        <select name="puntuacion" id="puntuacion">
            <option value="1">1 estrella</option>
            <option value="2">2 estrellas</option>
            <option value="3">3 estrellas</option>
            <option value="4">4 estrellas</option>
            <option value="5">5 estrellas</option>
        </select>
        <br>
        <input type="submit" value="Enviar comentario">
    </form>
    <div class="comentarios">
        <?php
        $sql = "SELECT nombre_usuario, comentario, puntuacion, fecha_creacion FROM comentarios";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="comentario">';
                echo '<p class="usuario">' . $row['nombre_usuario'] . '</p>';
                echo '<p class="fecha">' . $row['fecha_creacion'] . '</p>';
                echo '<p class="puntuacion">' . $row['puntuacion'] . ' estrella(s)</p>';
                echo '<p class="texto-comentario">' . $row['comentario'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay comentarios anteriores.</p>';
        }

        $conexion->close();
        ?>
    </div>
</body>
</html>
