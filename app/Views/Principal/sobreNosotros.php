<?php echo $this->extend('Plantilla/disenioIntro'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <link rel="stylesheet" href="<?php echo base_url('public/vendorTemplate/css/estilosPropios.css'); ?>">
 

                <a id="inicio-link" href="<?php echo base_url('/inicio') ?>">Inicio</a>
            </>
            <li class="breadcrumb-item active">
                <a id="info-link" href="<?php echo base_url('/info') ?>">Sobre nosotros</a>
            </li>
        </ol>
    </nav>
    <div class="sobre-nosotros-contenedor">
    </div>

    <h1>Acerca de Nosotros</h1>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="<?php echo base_url('img/elements/sobrenosotros/Real1.jpeg')?>" class="sobre-nosotros-imagen" width="440" height="500" id="sobre-nosotros-imagen">
                <div class="card-body">
                    <h5 id="card-title" style="color: black;">¿Quienes somos?</h5>
                    <p id="card-text" style="text-align: justify; color: black;">
                        En "Gota de Arte", somos un apasionado grupo de artistas y amantes del arte que se han unido para celebrar la creatividad en todas sus formas. Nos dedicamos a fomentar la apreciación del arte y a brindar una plataforma para artistas emergentes y establecidos para mostrar su trabajo. Nuestra misión es ser un faro de inspiración para la comunidad artística y un destino para aquellos que buscan sumergirse en el mundo del arte.
                        
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class= "card h-100">
                <img src="<?php echo base_url('img/elements/sobrenosotros/Real2.jpeg')?>" class="sobre-nosotros-imagen" width="440" height="500" id="sobre-nosotros-imagen">
                <div class="card-body">
                    <h5 id="card-title" style="color: black;">Nuestra motivación</h5>
                    <p id="card-text" style="text-align: justify; color: black;">
                        Nuestra motivación es que en "Gota de Arte" ayude a la diversidad artística y la libre expresión creativa. Creemos que el arte tiene el poder de inspirar, educar y conectar a las personas de todas las edades y orígenes. A través de exposiciones, eventos culturales y recursos educativos, trabajamos incansablemente para fomentar un entorno en el que el arte florezca y donde cada obra cuente una historia única.
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="<?php echo base_url('img/elements/sobrenosotros/Real3.jpeg')?>" class="sobre-nosotros-imagen" width="440" height="500" id="sobre-nosotros-imagen">
                <div class="card-body">
                    <h5 id="card-title" style="color: black;">Lo que ofrecemos</h5>
                    <p id="card-text" style="text-align: justify; color: black;">
                        En "Gota de Arte", ofrecemos una amplia gama de servicios y contenido relacionados con el arte. Esto incluye exposiciones en línea y en persona que destacan el trabajo de artistas emergentes y establecidos, talleres de arte para todas las edades, reseñas y análisis de obras de arte, y una comunidad en línea donde los amantes del arte pueden conectarse y compartir su pasión. Además, nuestra tienda en línea ofrece una selección de obras de arte originales y productos inspirados en el arte para aquellos que buscan llevar un toque artístico a sus vidas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<?php echo $this->endSection(); ?>