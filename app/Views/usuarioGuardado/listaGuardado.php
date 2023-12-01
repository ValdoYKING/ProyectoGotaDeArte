<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/inicio') ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/obras') ?>">Obras guaradadas</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('mensaje-eliminar')) : ?>
                    <div class="alert alert-danger">
                        <?php echo session('mensaje-eliminar'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('mensaje-canasta-guaradado')) : ?>
                    <div class="alert alert-info">
                        <?php echo session('mensaje-canasta-guaradado'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h2 class="mb-2">Obras Guardadas</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-2 row-cols-md-4 g-5">
            <?php foreach ($obrasDetalles as $obra) : ?>
                <div class="col-auto">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo base_url($obra->foto) ?>" height="250" width="200" class="card-img-top" alt="imagenPublicacion">

                        <div class="card-body">
                            <h5 class="card-title bg-black"><?php echo $obra->nombre ?></h5>
                            <p class="card-text bg-black">Arte abstracto</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p><?php echo $obra->descripcion ?></p>
                            <li class="list-group-item">$<?php echo $obra->precio ?></li>
                            <li class="list-group-item"><?php echo $obra->medidas ?></li>
                            <a href="#" class="list-group-item">Artista Gota</a>
                        </ul>
                        <div class="card-body">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('/CuadroArte/obraCliente/' . $obra->id) ?>" class="card-link">Ver</a><br>
                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('/eliminaobraguardado/' . $obra->id) ?>" class="card-link colorButtonError">Eliminar</a><br> -->
                            <form action="<?= base_url('/eliminaobraguardado/' . $obra->id) ?>" method="post">
                                <button type="submit" class="btn card-link colorButtonError">Eliminar</button>
                            </form>
                            <form action="<?= base_url('/agregarcanastaGuardado/' . $obra->id) ?>" method="post">
                                <button type="submit" class="btn card-link colorButton">Agregar a mi canasta</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<hr>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<script>
    function guardarObra() {
        base_url = '<?php echo base_url(); ?>';
        // Obtiene el valor del elemento de entrada oculto
        var id = document.querySelector('input[name="id"]').value;

        // Crea una solicitud HTTP
        var request = new Request(base_url + '/guardarobra/' + id, {
            method: 'POST'
        });

        // Envia la solicitud
        fetch(request);
    }
</script>

<?php echo $this->endSection(); ?>