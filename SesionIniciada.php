<?php
session_start();
include_once('conexion.php');
$conexion = conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, intial scale=1.0">
    <title>Educar para Transformar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link href="css/Principio.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>

<?php //Ocultar la barra
	$showHeader = true;
	if (isset($_GET['scroll']) && $_GET['scroll'] === 'up') {
		$showHeader = false;
	}
	?>
<header class="header <?php if (!$showHeader) echo 'hidden';?>">
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
				<li class="nav-item active">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo "<a class='nav-link' href='Perfil.php'>Perfil</a>";
                }
                ?>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#quienes-somos">Quienes Somos</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#niveles-educativos">Niveles Educativos</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#bienestar-estudiantil">Bienestar estudiantil</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#galeria">Galeria</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#noticias">Noticias</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#contacto">Contacto</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href='comentario/comentario.php'>Comentarios</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#ubicacion">Ubicación</a>
				</li>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="app.php">Aplicacion</a>
				</li>
            </ul>
        </nav>
		<div id="IniciarSesion">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // Si el usuario ha iniciado sesión, mostrar "Cerrar Sesión"
                $nombre_de_usuario = $_SESSION['name'];
                echo '<a href="" class="iniciar">Hola ' . $nombre_de_usuario . '<br></a>';
                echo '<a href="logout.php" class="iniciar">Cerrar sesión</a>';
            } else {
                // Si el usuario no ha iniciado sesión, mostrar "Iniciar Sesión"
                echo '<a href="index.php" class="iniciar">Cerrar Sesion</a>';
            }
            ?>
        </div>
        <div id="logo">
            <img src="css/img/Logotipo.png" width="90" height="90" alt="logo"></a>
        </div>
    </div>
<script>
    var prevScrollPos = window.pageYOffset;

    window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;

      if (prevScrollPos > currentScrollPos) {
        // Show the header when scrolling up
        document.querySelector('.header').classList.remove('hidden');
      } else {
        // Hide the header when scrolling down
        document.querySelector('.header').classList.add('hidden');
      }

      prevScrollPos = currentScrollPos;
    };
  </script>

</header>

<body>

    <section id="Institucion">
        <div class="Institucion-foto">
            <h2>Educar Para Transformar</h2>
            <p>Institución de gestión privada de alta calidad educativa, ubicada en las afuera de la ciudad de Resistencia</p>
        </div>
    </section>

    <section id="quienes-somos">
        <div class="contenedor">
            <h2>Quiénes Somos</h2>

            <p>El Centro Educativo <strong>"EDUCAR PARA TRANSFORMAR"</strong> es una institución de gestión privada que se enorgullece de ofrecer una educación de alta calidad. Nuestra sede está estratégicamente ubicada en las afueras de la vibrante ciudad de Resistencia, donde tenemos el privilegio de estar rodeados por un entorno natural propicio para el aprendizaje.</p>

            <p>Con una trayectoria excepcional, nos preparamos para iniciar nuestras actividades en marzo de 2024. Nuestro compromiso es brindar a los estudiantes experiencias educativas enriquecedoras que les permitan crecer intelectualmente y desarrollar habilidades que los empoderarán para enfrentar los desafíos del futuro.</p>

            <p>En EDUCAR PARA TRANSFORMAR, creemos en la educación como un catalizador para el cambio. Nos esforzamos por inspirar y guiar a nuestros estudiantes hacia su máximo potencial, fomentando no solo el conocimiento académico, sino también valores como la ética, la responsabilidad y la empatía.</p>

            <p>Nuestro equipo de educadores altamente calificados está comprometido con la excelencia y la innovación en la enseñanza. Trabajamos en estrecha colaboración con nuestros estudiantes y sus familias para crear un ambiente de aprendizaje colaborativo y enriquecedor.</p>

            <p>En EDUCAR PARA TRANSFORMAR, creemos en el poder de la educación para cambiar vidas y comunidades. Esperamos con entusiasmo embarcarnos en este viaje educativo junto a nuestros estudiantes, contribuyendo a forjar un futuro brillante y lleno de posibilidades para todos.</p>
        </div>
    </section>


    <section id="niveles-educativos">
        <h3>Niveles Educativos</h3>
        <div class="contenedor">
            <div class="nivel-inicial">
                <div class="contenedorInicial-img"></div>
                <h2>Nivel Inicial</h2>
                <p>En este nivel, los salones de clase se convierten en refugios seguros donde los niños empiezan a comprender la magia de aprender. Cuentos que cobran vida, números que se transforman en amigos y proyectos que alimentan la curiosidad, todo forma parte de la aventura educativa que se despliega día a día.</p>
            </div>
            <div class="nivel-primario">
                <div class="contenedorPrimaria-img"></div>
                <h2>Nivel Primario</h2>
                <p>Los educadores en el nivel primario son como arquitectos de mentes jóvenes, construyendo los cimientos del pensamiento crítico, la alfabetización y las habilidades numéricas. A través de enfoques pedagógicos creativos y métodos de enseñanza interactivos, inspiran a los estudiantes a explorar el mundo que los rodea y a desarrollar una comprensión profunda de los conceptos fundamentales.</p>
            </div>
            <div class="nivel-secundario">
                <div class="contenedorSecundaria-img"></div>
                <h2>Nivel Secundario</h2>
                <p>En este nivel, las aulas son espacios de intercambio intelectual, donde se debaten ideas y se construyen conexiones que amplían los horizontes de los estudiantes. Proyectos colaborativos, investigaciones profundas y desafíos creativos fomentan un aprendizaje activo y significativo, preparando a los jóvenes para enfrentar los desafíos de un mundo en constante evolución.</p>
            </div>
        </div>
    </section>

    <section id="bienestar-estudiantil">
        <div class="contenedorBE">
            <h2>Bienestar Estudiantil</h2>
            <p>En "Educar Para Transformar", nos preocupamos por el bienestar de nuestros estudiantes. Ofrecemos una variedad de servicios y recursos para apoyar tu éxito académico y personal.</p>
            <ul>
                <li><strong>Servicios de Apoyo:</strong> Ofrecemos asesoramiento académico y asesoramiento psicológico para ayudarte a enfrentar desafíos académicos y personales.</li>
                <li><strong>Recursos de Salud:</strong> Contamos con una clínica de atención médica en el campus y proporcionamos información sobre salud y bienestar.</li>
                <li><strong>Programas de Bienestar:</strong> Participa en nuestros programas de ejercicio, yoga y meditación para mantener un equilibrio saludable en tu vida.</li>
                <li><strong>Recursos para la Vida Universitaria:</strong> Explora nuestros clubes estudiantiles, actividades deportivas y eventos sociales para enriquecer tu experiencia universitaria.</li>
                <li><strong>Políticas y Normas:</strong> Conoce nuestras políticas de bienestar estudiantil y nuestros compromisos con la igualdad y la diversidad.</li>
            </ul>
            <p>Estamos aquí para apoyarte en tu viaje académico y personal. No dudes en contactarnos si necesitas ayuda o información adicional.</p>
        </div>
    </section>

