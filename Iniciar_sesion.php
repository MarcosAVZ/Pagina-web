<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $correo = $_POST['correo'];
  $contrasena = $_POST['password'];

  $db = conectar();

  $query = "SELECT * FROM alumno WHERE correo = '$correo' AND password = '$contrasena'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  session_start();

  if ($row) {
    $nombreUsuario = $row['nombre'];
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['usuario'] = $row['id'];
    $_SESSION['tipo_usuario'] = 'alumno';
    header('Location: SesionIniciada.php');
    exit();
  }

  $query = "SELECT * FROM docente WHERE correo = '$correo' AND password = '$contrasena'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $nombreUsuario = $row['nombre'];
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['usuario'] = $row['id'];
    $_SESSION['tipo_usuario'] = 'docente';
    header('Location: SesionIniciada.php');
    exit();
  }

  $query = "SELECT * FROM padre WHERE correo = '$correo' AND password = '$contrasena'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $nombreUsuario = $row['nombre'];
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['usuario'] = $row['id'];
    $_SESSION['tipo_usuario'] = 'padre';
    header('Location: SesionIniciada.php');
    exit();
  }

  $query = "SELECT * FROM personal WHERE correo = '$correo' AND password = '$contrasena'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  if ($row) {
    $nombreUsuario = $row['nombre'];
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['usuario'] = $row['id'];
    $_SESSION['tipo_usuario'] = 'personal';
    header('Location: SesionIniciada.php');
    exit();
  }

  $error = "Credenciales inválidas. Por favor, verifica tus datos.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="Css/styles.css">
  <title>Login</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 40px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-container .form-control {
      border-radius: 2px;
    }

    .login-container .btn-primary {
      width: 100%;
      border-radius: 2px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <h2>Iniciar Sesión</h2>
      <img src="Css/Logotipo200x200.png" class="rounded mx-auto d-block">
      <br>
      <form method="POST" action="">
        <div class="form-group">
          <label class="h5" for="username">Nombre de Usuario</label>
          <input type="text" class="form-control" name="correo" placeholder="Ingrese su correo electrónico">
        </div>
        <div class="form-group">
          <label class="h5" for="password">Contraseña</label>
          <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </form>
    </div>
  </div>

  <?php if (isset($error)) : ?>
    <div class="alert mx-auto mt-2" style="max-width: 400px">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $error; ?></p>
    </div>
  <?php endif; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
