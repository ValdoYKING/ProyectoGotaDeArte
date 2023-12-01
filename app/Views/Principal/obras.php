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
                <a href="<?php echo base_url('/obras') ?>">Obras</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('mensaje-guardado')) : ?>
                    <div class="alert alert-success">
                        <?php echo session('mensaje-guardado'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->has('mensaje-canasta')) : ?>
                    <div class="alert alert-success">
                        <?php echo session('mensaje-canasta'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h2 class="mb-2">Obras Publicadas recientemente</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-2 row-cols-md-4 g-5">
            <?php foreach ($publicaciones as $publicacion) : ?>
                <div class="col-auto">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo base_url($publicacion->foto) ?>" height="250" width="200" class="card-img-top" alt="imagenPublicacion">

                        <div class="card-body">
                            <h5 class="card-title bg-black"><?php echo $publicacion->nombre ?></h5>
                            <p class="card-text bg-black">Arte abstracto </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p><?php echo $publicacion->descripcion ?></p>
                            <li class="list-group-item">$100.99</li>
                            <li class="list-group-item"><?php echo $publicacion->medidas ?></li>
                            <a href="#" class="list-group-item">Artista Gota</a>
                        </ul>
                        <div class="card-body">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('/CuadroArte/obraCliente/' . $publicacion->id) ?>" class="card-link">Ver</a><br>
                            <form action="<?= base_url('/guardarobra/' . $publicacion->id) ?>" method="post">
                                <button type="submit" class="btn card-link colorButton">Guardar</button>
                            </form>
                            <form action="<?= base_url('/agregarcanasta/' . $publicacion->id) ?>" method="post">
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
<!-- <script>

</script> -->

<?php echo $this->endSection(); ?>