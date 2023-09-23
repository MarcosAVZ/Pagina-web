<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="../css/noticias.css">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
</head>

<body>
    <?php
    include_once('header.php');
    ?>
    <section id="noticias">
        <div class="noticia">
            <?php
            include_once('../conexion.php');

            $sql = "SELECT * FROM noticias";
            $resultado = $conexion->query($sql);
            // validación para mostrar los datos
            if ($resultado->num_rows > 0) {
                // hay información que mostrar
                while ($row = $resultado->fetch_assoc()) {
                    // if ($row["imagen"]) {
                    //     echo "<img src='" . $row["imagen"] . "' alt='Imagen de la noticia'>";
                    // }
                    echo "<h3>" . $row["titulo"] . "<h3>";
                    echo "<p>" . $row["contenido"] . "<p>";
                }
            } else {
                echo "<p>No hay noticia actual</p>";
            }
            $conexion->close();
            ?>
        </div>
    </section>

</body>

</html>