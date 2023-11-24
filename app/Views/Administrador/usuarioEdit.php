<?php echo $this->extend('Plantilla/disenioAdmin'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/inicioadmin') ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/usuariosLista') ?>">Lista de usuarios</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/usuariosLista') ?>">Editar usuario</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Actualizar usuario</h2>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="form" action="<?php echo base_url('/actualizarUsuario/' . $usuario->id) ?>" method="POST" enctype="multipart/form-data">
                            <?php foreach ($datosPersonales as $datoPersonal) : ?>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="Nombre[]" placeholder="Mi nombre" value="<?php echo $datoPersonal->nombre; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="Apellido_p" class="form-label">Primer apellido</label>
                                    <input type="text" class="form-control" id="Apellido_p" name="Apellido_p[]" placeholder="Apellido uno" value="<?php echo $datoPersonal->a_paterno; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="Apellido_m" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" id="Apellido_m" name="Apellido_m[]" placeholder="Apellido dos" value="<?php echo $datoPersonal->a_materno; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="FechaNacimiento[]" placeholder="2021-06-18" value="<?php echo $datoPersonal->fecha_nacimiento; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="Descripcion[]" placeholder="Descripción"><?php echo $datoPersonal->descripcion; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="urlFoto" class="form-label">Fotografía</label> -->
                                    <!-- <img src="< ?php echo base_url($datoPersonal->foto); ?>" alt="Fotografía" /> -->
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Fotografía</label>
                                    <!-- <img src="< ?php echo base_url($datoPersonal->foto) ?>" alt="Imagen Obra" height="200" width="200"> -->
                                    <img src="<?php
                                                if ($datoPersonal->foto== " " || empty($datoPersonal->foto)) {
                                                    $rutaU = base_url('img/avatars/userGA.png');
                                                } else {
                                                    $rutaU = base_url('img/usuarios/'.$datoPersonal->foto);
                                                }
                                                echo $rutaU; ?>" alt="Fotografía" width="180" height="180" /><br>
                                    <input class="form-control" type="file" id="userFoto" name="userFoto">
                                    <input type="hidden" name="UrlPhotoUser" value="<?php
                                                if ($datoPersonal->foto == " " || empty($datoPersonal->foto)) {
                                                    $urlUserF = " ";
                                                } else {
                                                    $urlUserF = $datoPersonal->foto;
                                                }
                                                echo $urlUserF; ?>">
                                </div>
                            <?php endforeach; ?>
                            <div class="mb-3">
                                <label for="selectEstatus" class="form-label">Estatus</label>
                                <select id="selectEstatus" class="form-select" name="estatus">
                                    <option value="1" <?php echo ($usuario->estatus_user == 1) ? 'selected' : ''; ?>>Activo</option>
                                    <option value="0" <?php echo ($usuario->estatus_user == 0) ? 'selected' : ''; ?>>Inactivo</option>
                                </select>
                                <!-- Campo oculto para almacenar el valor seleccionado -->
                                <input type="hidden" id="estatusHidden" name="estatusHidden">
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@mail.com" value="<?php echo $usuario->correo; ?>" />
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="<?php echo base_url('/usuariosLista') ?>" class="btn btn-danger">Cancelar y salir</a>
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
<script>
    /* document.getElementById('selectEstatus').addEventListener('change', function() {
    document.getElementById('estatusHidden').value = this.value;
}); */
</script>
<?php echo $this->endSection(); ?>