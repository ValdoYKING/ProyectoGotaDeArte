<?php echo $this->extend('Plantilla/disenioAdmin'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo base_url('/inicioadmin')?>">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/publicacionesLista')?>">Publicaciones</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/subastasLista')?>">Lista de subastas</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Lista de Subastas | Gota de Arte</h2>
        </div>
        <hr class="dropdown-divider" />
        <div>
            <!-- table -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Fotos</th>
                            <th>Precio Inicial</th>
                            <th>Precio Final</th>
                            <th>Usuario</th>
                            <th>Fecha de la Subasta</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php foreach($subasta as $subasta): ?>

                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium"><?php echo $subasta['nombre'] ?></span></td>
                            <td><img src="<?php echo base_url($subasta['fotos'])?>" width="50" height="50" alt="Avatar" class="rounded-circle">
<!--                                 <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="<?php echo base_url('img/avatars/5.png')?>" alt="Avatar" class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                        <img src="<?php echo base_url('img/avatars/6.png')?>" alt="Avatar" class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                        <img src="<?php echo base_url('img/avatars/7.png')?>" alt="Avatar" class="rounded-circle">
                                    </li>
                                </ul> -->
                            </td>
                            <td>$<?php echo $subasta['precioInicial'] ?>.00</td>
                            <td>$<?php echo $subasta['precioPagado'] ?>.00</td>
                            <td>
                                <?php if (isset($datosPersonales[$subasta['fk_usuario']])) : ?>
                                    <?php foreach ($datosPersonales[$subasta['fk_usuario']] as $datoPersonal) : ?>
                                        <?php echo $datoPersonal->nombre ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $subasta ['fechaSubasta'] ?></td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('/Admin/mostrarSubasta/'.$subasta ['id']) ?>"><i class="bx bx-edit-alt me-1"></i>Editar</a>
                                        <a class="dropdown-item" href="<?php echo base_url('/Admin/eliminarSubasta/'.$subasta ['id']) ?>"><i class="bx bx-trash me-1"></i>Eliminar</a>
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