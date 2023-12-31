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
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/galerias2.jpg'); ?>" alt="First slide"width='90%'/>
            <div class="carousel-caption d-none d-md-block">
                <h2>Pablo Picasso</h2>
                <p>El arte lava del alma el polvo de la vida cotidiana.</p>
                <a href="#" class="btn btn-primary">Hazte socio</a>
            </div>
        </div>
        <div id="caruselL" class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/galeria.jpg'); ?>" alt="Second slide" width='90%'/>
            <div class="carousel-caption d-none d-md-block">
                <h2>Frida Kahlo</h2>
                <p>El arte es la manera más intensa de vivir; es la vida más completa que una persona puede experimentar</p>
                <a href="#" class="btn btn-primary">Registrate</a>
            </div>
        </div>
        <div id="caruselL" class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('img/elements/pintura/imagen33.jpg'); ?>" alt="Third slide" width='90%'/>
            <div class="carousel-caption d-none d-md-block">
                <h2>Vincent van Gogh</h2>
                <p>El arte es el espejo de la vida, nunca se detiene, nunca engaña.</p>
                <a href="#" class="btn btn-primary">Conoce mas</a>
            </div>
        </div>
    </div>
    <!-- Controles del carrusel, como botones "Siguiente" y "Anterior" -->
    <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" ariahidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
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

<div id="confom" class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($obras as $obra):
?>
<div id="galeria" class="col">
    <div class="card bg-dark text-white">
        <img src="<?php echo base_url($obra->foto); ?>" class="card-img" alt="..." width="300" height="300"> 
        <div class="card-img-overlay">
            <h5 class="card-title bg-dark"><?php echo $obra->nombre ?></h5>
            <p class="card-text"></p>
            <!-- <a href="<?php echo base_url('/registrar') ?>" class="btn btn-primary">Saber más</a> -->
            <a href="<?php echo base_url('/CuadroArte/obraCliente/' . $obra->id) ?>" class="btn btn-primary">Saber más</a>
        </div>
    </div>
</div>
<?php endforeach; ?>

    
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
                    <div id="te" class="around">
                        <div id="te" class="card-text ">
                            <h4 >Quieres Seguir viendo más..?</h4>
                            <h5 >"Desatando el arte, inspirando el mundo."</h5></div>
                        <div  class="d-grid gap-2 col-6 mx-auto"> 
                        <a href="<?php echo base_url('/registrar')?>" class="btn btn-secondary btn-lg">REGISTRATE</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="card text-white bg-dark h-100">
            <div class="card-header text-center"><h2>Antecedentes</h2></div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-white text-justify">Gota de Arte es una compañía dedicada a impulsar el arte emergente y establecer conexiones significativas entre talentosos artistas noveles y entusiastas del arte en todo el mundo. Fundada en [año de fundación], nuestra empresa nació de la pasión por el arte y el deseo de proporcionar una plataforma vital para los creadores que están dando sus primeros pasos en el mundo artístico. Desde nuestros humildes comienzos, Gota de Arte ha experimentado un crecimiento constante y un profundo compromiso con la misión de apoyar a artistas emergentes. Nuestra visión es clara: servir como un faro para la creatividad, la diversidad y la innovación en la escena artística global.</h5>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card text-white bg-dark h-100">
            <div class="card-header text-center"> <h2> Visión</h2></div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-white text-justify">En Gota de Arte, nuestra visión es la de convertirnos en un faro resplandeciente que ilumina el camino de artistas emergentes, brindándoles la oportunidad de compartir su creatividad con amantes del arte en todo el mundo. Visualizamos un espacio en el que el arte es un lenguaje universal que trasciende las barreras culturales y geográficas. En este espacio, el arte florece en todas sus formas, desde pintura y escultura hasta nuevas expresiones digitales y multimedia.Creemos que el arte tiene el poder de inspirar, emocionar y transformar vidas. Queremos ser los catalizadores de esta transformación, conectando a artistas con mentes curiosas y apasionadas que buscan nuevas perspectivas y experiencias</h5>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card text-white bg-dark h-100">
            <div class="card-header text-center"><h2>Misión</h2></div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-white text-justify">En Gota de Arte, nuestra misión es ser el apoyo y el trampolín para artistas que están dando sus primeros pasos en sus carreras artísticas. Reconocemos el valor y el potencial de estos creadores emergentes, y estamos comprometidos a brindarles una plataforma sólida y una voz en el mundo del arte.
Trabajamos incansablemente para descubrir, promover y nutrir el talento emergente en todas las disciplinas artísticas. Buscamos a artistas apasionados que estén listos para compartir sus creaciones únicas con el mundo, y les ofrecemos un espacio donde puedan presentar sus obras en un entorno que fomente la apreciación y la conexión con una audiencia global.</h5>
            </div>
        </div>
    </div>
</div>
<br>
<?php echo $this->endSection(); ?>



<?php echo $this->section("scripts"); ?>

<?php echo $this->endSection(); ?>



