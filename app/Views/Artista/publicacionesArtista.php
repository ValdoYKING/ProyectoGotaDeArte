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
                <a href="<?php echo base_url('/Artista/publicacionesArtista')?>">Publicaciones</a>
            </li>
        </ol>
    </nav>
</div>
<section>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if(session()->has('message')) {?>
                        <div class="alert alert-success">
                            <?php echo session('message'); ?>
                        </div>
                    <?php } else if (session()->has('message-update')) { ?>
                        <div class="alert alert-primary">
                            <?php echo session('message-update'); ?>
                        </div>
                    <?php } else if(session()->has('message-delete')){?>
                        <div class="alert alert-danger">
                            <?php echo session('message-delete'); ?>
                        </div>
                    <?php } else if(session()->has('error')){?>
                        <div class="alert alert-danger">
                            <?php echo session('message-delete'); ?>
                        </div>
                    <?php } ?> 
                        
                </div>
            </div>
        </div>
    <div class="container">
        <div>
            <h2 class="mb-2">Mis publicaciones mas recientes</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-2 row-cols-md-4 g-5">
            <?php foreach($publicaciones as $publicacion): ?>
                <div class="col-auto">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo base_url($publicacion->foto)?>" height="250" width="200" class="card-img-top" alt="imagenPublicacion">
                        <div class="card-body">
                            <h5 class="card-title bg-black"><?php echo $publicacion->nombre ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p><?php echo $publicacion->descripcion ?></p>
                            <li class="list-group-item">$<?php echo $publicacion->precio ?>.00</li>
                            <li class="list-group-item"><?php echo $publicacion->medidas ?></li>
                            <a href="#" class="list-group-item">
                                <?php if (isset($datosPersonales[$publicacion->fk_usuario_artista])) : ?>
                                    <?php foreach ($datosPersonales[$publicacion->fk_usuario_artista] as $datoPersonal) : ?>
                                        <?php echo $datoPersonal->nombre ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </a>
                            <?php if($publicacion->estatus_subasta == 1){

                                    echo '<span class="badge bg-label-warning me-1">En subasta</span>';
                                    } else if($publicacion->estatus_subasta == 0) {

                                    echo '<span class="badge bg-label-primary me-1">Publicado</span>';
                                    }
                                    ?>
                        </ul>
                        <div class="card-body">
                        <a href="<?php echo base_url('/inicioartista/obraArtista/'.$publicacion->id)?>" class="card-link">Ver</a>
                        <a href="<?php echo base_url('/inicioartista/consultarObra/'.$publicacion->id)?>" class="card-link">Editar</a>
                        <a href="<?php echo base_url('/Artista/EliminarArtista/'.$publicacion->id)?>" class="card-link">Eliminar</a>                        </div>
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