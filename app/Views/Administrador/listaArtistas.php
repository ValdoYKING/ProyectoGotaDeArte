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
                <a href="<?php echo base_url('/artistasLista')?>">Lista de artistas</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Lista de Artistas | Gota de Arte</h2>
        </div>
        <hr class="dropdown-divider" />
        <div>
            <!-- table -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Foto</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($usuarios as $usuario): ?>

                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?php echo $usuario->id ?></span></td>
                            <td>
                            <?php if(isset($datosPersonales[$usuario->id])): ?>
                                <?php foreach($datosPersonales[$usuario->id] as $datoPersonal): ?>
                                    <?php echo $datoPersonal->nombre ?>
                                    <?php endforeach; ?>
                            <?php endif; ?>
                            </td>
                            <td>
                            <?php if(isset($datosPersonales[$usuario->id])): ?>
                                <?php foreach($datosPersonales[$usuario->id] as $datoPersonal): ?>
                                    <?php echo $datoPersonal->a_paterno ?>
                                    <?php endforeach; ?>
                            <?php endif; ?>
                            </td>
                            <td><?php echo $usuario->correo ?></td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="<?php echo base_url('img/avatars/5.png')?>" alt="Avatar" class="rounded-circle">
                                    </li>
                                </ul>
                            </td>
                            <td>
                            <?php if($usuario->estatus_user == 1){
                                echo '<span class="badge bg-label-primary me-1">Activo</span>';
                            } else if($usuario->estatus_user == 0) {
                                echo '<span class="badge bg-label-danger me-1">Inactivo</span>';
                            }
                            ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('/get_artista/'.$usuario->id)?>"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="<?php echo base_url('/Admin/eliminarartista/'.$usuario->id)?>"><i class="bx bx-trash me-1"></i>Delete</a>                                    
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- fin tabkle -->
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