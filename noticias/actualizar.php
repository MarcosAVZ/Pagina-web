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
        //actualizar registros
        $id = $_POST['id'];
        $titulo =  mysqli_real_escape_string($conexion, $_POST['titulo']);
        $contenido =  mysqli_real_escape_string($conexion, nl2br($_POST['contenido']));

        $sql = "UPDATE noticias SET titulo = '$titulo', contenido = '$contenido' WHERE id = $id";

        if ($conexion->query($sql) === TRUE) {
            $conexion->close();
            header('Location: listar.php');
        }
        $conexion->error;
        $conexion->close();
    }

    $sql = "SELECT * FROM noticias";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        echo "<section id='form-noticias'>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<form action='actualizar.php' method='post'><br>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<textarea name='titulo'>" . $row['titulo'] . "</textarea>";
            echo "<textarea class='contenido' name='contenido'>" . $row['contenido'] . "</textarea>";
            echo "<br><button class='boton' type='submit'>Enviar</button><br></form>";
        }
        echo "</section>";
    }

    ?>
</body>


</html>