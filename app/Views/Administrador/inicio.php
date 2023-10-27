<?php echo $this->extend('Plantilla/disenioAdmin'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
            <a href="<?php echo base_url('/inicioadmin')?>">/Inicio</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Ultimas publicaciones...</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-2 row-cols-md-4 g-5">
            <?php foreach($publicacion as $publicacion): ?>
                <div class="col-auto">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                        <div class="card-body">
                            <h5 class="card-title bg-black"><?php echo $publicacion->nombre ?></h5>
                            <p class="card-text bg-black">Arte abstracto</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p><?php echo $publicacion->descripcion ?></p>
                            <li class="list-group-item">$100.99</li>
                            <li class="list-group-item"><?php echo $publicacion->medidas ?></li>
                            <a href="#" class="list-group-item">Artista Gota</a>
                        </ul>

                    </div>
                </div>
                <?php endforeach; ?>


            
        </div>
    </div>
</section>
<hr>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<!--<script>
</script>
-->
<?php echo $this->endSection(); ?>