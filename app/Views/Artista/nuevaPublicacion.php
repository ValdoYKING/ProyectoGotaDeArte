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
            <h2 class="mb-2">Nueva publicación</h2>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Fotografía</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Cargar">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Subir</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nombre de la obra</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Mi obra" aria-label="Mi obra" aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Descripción</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <textarea id="basic-icon-default-message" class="form-control" placeholder="Describa su obra" aria-label="Describa su obra" aria-describedby="basic-icon-default-message2"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Medidas</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <!-- <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Alto x largo x ancho" aria-label="Alto x largo x ancho" aria-describedby="basic-icon-default-company2" /> -->
                                    <input class="form-control" type="text" id="html5-text-input" placeholder="Alto x largo x ancho" aria-label="Alto x largo x ancho" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Precio</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input class="form-control" type="text" id="html5-number-input" placeholder="Valor estimado" aria-label="Valor estimado..." />
                                </div>
                            </div>
                            <div class="mb-3">
                                <small class="text-light fw-medium">¿Disponible para subasta?</small>
                                <div class="form-check mt-3">
                                    <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2" checked />
                                    <label class="form-check-label" for="defaultRadio2">
                                        No
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
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