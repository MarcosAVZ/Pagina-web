<?php
session_start();

include_once('conexion.php');

// se valida si se ha enviado información, con la función isset()
if (!isset($_POST['usuario'], $_POST['password'])) {

    // si no hay datos muestra error y redirecciona

    header('Location: iniciar_sesion.html');
}

// evitar inyección sql
if ($stmt = $conexion->prepare("SELECT id, password, foto FROM cuentas WHERE usuario = ?")) {

    // parámetros de enlace de la cadena s
    $stmt->bind_param('s', $_POST['usuario']);
    $stmt->execute();
}

// acá se valida si lo ingresado coincide con la base de datos
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password, $foto);
    $stmt->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña
    if ($_POST['password'] === $password) {
        // conexion exitosa, se crea la sesión
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['usuario'];
        $_SESSION['id'] = $id;
        // consulta para obtener el rol
        $stmt = $conexion->prepare("SELECT rol_id FROM usuarios_roles WHERE usuario_id = ?");
        $stmt->bind_param('i', $id); // 
        $stmt->execute();
        $stmt->bind_result($rol_id);
        if ($stmt->fetch()) {
            $_SESSION['usuario_id'] = $usuario_id;
            $_SESSION['rol_id'] = $rol_id;
        }
        header('Location: principal.php');
    } else {
        // usuario incorrecto
        echo '<label> Usuario o contraseña incorrecta </label>';
        header('Location: iniciar_sesion.html');
    }
}
$stmt->close();
