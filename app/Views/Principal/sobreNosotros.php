<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a id="inicio-link" href="<?php echo base_url('/inicio') ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a id="info-link" href="<?php echo base_url('/info') ?>">Sobre nosotros</a>
            </li>
        </ol>
    </nav>
</div>
<h1 id="acerca-titulo">Acerca de Nosotros</h1>
<hr>
<div>
    <br>
    <p id="descripcion-general">El objetivo de GotaDeArte es crear una plataforma en línea que facilite la publicación, exhibición y
        venta de obras de arte, además de ofrecer la opción de subasta para los amantes del arte.
        Queremos conectar a artistas talentosos con coleccionistas y amantes del arte, brindando una
        experiencia enriquecedora y accesible en el mundo del arte</p>
    </br>
</div>
<div>
    <h2 id="proyecto-titulo">Sobre el proyecto GotaDEArte</h2>
    <br>
    <p id="proyecto-descripcion">"GotaDeArte" es un proyecto dedicado a la creación de una plataforma en línea que busca inspirar y promover la apreciación del arte en todas sus formas. La página web "GotaDeArte" es un espacio digital donde artistas de todo el mundo pueden mostrar sus obras, y donde los amantes del arte pueden explorar, aprender y conectarse con la creatividad.</p>
    <br>
    <p id="proyecto-objetivo">Nuestro objetivo es apoyar a la comunidad artística, proteger y fortalecer la identidad digital de sus miembros y generar ingresos del arte. GotaDeArte fomenta la creatividad en una variedad de formas, patrocinando la innovación de las industrias del arte y alta tecnología, entregando diversos premios y proyectos especiales. Al unirte a GotaDeArte, expandirás tus límites. Lanzando tu arte en el espacio de Internet, empezarás a formar parte de un mundo creativo creciente.</p>
</div>
<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<!--<script>
</script>
-->
<?php echo $this->endSection(); ?>