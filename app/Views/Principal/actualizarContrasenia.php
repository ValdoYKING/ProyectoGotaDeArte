<?php echo $this->extend('Plantilla/disenioPass'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container-xxl centered-containerX">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-1">Actualiza tu contraseña</h3>
                    <div id="mensajeError" class="alert alert-danger" style="display: none;">
                        Por favor, complete todos los campos.
                    </div>
                    <form id="formAuthentication" class="mb-3" action="<?php echo base_url('/actualizaPassUser') ?>" method="POST">
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="passwordAnterior">Contraseña anterior</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="contrasenia" class="form-control" name="passwordAnterior" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="passwordAnterior" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="passwordNuevo">Nueva contraseña</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="contrasenia" class="form-control" name="passwordNuevo" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="passwordNuevo" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div id="mensajeContrasenia" class="alert alert-danger" style="display: none; margin-top: 10px;">
                            La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, un número y un caracter especial.
                        </div>
                        <div class="mb-3">
                            <!-- <button class="btn btn-primary d-grid w-100" type="submit">Actualizar</button> -->
                            <button class="btn btn-primary d-grid w-100" type="submit" onclick="return validarFormulario()">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<script>
    function validarFormulario() {
        var contrasenia = document.getElementById('contrasenia');

        var camposCompletos = true;

        // Validación de contraseña
        var contraseniaRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!contraseniaRegex.test(contrasenia.value.trim())) {
            contrasenia.style.border = '1px solid red';
            document.getElementById('mensajeContrasenia').style.display = 'block';
            camposCompletos = false;
        } else {
            contrasenia.style.border = '1px solid #ced4da';
            document.getElementById('mensajeContrasenia').style.display = 'none';
        }

        if (!camposCompletos) {
            document.getElementById('mensajeError').style.display = 'block';
            return false;
        } else {
            document.getElementById('mensajeError').style.display = 'none';
            return true;
        }
    }
</script>
<?php echo $this->endSection(); ?>