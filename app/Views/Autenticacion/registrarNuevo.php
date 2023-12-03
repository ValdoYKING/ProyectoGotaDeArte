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

                            <div class="input-group input-group-merge">
                                <input type="password" id="contrasenia" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="term_cond" name="term_cond" />
                                <label class="form-check-label" for="term_cond" data-bs-toggle="modal" data-bs-target="#fullscreenModalTyC"> Acepto terminos y condiciones</label>
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



<!-- Modal TyC-->
<div class="modal fade" id="fullscreenModalTyC" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Terminos y Condiciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h1>Términos y Condiciones - GotaDeArte</h1>

                    <div class="terminos">
                        <p>Fecha de entrada en vigencia: 01/10/2023</p>

                        <p>Lea atentamente estos Términos y Condiciones ("Términos") antes de utilizar la galería en línea GotaDeArte ("Sitio web"). Al acceder y utilizar este Sitio web, usted acepta cumplir y estar sujeto a estos Términos. Si no está de acuerdo con estos Términos, le recomendamos que no utilice este Sitio web.</p>

                        <ol>
                            <li>
                                <strong>Uso del Sitio Web</strong>
                                <ol>
                                    <li>
                                        <strong>Uso Aceptable:</strong> El Sitio web GotaDeArte está destinado a la visualización y promoción de obras de arte. Los usuarios pueden explorar, comentar y, en su caso, comprar obras de arte. Cualquier uso del Sitio web con fines ilegales o que infrinja estos Términos no está permitido.
                                    </li>
                                    <li>
                                        <strong>Contenido del Usuario:</strong> Los usuarios pueden cargar y compartir su propio contenido, como imágenes de obras de arte. Los usuarios son los únicos responsables de la precisión y legalidad de dicho contenido. GotaDeArte se reserva el derecho de eliminar contenido que viole estos Términos.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Propiedad Intelectual</strong>
                                <ol>
                                    <li>
                                        <strong>Derechos de Autor:</strong> Todo el contenido del Sitio web, incluidas las imágenes de obras de arte, está protegido por derechos de autor. No se permite la reproducción, distribución o uso no autorizado de este contenido.
                                    </li>
                                    <li>
                                        <strong>Derechos del Usuario:</strong> Los usuarios que cargan sus obras de arte en el Sitio web mantienen los derechos de autor de sus obras. GotaDeArte solo obtiene los derechos necesarios para mostrar, promocionar y vender dichas obras en el Sitio web.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Privacidad</strong>
                                <ol>
                                    <li>
                                        <strong>Política de Privacidad:</strong> La Política de Privacidad del Sitio web describe cómo se recopila, utiliza y comparte la información de los usuarios. Al utilizar el Sitio web, usted acepta la Política de Privacidad.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Compras</strong>
                                <ol>
                                    <li>
                                        <strong>Compras en Línea:</strong> Los usuarios pueden realizar compras en línea de obras de arte a través del Sitio web. Los términos y condiciones específicos de compra se describen durante el proceso de compra.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Responsabilidad</strong>
                                <ol>
                                    <li>
                                        <strong>Uso bajo su propio riesgo:</strong> El uso del Sitio web se realiza bajo su propio riesgo. GotaDeArte no se hace responsable de pérdidas o daños resultantes del uso del Sitio web.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Modificaciones y Terminación</strong>
                                <ol>
                                    <li>
                                        <strong>Modificación de Términos:</strong> GotaDeArte se reserva el derecho de modificar estos Términos en cualquier momento. Los usuarios serán notificados de cualquier cambio importante. El uso continuado del Sitio web después de cualquier modificación constituirá su aceptación de los nuevos términos.
                                    </li>
                                    <li>
                                        <strong>Terminación:</strong> GotaDeArte se reserva el derecho de suspender o terminar su acceso al Sitio web en caso de incumplimiento de estos Términos.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <strong>Ley Aplicable</strong>
                                <ol>
                                    <li>
                                        <strong>Estos Términos se rigen por las leyes del México y cualquier disputa se someterá a la jurisdicción exclusiva de los tribunales de Estado de México.</strong>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
        if (nombre.value.trim() === '' || !/^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/.test(nombre.value) || nombre.value.length > 18) {
            nombre.style.border = '1px solid red';
            camposCompletos = false;
        } else {
            nombre.style.border = '1px solid #ced4da';
        }

        // Validación de apellidos (permite letras y espacios)
        var apellidosRegex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
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