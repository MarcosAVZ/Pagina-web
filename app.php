<!DOCTYPE html>
<html>
<head>
  <title>Descargas</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 100px;
    }
    
    .button {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px;
      font-size: 18px;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 5px;
    }
    
    #message {
      margin-top: 20px;
      font-size: 18px;
      color: #ff0000;
    }
  </style>
</head>
<body>
  <?php
  if (isset($_POST['download-desktop'])) {
    // URL de descarga de la aplicación de escritorio
    $desktopAppURL = "https://drive.google.com/drive/folders/18UQuHL9QEpNaJ802Gx_BKu0hmbDzqzGe?usp=sharing";
    echo '<script>window.open("' . $desktopAppURL . '")</script>';
  } elseif (isset($_POST['download-mobile'])) {
    echo '<p id="message">Lo sentimos, la aplicación móvil aún no está disponible.</p>';
  }
  ?>
  
  <h1>Descargas</h1>
  
  <form method="post">
    <input type="submit" name="download-desktop" value="Descargar Aplicación de Escritorio" class="button">
    <input type="submit" name="download-mobile" value="Descargar Aplicación Móvil" class="button">
  </form>
  
  <a href="index.php" class="button" style="position: absolute; top: 10px; left: 10px;">Volver</a>
</body>
</html>