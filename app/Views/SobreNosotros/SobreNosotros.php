<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Agrega aquí tus estilos CSS si los tienes -->
</head>
<body>
    <header>
        <h1>¿Quienes somos?</h1>
        <nav>
        </nav>
    </header>
    <section id="GotaDeArte">
        <h2>Nosotros</h2>
        <p>Bienvenido a nuestra página. Aquí puedes encontrar información sobre quiénes somos y qué hacemos.</p>
        <p>GotaDeArte anima y apoya a artistas talentosos locales, 
        y también les proporciona visibilidad a nivel nacional. 
        Nuestros creadores contemporáneos dejan su huella compartiendo sus visiones de la belleza, 
        abriendo mentes y uniendo a las personas.
Todos los días, trabajamos de la mano con ellos para lograr el mejor status y proponer una versión 4.0 del mundo del arte</p>
        <!-- Agrega más contenido sobre tu equipo, misión, visión, etc. -->
    </section>
    
    <footer>
        <p>Derechos de autor &copy; <?php echo date('Y'); ?> GotaDeArte</p>
    </footer>
</body>


<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>