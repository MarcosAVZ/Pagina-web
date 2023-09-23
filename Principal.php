<?php
session_start();
include_once('conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pagina Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/Principio.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>

<header>
    <div class="contenedor">
        <div id="IniciarSesion">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // Si el usuario ha iniciado sesión, mostrar "Cerrar Sesión"
                $nombre_de_usuario = $_SESSION['name'];
                echo '<a href="" class="iniciar">Hola ' . $nombre_de_usuario . '<br></a>';
                echo '<a href="logout.php" class="iniciar">Cerrar sesión</a>';
            } else {
                // Si el usuario no ha iniciado sesión, mostrar "Iniciar Sesión"
                echo '<a href="iniciar_sesion.html" class="iniciar">Iniciar Sesión</a>';
            }
            ?>
        </div>
        <nav class="menu">
            <ul>
                <a href="Perfil.php">Perfil </a>
                <a href="#quienes-somos">Quienes Somos </a>
                <a href="#niveles-educativos">Niveles Educativos </a>
                <a href="#bienestar-estudiantil">Bienestar estudiantil </a>
                <a href="galeria.php">Galeria</a>
                <a href="#noticias">Noticias </a>
                <a href="#ubicacion">Ubicación </a>
            </ul>
        </nav>
        <div id="logo">
            <img src="css/img/Logotipo.png" width="100" height="100" alt="logo"></a>
        </div>
    </div>
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

    <section id="instalaciones">
        <h1>INSTALACIONES</h1>
        <div class="Instalaciones-clase">
            <div class="seccion1">
                <h2>Pileta de natación</h2>
            </div>
            <div class="seccion2">
                <h2>Cancha de fútbol</h2>
            </div>
            <div class="seccion3">
                <h2>Pista de atletismo</h2>
            </div>
            <div class="seccion4">
                <h2>Gimnasio Cubierto</h2>
            </div>
            <div class="seccion5">
                <h2>Comedor</h2>
            </div>
            <div class="seccion6">
                <h2>Laboratorios</h2>
            </div>
        </div>
    </section>


    <section id="noticias">
        <h1>Últimas Noticias</h1>
        <div class="noticia">
            <img src="img/noticia2.jpg" alt="Noticia 2">
            <!-- <img src="img/noticia1.jpg" alt="Noticia 1">'; -->
            <?php

            $sql = "SELECT * FROM noticias ORDER BY id DESC";
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

            if (isset($_SESSION['rol_id']) && $_SESSION['rol_id'] === 1) {
                // Mostrar contenido solo para administradores
                echo "<a href='noticias/noticias.php'>Noticias </a>";
            }
            $conexion->close();
            ?>
        </div>
    </section>

    <section id="ubicacion">
        <div clase="contenedor">
            <h1>Ubicación</h1>
            <hr>
            <?php echo generarMapa(); ?>
        </div>
    </section>

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