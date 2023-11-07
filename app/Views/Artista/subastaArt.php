<?php echo $this->extend('Plantilla/disenioArtista'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo base_url('/inicioartista')?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('Artista/subastaArt')?>">Subastas</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Subastas</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-2 row-cols-md-4 g-5">

        <?php foreach($subastas as $subastas): ?>
                <div class="col-auto">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo base_url($subastas['fotos'])?>" height="250" width="200" class="card-img-top" alt="imagenPublicacion">
                        <div class="card-body">
                            <h5 class="card-title bg-black"><?php echo $subastas['nombre'] ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p></p>
                            <li class="list-group-item"><?php echo $subastas['precioInicial'] ?></li>
                            <li class="list-group-item"><?php echo $subastas['fechaSubasta'] ?></li>
                            <a href="#" class="list-group-item">
                            <?php if (isset($datosPersonales[$subastas['fk_usuario']])) : ?>
                                        <?php foreach ($datosPersonales[$subastas['fk_usuario']] as $datoPersonal) : ?>
                                            <?php echo $datoPersonal->nombre ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                            </a>
                        </ul>
                        <div class="card-body">
                            <a href="<?php echo base_url('/inicioartista/obraArtista/'.$subastas['fk_obra'])?>" class="card-link">Ver</a>
                            <a href="<?php echo base_url('/Artista/eliminarSubasta/'.$subastas['id'])?>" class="card-link">Eliminar</a>
                            <a href="<?php echo base_url('/inicioartista/consultarSubasta/'.$subastas['id']) ?>" class="card-link">Editar</a>

                        </div>
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
    alert('HOla')
</script>
-->
<?php echo $this->endSection(); ?>