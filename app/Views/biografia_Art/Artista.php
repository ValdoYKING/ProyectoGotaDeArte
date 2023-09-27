<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>



<div class="card bg-dark text-white">
    <img id="fondo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2aaNe-t8VZx5ApcfTKXzXA_FOk7oHlWO7hTWKdY-SmAfFRufOua5NLJxX6Bp-UR7uIik&usqp=CAU" class="card-img" alt="...">
    <div class="card-img-overlay">
        <div>
            <img id="perfil" class="card-img card-img-left" src="https://enciclopedia.net/wp-content/uploads/2015/02/Artista.jpg" alt="Card image" />
            <small class="text-muted"><?php echo $historia; ?></small></p>
            <p class="card-text">
            <button class=" btn btn-outline-dark" type="button">Seguir</button>

        </div>
        <div>
        <h5 class="card-title"><?php echo $artista; ?></h5>
        <h4 class="card-title"><?php echo $alias; ?></h4>
        <h3 class="card-title"><?php echo $nacionalidad; ?></h3>
        <p class="card-text"><?php echo $frase; ?></p>
        <p class="card-text"><?php echo $fecha_n; ?></p>

        </div>
    </div>
</div>
<div>
    <h3>Obras del artista</h3>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/2.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/13.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/4.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/18.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/19.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img class="card-img-top" src="assets/img/elements/20.jpg" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>