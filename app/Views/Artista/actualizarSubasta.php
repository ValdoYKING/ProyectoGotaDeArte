<?php echo $this->extend('Plantilla/disenioArtista'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/inicioartista') ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/publicacionesartista') ?>">Publicaciones</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/nuevapublicacion') ?>">Nueva publicación</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Actualizar Subasta</h2>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="form" action="<?php echo base_url('/Artista/actualizarSubasta/'.$subasta['id'])?>" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Fotografía</label>
                                <div class="input-group">
                                    <img src="<?php echo base_url($subasta['fotos']) ?>" alt="Imagen Obra" height="200" width="200" >                                  
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nombre de la obra</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Mi obra" value="<?php echo $subasta['nombre'] ?>" aria-label="Mi obra" aria-describedby="basic-icon-default-fullname2"  readonly >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Precio de la obra</label>
                                <div class="input-group input-group-merge">
                                    <span id="precio2" class="input-group-text">$</span>
                                    <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $subasta['precioInicial'] ?>" aria-label="Mi obra" aria-describedby="basic-icon-default-fullname2" >
                                    <span id="precio2" class="input-group-text">.00</span>

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="html5-text-input" class="col-md-2 col-form-label">¿Cuándo quieres que sea tu subasta?</label>
                                <div class="input-group input-group-merge">
                                    <span id="subasta" class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <input type="datetime-local" id="subasta" min="<?php echo Date('Y-m-d H:i') ?>" name="subasta" class="form-control" aria-describedby="basic-icon-default-message2" value="<?php echo $subasta['fechaSubasta'] ?>" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="<?php echo base_url('Artista/subastaArt')?>" class="btn btn-danger">Cancelar</a>

                        </form>
                    </div>
                </div>
            </div>
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