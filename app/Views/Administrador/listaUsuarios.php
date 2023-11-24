<?php echo $this->extend('Plantilla/disenioAdmin'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/inicioadmin') ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/usuariosLista') ?>">Lista de usuarios</a>
            </li>
        </ol>
    </nav>
</div>

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (session()->has('message-update')) { ?>
                    <div class="alert alert-primary">
                        <?php echo session('message-update'); ?>
                    </div>
                <?php } else if (session()->has('message-delete')) { ?>
                    <div class="alert alert-danger">
                        <?php echo session('message-delete'); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Lista de Usuarios | Gota de Arte</h2>
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
                        <?php foreach ($usuarios as $usuario) : ?>

                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?php echo $usuario->id ?></span></td>
                                <td>
                                    <?php if (isset($datosPersonales[$usuario->id])) : ?>
                                        <?php foreach ($datosPersonales[$usuario->id] as $datoPersonal) : ?>
                                            <?php echo $datoPersonal->nombre ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($datosPersonales[$usuario->id])) : ?>
                                        <?php foreach ($datosPersonales[$usuario->id] as $datoPersonal) : ?>
                                            <?php echo $datoPersonal->a_paterno ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $usuario->correo ?></td>

                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <?php if (isset($datosPersonales[$usuario->id])) : ?>
                                        <?php foreach ($datosPersonales[$usuario->id] as $datoPersonal) : ?>
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up"
                                             title="<?php
                                                        if (empty($datoPersonal->nombre) || $datoPersonal->foto == " ") {
                                                            $titulo = 'usuario';
                                                        } else {
                                                            $titulo = $datoPersonal->nombre;;
                                                        }
                                                        echo $titulo;
                                                        ?>">
                                            <img src="<?php
                                                        if ($datoPersonal->foto == " " || empty($datoPersonal->foto)) {
                                                            $rutaU = base_url('img/avatars/userGA.png');
                                                        } else {
                                                            $rutaU = base_url('img/usuarios/'.$datoPersonal->foto);
                                                        }
                                                        echo $rutaU;
                                                        ?>" alt="Fotografía" class="rounded-circle" />
                                        <?php endforeach; ?>      
                                        <?php endif; ?>                                  
                                            <!-- <img src="<?php echo base_url('img/avatars/5.png') ?>" alt="Avatar" class="rounded-circle"> -->
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <?php if ($usuario->estatus_user == 1) {
                                        echo '<span class="badge bg-label-primary me-1">Activo</span>';
                                    } else if ($usuario->estatus_user == 0) {
                                        echo '<span class="badge bg-label-danger me-1">Inactivo</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url('/get_usuario/' . $usuario->id) ?>"><i class="bx bx-edit-alt me-1"></i>Editar</a>
                                            <a class="dropdown-item" href="<?php echo base_url('/Admin/eliminarusario/' . $usuario->id) ?>"><i class="bx bx-trash me-1"></i>Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Mostrar enlaces de paginación con estilos personalizados -->
                <div class="pagination">
                    <?php echo $pager->links(); ?>
                </div>

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