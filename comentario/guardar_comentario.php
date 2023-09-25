<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Activa el manejo de excepciones

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conexion = new mysqli('localhost', 'root', '', 'phpmyadmin');

        if ($conexion->connect_error) {
            die('Hubo un fallo en la conexión: ' . $conexion->connect_error);
        }

        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        } else {
            $usuario = "Anónimo";
        }

        $comentario = $_POST["comentario"];
        $puntuacion = $_POST["puntuacion"];

        $sql = "INSERT INTO comentarios (nombre_usuario, comentario, puntuacion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt !== false) { // Verifica si la preparación fue exitosa
            $stmt->bind_param("ssi", $usuario, $comentario, $puntuacion);

            if ($stmt->execute()) {
                echo "Comentario guardado exitosamente.";
            } else {
                echo "Error al guardar el comentario: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta.";
        }

        $conexion->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Acceso no válido.";
}
?>