<section id="galeria">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>
<h1>Galería</h1>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $imageFolder = 'galeria/';
    $images = glob($imageFolder . '/*.*');
    $totalImages = count($images);

    for ($i = 0; $i < $totalImages; $i++) {
      $activeClass = ($i === 0) ? 'active' : '';
      echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="' . $activeClass . '"></li>';
    }
    ?>
  </ol>

  <div class="carousel-inner">
    <?php
    foreach ($images as $index => $image) {
      $activeClass = ($index === 0) ? 'active' : '';
      echo '<div class="carousel-item ' . $activeClass . '">';
      echo '<img class="d-block w-100 h-100 object-fit-cover" src="' . $image . '" alt="Image ' . ($index + 1) . '">';
      echo '</div>';
    }
    ?>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</section>

    <section id="noticias">
    <h1>Últimas Noticias</h1>
    <div class="noticia">
        <?php

        $sql = "SELECT * FROM noticias ORDER BY id DESC";
        $resultado = $conexion->query($sql);

        // validación para mostrar los datos
        if ($resultado->num_rows > 0) {
            // hay información que mostrar
            while ($row = $resultado->fetch_assoc()) {
                echo "<h3>" . $row["titulo"] . "</h3>";
                echo "<p><strong>Fecha de Publicación:</strong> " . $row["fecha"] . "</p>";
                echo "<p>" . $row["contenido"] . "</p>";
            }
        } else {
            echo "<p>No hay noticias actualmente.</p>";
        }

        if (isset($_SESSION['rol_id']) && $_SESSION['rol_id'] === 1) {
            // Mostrar contenido solo para administradores
            echo "<a href='noticias/noticias.php'>Noticias</a>";
        }
        $conexion->close();
        ?>
    </div>
</section>

    <section id="contacto">

        <form class="form">
            <style>
                @media screen and (max-width: 786px) {

                    .col-25,
                    .col-75,
                    input[type=submit] {
                        width: 100%;
                        margin-top: 0;
                    }
                }
            </style>
            <h2>Contactá con nosotros</h2>
            <p type="Name:"><input placeholder="Escriba su nombre aquí">Nombre</input></p>
            <p type="Email:"><input placeholder="Su email">Email</input></p>
            <p type="Message:"><input placeholder="Tu pregunta o mensaje">Asunto</input></p>
            <button>Enviar Mensaje</button>
            <div class="div-contact">
                <span class="fa fa-phone"></span>3624665544
                <span class="fa fa-envelope-o"></span> contactoEducar@example.com
            </div>
        </form>
        <div class="redes-sociales">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>

        </div>
    </section>
    <section id="ubicacion">
        <style>
                @media screen and (max-width: 786px) {
                    div {
                        width: 100%
                    }
                }
            </style>
        <div clase="contenedor">
            <h1>Ubicación</h1>
            <hr>
            <?php echo generarMapa(); ?>
        </div>
    </section>
</script>

</body>

<footer>
    <div class="contenedor">
        <p>&copy El Concilio 2023. Todos los derechos reservados </p>
    </div>
</footer>

</html>


<?php
function generarMapa()
{
    $latitud = -27.426436188663306;
    $longitud = -58.96603876347303;

    $mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5383.245333864868!2d' . $longitud . '!3d' . $latitud . '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1694100001902!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

    return $mapa;
}
?>