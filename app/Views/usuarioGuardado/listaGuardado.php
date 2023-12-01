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
                <?php if (session()->has('mensaje-guardado')) : ?>
                    <div class="alert alert-success">
                        <?php echo session('mensaje-guardado'); ?>
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
        <?php foreach ($obrasGuardadas as $obra): ?>
    <div class="col-auto">
        <div class="card h-100" style="width: 18rem;">
            <?php if (isset($dataObraGuardado[$obra->id])): ?>
                <?php $obraArtista = $dataObraGuardado[$obra->id]; ?>
                <img src="<?php echo $obraArtista->foto ?>" height="250" width="200" class="card-img-top" alt="imagenPublicacion">
                <div class="card-body">
                    <h5 class="card-title bg-black"><?php echo $obraArtista->nombre ?></h5>
                    <p class="card-text bg-black"><?php echo $obraArtista->descripcion ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">$<?php echo $obraArtista->precio ?></li>
                    <li class="list-group-item"><?php echo $obraArtista->medidas ?></li>
                    <a href="#" class="list-group-item"><?php echo $obraArtista->artista ?></a>
                </ul>
            <?php endif; ?>
            <div class="card-body">
                <a href="<?php echo base_url('/CuadroArte/obraCliente/' . $obra->id) ?>" class="card-link">Ver</a>
                <button type="button" class="btn btn-primary" onclick="guardarObra()">Guardar</button>
                <input type="text" name="id" value="<?php echo $obra->id ?>">
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