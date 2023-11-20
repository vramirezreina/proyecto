<?php
include '../vistas/encabezado.php';
?>
<link rel="stylesheet" href="../CSS/servicios.css">
<div class="servicios">
        <div class="tab1 active" data-tab="electricidad" onclick="showContent('electricidad')">Electricidad</div>
        <div class="tab1" data-tab="automatizacion" onclick="showContent('automatizacion')">Automatización Industrial</div>
    </div>

    <div class="content2">
        <div class="tab-content2 active" data-tab="electricidad">
            <div class="container">
                <div class="card">
                    <img src="../img/Element/Electricidad/Electrohuila.jpg" alt="">
                    <div class="intro">
                        <h1>Legalización de proyectos de media y baja tensión ante la prestadora de servicios</h1>
                        <p>Legalización de proyectos corresponde a memorias de cálculo, diseños, tramitologia de la comercializadora del servicio de energía con su respectiva legalización.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/Element/Electricidad/google earth.png" alt="">
                    <div class="intro">
                        <h1>Levantamiento con GPS Garmin de redes electrícas</h1>
                        <p></p>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/Element/Electricidad/contruccion de media tension.jpeg" alt="">
                    <div class="intro">
                        <h1>Construcción de media tensión</h1>
                        <p>Se debe realizar una inspección de campo. Realizar la proyección de la red a instalar con sus respectivos GPS, vértices y distancias como la del cálculo del transformador que se va a instalar.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/Element/Electricidad/contruccion de baja tension.jpg" alt="">
                    <div class="intro">
                        <h1>Construcción de baja tensión</h1>
                        <p>Distribución de posteria, con sus respectivos cables trenzados, con su iluminación y proyección a usuario final.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/Element/Electricidad/Intalaciones internas.jpeg" alt="">
                    <div class="intro">
                        <h1>Instalaciones internas</h1>
                        <p>La instalación interna hace referencia a la disponibilidad de servicios como usuario residencial. Instalación de acometida, instalación de caja del tablero principal como la de un circuito de casa</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/Element/Electricidad/Intalaciones equipo a presion.jpg" alt="">
                    <div class="intro">
                        <h1>Instalación equipos a presión</h1>
                        <p>La instalación de equipos de presión es un conjunto de sistema electrico con un sistema hidráulico, en el cual se debe calcular y proyectar las salidas. El sistema de hpi que maneja el equipo para su buen funcionamiento en todo y cada uno de su salida.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content2" data-tab="automatizacion">
        <div class="container">
            <div class="card">
                <img src="../img/Element/instalacion procesos automatizados.jpg" alt="">
                <div class="intro">
                    <h1>Automatización Procesos Industriales</h1>
                    <p>Uso de tecnologías y sistemas para realizar tareas en entornos industriales de forma automática, sin intervención humana directa. Incluye sensores, sistemas de control.</p>
                </div>
            </div>
            <div class="card">
                <img src="../img/Element/contruccion tableros 1.jpeg" alt="">
                <div class="intro">
                    <h1>Construcción de Tableros a 220v y 440v</h1>
                    <p>La construcción de tableros a 220V y 440V se trata de armar cajas eléctricas que ayudan a distribuir la electricidad de manera segura en lugares industriales.</p>
                </div>
            </div>
            <div class="card">
                <img src="../img/Element/Mantenimiento despues.jpg" alt="">
                <div class="intro">
                    <h1>Mantenimiento preventivo y correctivo de procesos industriales</h1>
                    <p>Son las prácticas diseñadas para asegurar el funcionamiento eficiente y confiable de los equipos y sistemas en entornos industriales.</p>
                </div>
            </div>
            <div class="card">
                <img src="../img/Element/Mantenimiento.jpg" alt="">
                <div class="intro">
                    <h1>Asesoria e instalación de procesos automatización con nuevas tecnologías domóticas</h1>
                    <p>Implica brindar servicios especializados para implementar sistemas inteligentes en entornos residenciales o comerciales. </p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="../JS/servicios.js"></script>
<?php
include '../vistas/footer.php';
?>
