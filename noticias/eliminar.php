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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Para eliminar registros
        if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'Si') {
            $id = $_POST['id'];

            $sql = "DELETE FROM noticias WHERE id = $id";

            if ($conexion->query($sql) === TRUE) {
                header('Location: listar.php');
            } else {
                echo "Error al eliminar el registro: " . $conexion->error;
            }
        } else {
            // Si no se confirmó, redirige nuevamente a la lista de noticias
            header('Location: listar.php');
        }
    }

    $sql = "SELECT * FROM noticias";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        echo "<section id='form-noticias'>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<form action='eliminar.php' method='post'><br>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<textarea name='titulo' readonly>" . $row['titulo'] . "</textarea>";
            echo "<textarea class='contenido' name='contenido' readonly>" . $row['contenido'] . "</textarea>";
            echo "<br><button class='boton' type='submit' onclick='return confirmarEliminacion();'>Eliminar</button>";
            echo "<input type='hidden' name='confirmar' value='Si'>"; // Agregamos un campo oculto
            echo "</form>";
        }
        echo "</section>";
    }
    $conexion->close();
    ?>

    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este registro?");
        }
    </script>
</body>

</html>