<?php echo $this->extend('Plantilla/disenioAutenticacion'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container-xxl">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Verifica si hay un mensaje flash y muéstralo -->
            <?php if (session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo session('message'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Resto del contenido de tu vista de inicio de sesión -->
</div>
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <a href="<?php echo base_url('/') ?>" class="app-brand-link gap-2">
                            <span class="app-brand-logo">
                                <img src="<?php echo base_url('img/recursos/logotipoGA_zoom.png') ?>" alt="Logo" height="150">
                            </span>
                        </a>
                    </div>
                    <h3 class="mb-1">Gota de arte | Bienvenido</h3>
                    <p class="mb-1">Por favor, inicie sesión o registrese para continuar</p>
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo session('error'); ?>
                        </div>
                    <?php endif; ?>


                    <form id="formAuthentication" class="mb-3" action="<?php echo base_url('/autenticarInicio') ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="correo" name="email-username" placeholder="Ingrese su correo" autofocus />
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
                            <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
                            <!-- <a href="<?php echo base_url('/inicio') ?>"class="btn btn-primary d-grid w-100">Iniciar sesión</a> -->
                        </div>
                    </form>

                    <p class="text-center">
                        <span>¿No tienes cuenta?</span>
                        <a href="<?php echo base_url('/registrar') ?>">
                            <span>Registrate</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agrega este código en tu vista para el modal -->
<div class="modal fade" id="errorModal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error de autenticación</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Credenciales incorrectas. Por favor, inténtalo de nuevo.
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Croissant jelly beans donut apple pie. Caramels bonbon lemon drops. Sesame snaps lemon drops lemon drops liquorice icing bonbon pastry pastry carrot cake. Dragée sweet sweet roll sugar plum.</p>
                <p>Jelly-o cookie jelly gummies pudding cheesecake lollipop macaroon. Sweet chocolate bar sweet roll carrot cake. Sweet roll sesame snaps fruitcake brownie bear claw toffee bonbon brownie.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>
<!--  AREA DE SCRIPTS -->
<?php echo $this->section('scripts'); ?>

<!-- <script>

</script> -->

<?php echo $this->endSection(); ?>