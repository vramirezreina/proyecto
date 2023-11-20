<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php
    include '../vistas/encabezado.php';
    ?>
    <div class="contenerdor_video">
        <div class="video">
            <h1>¡Bienvenidos a Soluciones Electricas RYR!</h1>
            <p>Somos una empresa que brinda soluciones integrales en el campo de la electricidad y la automatización, con el propósito de contribuir al desarrollo sostenible y a la satisfacción de nuestros clientes.</p>
        </div>
    </div>
        <video src="../img/video/video_1.mp4" muted autoplay loop>
        </video>
        <div class="capa"></div>
    
        <!--Vision y mision-->
        <div class="slider">
            <div class="tab active" data-tab="mision">Misión</div>
            <div class="tab" data-tab="vision">Visión</div>
        </div>
    
        <div class="content">
            <div class="tab-content active" data-tab="mision">
                Nuestra misión es proporcionar soluciones eléctricas y de automatización innovadoras y de alta calidad para satisfacer las necesidades de nuestros clientes en diferentes sectores, mejorando la eficiencia, seguridad y productividad de sus instalaciones. Trabajamos en equipo con nuestros clientes para entender sus necesidades específicas y ofrecer soluciones personalizadas y rentables, mientras nos aseguramos de cumplir con los estándares de seguridad y medio ambiente. Buscamos mantener una relación de confianza y respeto con nuestros clientes, empleados y proveedores, y contribuir al desarrollo sostenible de la sociedad.
            </div>
            <div class="tab-content" data-tab="vision">
                Ser reconocidos como líderes en el mercado de servicios eléctricos y de automatización, ofreciendo soluciones innovadoras, eficientes y personalizadas para diferentes sectores. Ser reconocidos por nuestro compromiso con la calidad, la seguridad y el medio ambiente, y por nuestra capacidad de adaptarnos a las necesidades cambiantes del mercado. Ser la mejor opción para nuestros clientes, empleados y proveedores, y contribuir al desarrollo sostenible de la sociedad, mediante la implementación de prácticas responsables y el fomento de la innovación y la mejora continua en todos nuestros procesos y servicios.
            </div>
        </div>

    <h1>Servicios</h1>
    <div style="margin-left: 80px; width: 80%; height: 3px; background-color: #25d366; box-shadow: 0px 0px 5px #25d366;"></div>
    <div class="tarjetas-container">
        <div class="tarjeta">
            <img src="../img/imagen1.jpg" alt="Imagen de la tarjeta">
            <div class="contenido">
                <h1>ELECTRICIDAD</h1>
                <a href="servicios.html">Ver servicios</a>
            </div>
        </div>
        <div class="tarjeta">
            <img src="../img/imagen2.jpeg" alt="Imagen de la tarjeta">
            <div class="contenido">
                <h1>AUTOMATIZACIÓN</h1>
                <a href="servicios.html">Ver servicios</a>
            </div>
        </div>
    </div>


    <h1>Equipo de Trabajo</h1>
    <div style="margin-left: 80px; width: 80%; height: 3px; background-color: #ec7c1cff; box-shadow: 0px 0px 5px #ec7c1cff;"></div>
    <div class="team">
        <div class="team_box">
            <div class="profile">
                <img src="../img/Usuarios/jose.jpeg">

                <div class="info">
                    <h2 class="name">Jose Leonard <br> Ramirez Reina</h2>
                </div>

            </div>

            <div class="profile">
                <img src="../img/Usuarios/juan_jose.jpeg">

                <div class="info">
                    <h2 class="name">Juan Jose <br> Ramirez Reina</h2>
                </div>

            </div>
    </div>
    <br><br>
    <h1>Ubicación</h1><br>
    <div style="margin-left: 80px; width: 80%; height: 3px; background-color: #25d366; box-shadow: 0px 0px 5px #25d366;"></div>
    <div class="container" style="width:100%;">
    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20Neiva+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href='https://maps-generator.com/'></a>
    </div>
    <?php
    include '../vistas/footer.php';
    ?>
    <script src="../JS/index.js"></script>
</body>
</html>