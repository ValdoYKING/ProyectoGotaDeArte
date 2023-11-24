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
            <h2 class="mb-2">Actualizar publicación</h2>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="form" action="<?php echo base_url('/Artista/ActualizarArtista/'.$publicacion->id)?>" enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Fotografía</label>
                                <img src="<?php echo base_url($publicacion->foto) ?>" alt="Imagen Obra" height="200" width="200" >                                  
                                <div class="input-group">
                                    <span id="foto2" class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" id="foto" name="foto"  aria-describedby="fotos" aria-label="Cargar" accept="image/*">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nombre de la obra</label>
                                <div class="input-group input-group-merge">
                                    <span id="nombre2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Mi obra" value="<?php echo $publicacion->nombre ?>" aria-label="Mi obra" pattern="[A-Za-záéíóúüÁÉÍÓÚÜ ]+" aria-describedby="basic-icon-default-fullname2" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Descripción</label>
                                <div class="input-group input-group-merge">
                                    <span id="descripcion2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Describa su obra"  aria-label="Describa su obra" aria-describedby="basic-icon-default-message2" required><?php echo $publicacion->descripcion ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Medidas</label>
                                <div class="input-group input-group-merge">
                                    <span id="medidas2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <!-- <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Alto x largo x ancho" aria-label="Alto x largo x ancho" aria-describedby="basic-icon-default-company2" /> -->
                                    <input class="form-control" type="text" name="medidas" id="medidas" placeholder="Alto x largo x ancho" value="<?php echo $publicacion->medidas ?>" aria-label="Alto x largo x ancho" pattern="[CMXcmx0-9 ]+" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Precio</label>
                                <div class="input-group input-group-merge">
                                    <span id="precio2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input class="form-control" type="number" name="precio" id="precio" placeholder="Valor estimado" value="<?php echo $publicacion->precio ?>" aria-label="Valor estimado..." pattern="[0-9]+" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <small class="text-light fw-medium">¿Disponible para subasta?</small>
                                <?php 
                            if($publicacion->estatus_subasta == 1){
                            ?>
                                <div class="form-check mt-3">
                                <input name="status" class="form-check-input" type="radio" value="1" id="status"  onclick="mostrarPreguntaR()" checked/>
                                <label class="form-check-label" for="defaultRadio1">
                                    Si
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="status" class="form-check-input" type="radio" value="0" id="status"  onclick="ocultarPreguntaR()"/>
                                <label class="form-check-label" for="defaultRadio2">
                                    No
                                </label>
                            </div>
                            <div id="preguntaR" class="mb-3 hidden">
                                <label class="form-label" for="basic-icon-default-company">
                                    ¿Qué precio deseas que tu obra inicie en la subasta?
                                </label>
                                <input type="number" class="form-control" name="Psubasta" id="Psubasta" value="<?php echo $subasta['precioInicial'] ?>"  readonly>
                            </div>
                            <?php
                            } else if ($publicacion->estatus_subasta == 0){
                            ?>
                                <div class="form-check mt-3">
                                    <input name="status" class="form-check-input" type="radio" value="1" id="status"  onclick="mostrarPregunta()"/>
                                    <label class="form-check-label" for="defaultRadio1">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="0" id="status" onclick="ocultarPregunta()" checked/>
                                    <label class="form-check-label" for="defaultRadio2">
                                        No
                                    </label>
                                </div>
                            <div id="pregunta" class="mb-3 hidden">
                                    <label class="form-label" for="basic-icon-default-company">
                                        ¿Qué precio deseas que tu obra inicie en la subasta?
                                    </label>
                                    <input type="number" class="form-control" pattern="[0-9]+" name="Psubasta" id="Psubasta" value="">
                            </div>
                            <?php   
                            }
                            ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
                            <a href="<?php echo base_url('Artista/publicacionesArtista')?>" class="btn btn-danger">Cancelar</a>

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