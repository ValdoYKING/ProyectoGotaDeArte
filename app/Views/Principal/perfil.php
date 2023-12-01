<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/inicio') ?>">/Inicio</a>
            </li>
        </ol>
    </nav>
</div>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('message-update')) : ?>
                    <div class="alert alert-info">
                        <?php echo session('message-update'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('message-update_pass')) : ?>
                    <div class="alert alert-success">
                        <?php echo session('message-update_pass'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h2 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mi perfil</span></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detalles del perfil</h5>
                    <div class="card-body">
                        <form id="form" method="POST" action="<?php echo base_url('/actualizarPerfilUsuario/' . $usuario->id) ?>" enctype="multipart/form-data">
                            <?php foreach ($datosPersonales as $datoPersonal) : ?>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <!-- <img src="< ?php echo base_url('img/avatars/userGA.png');?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" /> -->
                                            <img src="<?php
                                                        if ($datoPersonal->foto == " " || empty($datoPersonal->foto)) {
                                                            $rutaU = base_url('img/avatars/userGA.png');
                                                        } else {
                                                            $rutaU = base_url('img/usuarios/' . $datoPersonal->foto);
                                                        }
                                                        echo $rutaU; ?>" alt="Fotografía" class="d-block rounded" height="100" width="100" />
                                            <!-- <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" /> -->
                                            <input type="hidden" name="UrlPhotoUser[]" value="<?php
                                                                                                if ($datoPersonal->foto == " " || empty($datoPersonal->foto)) {
                                                                                                    $urlUserF = " ";
                                                                                                } else {
                                                                                                    $urlUserF = $datoPersonal->foto;
                                                                                                }
                                                                                                echo $urlUserF; ?>">
                                            <input class="form-control" type="file" id="userFoto" name="userFoto" accept="image/png, image/jpeg">
                                            <div class="button-wrapper">
                                                <!-- <label for="userFoto" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Subir foto</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i> -->
                                                <!-- <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" /> -->
                                                <!-- <input type="file" class="account-file-input" id="userFoto" name="userFoto" hidden accept="image/png, image/jpeg"> -->
                                                <!-- </label> -->

                                                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Predeterminado</span>
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" /><br>
                                    <div class="mb-3 col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="Nombre[]" placeholder="Mi nombre" value="<?php echo $datoPersonal->nombre; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Apellido_p" class="form-label">Primer apellido</label>
                                        <input type="text" class="form-control" id="Apellido_p" name="Apellido_p[]" placeholder="Apellido uno" value="<?php echo $datoPersonal->a_paterno; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Apellido_m" class="form-label">Segundo apellido</label>
                                        <input type="text" class="form-control" id="Apellido_m" name="Apellido_m[]" placeholder="Apellido dos" value="<?php echo $datoPersonal->a_materno; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="FechaNacimiento[]" placeholder="2021-06-18" value="<?php echo $datoPersonal->fecha_nacimiento; ?>" />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="descripcion" class="form-label">Cuentanos sobre ti...</label>
                                        <textarea class="form-control" id="descripcion" name="Descripcion[]" placeholder="Descripción"><?php echo $datoPersonal->descripcion; ?></textarea>
                                    </div>
                                <?php endforeach; ?>

                                <div class="mb-3 col-md-6">
                                    <label for="correo" class="form-label">Correo electronico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@mail.com" value="<?php echo $usuario->correo; ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                
                                </div>
                                <div class="mb-3 col-md-6">
                                <a href="<?php echo base_url('/actualizarContrasennaUsuario/' . $usuario->id) ?>">Cambiar contraseña</a>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
                                    <button type="reset" class="btn btn-outline-secondary"><a href="<?php echo base_url('/inicio') ?>">Cancelar y salir</a></button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<!-- <script>

</script> -->

<?php echo $this->endSection(); ?>