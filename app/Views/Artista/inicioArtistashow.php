<?php echo $this->extend('Plantilla/disenioArtista'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/inicioartista')?>">/Inicio</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <h2> Detalles de  la obra <?php echo $publicaciones->nombre;?></h2>

</section>
<hr>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<script>

</script>

<?php echo $this->endSection(); ?>