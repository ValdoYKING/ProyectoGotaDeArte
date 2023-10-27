<?php echo $this->extend('Plantilla/disenioAutenticacion'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div>
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="<?php echo base_url('/') ?>" class="app-brand-link gap-2">
                            <span class="app-brand-logo">
                                <img src="<?php echo base_url('img/recursos/logotipoGA_zoom.png') ?>" alt="Logo" height="150">
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">Gota de arte | Bienvenido</h3>
                    <p class="mb-1">Crea tu cuenta</p>
                    <section>
                        <div id="mensajeError" class="alert alert-danger" style="display: none;">
                            Por favor, complete todos los campos.
                        </div>
                    </section>
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo session('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form id="formAuthentication" class="mb-3" action="<?php echo base_url('/registrar-usuario') ?>" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="Nombre" placeholder="Ingrese su nombre" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Ingrese sus apellidos" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="correo" name="email-username" placeholder="Enter your email or username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Contraseña</label>
                                <a href="auth-forgot-password-basic.html">
                                    <small>Olvide mi contraseña</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="contrasenia" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="term_cond" name="term_cond"/>
                                <label class="form-check-label" for="term_cond"> Acepto terminos y condiciones </label>
                            </div>
                        </div>
                        <section>
                            <div id="mensajeContrasenia" class="alert alert-danger" style="display: none; margin-top: 10px;">
                                La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, un número y un caracter especial.
                            </div>
                        </section>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit" onclick="return validarFormulario()">Registrarme</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>¿Ya tienes cuenta?</span>
                        <a href="<?php echo base_url('/login') ?>">
                            <span>Inicia sesión</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>
    function validarFormulario() {
        var nombre = document.getElementById('nombre');
        var apellidos = document.getElementById('Apellidos');
        var email = document.getElementById('correo');
        var contrasenia = document.getElementById('contrasenia');
        var term_cond = document.getElementById('term_cond');

        var camposCompletos = true;

        // Validación de nombre
        if (nombre.value.trim() === '' || !/^[a-zA-Z]+$/.test(nombre.value) || nombre.value.length > 18) {
            nombre.style.border = '1px solid red';
            camposCompletos = false;
        } else {
            nombre.style.border = '1px solid #ced4da';
        }

        // Validación de apellidos (permite letras y espacios)
        var apellidosRegex = /^[a-zA-Z\s]+$/;
        if (!apellidosRegex.test(apellidos.value.trim()) || apellidos.value.length > 80) {
            apellidos.style.border = '1px solid red';
            camposCompletos = false;
        } else {
            apellidos.style.border = '1px solid #ced4da';
        }
        // Validación de correo
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value.trim())) {
            email.style.border = '1px solid red';
            camposCompletos = false;
        } else {
            email.style.border = '1px solid #ced4da';
        }

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

        // Validación de términos y condiciones
        if (!term_cond.checked) {
            term_cond.style.outline = '1px solid red';
            camposCompletos = false;
        } else {
            term_cond.style.outline = 'none';
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



</script>
<?php echo $this->endSection(); ?>