<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo base_url('/inicio')?>">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/obras')?>">Obras</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/subastas')?>">Subastas</a>
            </li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div>
            <h2 class="mb-2">Subastas de la semana</h2>
        </div>
        <hr class="dropdown-divider" />
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-auto">
                <div class="card h-100" style="width: 18rem;">
                    <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                    <div class="card-body">
                        <h5 class="card-title bg-black">Un abrazo a la vida</h5>
                        <p class="card-text bg-black">Arte abstracto</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$100.99</li>
                        <li class="list-group-item">115 x 98 x 45 cm</li>
                        <a href="#" class="list-group-item">Artista Gota</a>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Guardar</a>
                        <a href="#" class="card-link">Ofertar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card h-100" style="width: 18rem;">
                    <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                    <div class="card-body">
                        <h5 class="card-title bg-black">Un abrazo a la vida</h5>
                        <p class="card-text bg-black">Arte abstrcato</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$100.99</li>
                        <li class="list-group-item">115 x 98 x 45 cm</li>
                        <a href="#" class="list-group-item">Artista Gota</a>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Guardar</a>
                        <a href="#" class="card-link">Ofertar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card h-100" style="width: 18rem;">
                    <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                    <div class="card-body">
                        <h5 class="card-title bg-black">Un abrazo a la vida</h5>
                        <p class="card-text bg-black">Arte abstracto</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$100.99</li>
                        <li class="list-group-item">115 x 98 x 45 cm</li>
                        <a href="#" class="list-group-item">Artista Gota</a>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Guardar</a>
                        <a href="#" class="card-link">Ofertar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card h-100" style="width: 18rem;">
                    <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                    <div class="card-body">
                        <h5 class="card-title bg-black">Un abrazo a la vida</h5>
                        <p class="card-text bg-black">Arte abstracto</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$100.99</li>
                        <li class="list-group-item">115 x 98 x 45 cm</li>
                        <a href="#" class="list-group-item">Artista Gota</a>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Guardar</a>
                        <a href="#" class="card-link">Ofertar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card h-100" style="width: 18rem;">
                    <img src="<?php echo base_url('img/recursos/ejemploGA.jpg')?>" class="card-img-top" alt="imagenPublicacion">
                    <div class="card-body">
                        <h5 class="card-title bg-black">Un abrazo a la vida</h5>
                        <p class="card-text bg-black">Arte abstracto</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$100.99</li>
                        <li class="list-group-item">115 x 98 x 45 cm</li>
                        <a href="#" class="list-group-item">Artista Gota</a>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Guardar</a>
                        <a href="#" class="card-link">Ofertar</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<hr>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<!--<script>
</script>
-->
<?php echo $this->endSection(); ?>