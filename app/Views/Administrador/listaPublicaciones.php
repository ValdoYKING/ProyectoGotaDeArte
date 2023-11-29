<?php echo $this->extend('Plantilla/disenioAdmin'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo base_url('/inicioadmin')?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/publicacionesLista')?>">Lista de publicaciones</a>
            </li>
        </ol>
    </nav>
</div>

<section>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('message-update')) { ?>
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
            <h2 class="mb-2">Lista de Publicaciones | Gota de Arte</h2>
        </div>
        <hr class="dropdown-divider" />
        <div>
            <!-- table -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre Obra</th>
                            <th>Fotos</th>
                            <th>descripcion</th>
                            <th>Medidas</th>
                            <th>Precio</th>
                            <th>Estatus</th>
                            <th>Artista</th>
                            <th>Fecha Publicada</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($publicacion as $publicacion): ?>

                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?php echo $publicacion->nombre ?></span></td>
                            <td><img src="<?php echo base_url($publicacion->foto)?>" width="50" height="50" alt="Avatar" class="rounded-circle"></td>
                            <td><?php echo $publicacion->descripcion?></td>
                            <td><?php echo $publicacion->medidas ?></td>
                            <td>$<?php echo $publicacion->precio ?>.00</td>
                            <td><a class="dropdown-item" method="POST" href="<?php echo base_url('/Admin/actualizarPublicacion/'.$publicacion->id) ?>">
                            <?php if($publicacion->estatus_subasta == 1){

                            echo '<span class="badge bg-label-warning me-1">En subasta</span>';
                            } else if($publicacion->estatus_subasta == 0) {

                            echo '<span class="badge bg-label-primary me-1">Publicado</span>';
                            }
                            ?>
                            </a></td>

                            <td>
                                    <?php if (isset($datosPersonales[$publicacion->fk_usuario_artista])) : ?>
                                        <?php foreach ($datosPersonales[$publicacion->fk_usuario_artista] as $datoPersonal) : ?>
                                            <?php echo $datoPersonal->nombre ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                            <td><?php echo $publicacion->fecha_creacion ?></td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <!--<a class="dropdown-item" href="<?php echo base_url('/Admin/mostrarObra/'.$publicacion->id) ?>"><i class="bx bx-edit-alt me-1"></i>Editar</a>-->                                        
                                        <a class="dropdown-item" href="<?php echo base_url('/Admin/eliminarPublicacion/'.$publicacion->id) ?>"><i class="bx bx-trash me-1"></i>Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- fin table -->
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