<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <link rel="stylesheet" href="../css/comentarios.css">
</head>

<header>
<a href="../index.php">Volver al Inicio</a>
</header>


<body>
    <?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        // Usuario registrado, mostrar nombre de usuario
        echo "<p>Usuario: " . $_SESSION['usuario'] . "</p>";
    }
    ?>
    <h1>Deja un comentario</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica si el usuario está autenticado
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        } else {
            // Si no está autenticado, establece un nombre de usuario anónimo
            $usuario = "Anónimo";
        }

        // Obtén los datos del formulario
        $comentario = $_POST["comentario"];
        $puntuacion = $_POST["puntuacion"];

        // Validaciones de datos aquí si es necesario

        // Conexión a la base de datos (debes tener la conexión configurada)
        include("../conexion.php"); // Asegúrate de tener el archivo de conexión correcto

        // Insertar el comentario en la tabla 'comentarios'
        $sql = "INSERT INTO comentarios (nombre_usuario, comentario, puntuacion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssi", $usuario, $comentario, $puntuacion);

        if ($stmt->execute()) {
            // Comentario guardado exitosamente
            echo '<div id="mensaje-exito" class="mensaje-exito">Comentario guardado exitosamente.</div>';
            echo '<script>
                setTimeout(function() {
                    var mensajeExito = document.getElementById("mensaje-exito");
                    mensajeExito.style.display = "none";
                }, 3000); // Ocultar el mensaje después de 3 segundos
            </script>';
        } else {
            echo "Error al guardar el comentario: " . $stmt->error;
        }

        // Cierra la conexión
        $stmt->close();
        $conexion->close();
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
        // Conexión a la base de datos (debes tener la conexión configurada)
        include("../conexion.php"); // Asegúrate de tener el archivo de conexión correcto

        // Consulta para obtener los comentarios anteriores
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

        // Cierra la conexión
        $conexion->close();

        ?>
    </div>

    <!-- Agrega un script para manejar el envío del formulario sin recargar la página -->
    <script>
    $(document).ready(function() {
        $('#comentarioForm').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

            // Obtiene los datos del formulario
            var comentario = $('#comentario').val();
            var puntuacion = $('#puntuacion').val();

            // Realiza una solicitud AJAX para enviar los datos del formulario
            $.ajax({
                type: 'POST',
                url: 'guardar_comentario.php', // Ruta al archivo PHP que maneja la inserción del comentario
                data: {
                    comentario: comentario,
                    puntuacion: puntuacion
                },
                success: function(response) {
                    // Maneja la respuesta del servidor (por ejemplo, muestra un mensaje de éxito)
                    alert('Comentario guardado exitosamente.');
                    // Limpia el formulario
                    $('#comentario').val('');
                    $('#puntuacion').val('1');
                    // Recarga los comentarios
                    cargarComentarios();
                },
                error: function(error) {
                    // Maneja los errores si es necesario
                    console.error('Error al guardar el comentario:', error);
                }
            });
        });

        // Función para cargar los comentarios después de enviar uno nuevo
        function cargarComentarios() {
            // Realiza una solicitud AJAX para obtener los comentarios
            $.ajax({
                type: 'GET',
                url: 'obtener_comentarios.php', // Ruta al archivo PHP que obtiene los comentarios
                success: function(response) {
                    // Actualiza el contenido de la sección de comentarios
                    $('.comentarios').html(response);
                },
                error: function(error) {
                    // Maneja los errores si es necesario
                    console.error('Error al obtener los comentarios:', error);
                }
            });
        }

        // Carga los comentarios al cargar la página inicialmente
        cargarComentarios();
    });
    </script>
    </body>
    
</html>

