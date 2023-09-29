<?php echo $this->extend("Plantilla/disenio"); ?>
<?php echo $this->section("contenido"); ?>


<div id="carousel" class="carousel slide col-md-8 offset-md-2" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div id="caruselL" class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/galerías2.jpg'); ?>" alt="First slide" />
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
                <p></p>
            </div>
        </div>
        <div id="caruselL" class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/galeria.jpg'); ?>" alt="Second slide" />
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
                <p></p>
            </div>
        </div>
        <div id="caruselL" class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/images.jpg'); ?>" alt="Third slide" />
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
                <p></p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>


</div>
<br>
<!--Galeria-->
<div id="congaleria" class="row row-cols-1 row-cols-md-3 g-4">
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img  src="<?php echo base_url('img/elements/pintura/pintura1.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"> </h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img  src="<?php echo base_url('img/elements/pintura/pintura2.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img  src="<?php echo base_url('img/elements/pintura/pintura3.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img src="<?php echo base_url('img/elements/pintura/pintura4.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img src="<?php echo base_url('img/elements/pintura/pintura5.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img src="<?php echo base_url('img/elements/pintura/pintura6.jpg'); ?> " class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img src="<?php echo base_url('img/elements/pintura/pintura7.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img  src="<?php echo base_url('img/elements/pintura/pintura8.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
    <div id="galeria" class="col">
        <div class="card bg-dark text-white">
            <img src="<?php echo base_url('img/elements/pintura/pintura9.jpg'); ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"></p>
            </div>
        </div>
    </div> 
</div>
<br>
<div class="conteiner">
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo base_url('img/elements/pintura/capibara.jpg'); ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="around">
                        <div class="card-text">
                            <h4 class="">Quieres Seguir viendo más..?</h4>
                            <h5>"Desatando el arte, inspirando el mundo."</h5></div>
                        <div class="d-grid gap-2 col-6 mx-auto"> 
                            <button class="btn btn-secondary btn-lg" type="button">REGISTRATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-md">
        <div class="card text-white bg-dark">
        <div class="card-header"><h2>Antecedentes</h2></div>
        <div class="card-body">
            <h5 class="card-title text-white">Gota de Arte es una compañía dedicada a impulsar el arte emergente y establecer 
                conexiones significativas entre talentosos artistas noveles y entusiastas del arte en todo el mundo. 
                Fundada en [año de fundación], nuestra empresa nació de la pasión por el arte y el deseo de proporcionar una 
                plataforma vital para los creadores que están dando sus primeros pasos en el mundo artístico.
                Desde nuestros humildes comienzos, Gota de Arte ha experimentado un crecimiento constante y un profundo compromiso 
                con la misión de apoyar a artistas emergentes. Nuestra visión es clara: servir como un faro para la creatividad, 
                la diversidad y la innovación en la escena artística global.</h5>
            
        </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card text-white bg-dark">
        <div class="card-header"> <h2> Visión</h2></div>
        <div class="card-body">
            <h5 class="card-title text-white">En Gota de Arte, aspiramos a ser el puente que conecta a talentosos 
                artistas emergentes con amantes del arte de todo el mundo. Visualizamos un espacio donde el arte 
                florece, inspira y transforma vidas, promoviendo la diversidad y la creatividad en la escena 
                artística global</h5>
          
        </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card text-white bg-dark">
        <div class="card-header"><h2>Misión</h2></div>
        <div class="card-body">
            <h5 class="card-title text-white">Nuestra misión en Gota de Arte es apoyar y promover a artistas que están 
                en el inicio de sus carreras, brindándoles una plataforma para mostrar sus creaciones únicas y apasionantes. 
                Trabajamos incansablemente para conectar a estos artistas con una audiencia apreciativa y coleccionistas, 
                proporcionando oportunidades de venta y subasta. </h5>
            
        </div>
        </div>
    </div>
</div>
<br>
<?php echo $this->endSection(); ?>



<?php echo $this->section("scripts"); ?>

<?php echo $this->endSection(); ?>



