<?php echo $this->extend("Plantilla/disenio"); ?>
<?php echo $this->section("contenido"); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?php echo base_url('/inicio')?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/Contactos')?>">Contacto</a>
            </li>
        </ol>
    </nav>
</div>

<div class="container " id="formCon"> 
    <h1> Contactanos </h1>
    <div class="row">
        <form id="formulario" action="" method="get">
            

                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Nombre</label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" pattern="[A-Za-z]+" placeholder="Ingresa nombre" id="html5-text-input" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                    <input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Debe contener tres cadenas separadas por un @ y un punto" 
                    placeholder="Ingresa tu email" id="html5-email-input" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-tel-input" class="col-md-2 col-form-label">Telefono</label>
                    <div class="col-md-10">
                    <input class="form-control" type="tel" value="" pattern="[0-9]{10}" title="Le falta numeros" placeholder="Agrega tu telefono" id="html5-tel-input" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Asunto </label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" value="" placeholder="Agregar Asunto " id="html5-text-input" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleFormControlTextarea1" class="form-label">Mensaje que desee enviar</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <div class="mb-3 row">
                    <p class="aviso"> <span class="obligatorio"></span>Los campos son obligatorios </p>
                <button class="btn-primary" type="submit" name="envio_form" id="enviar">Enviarlo</button>
                </div>


        </form>

    </div>
</div>
<br>
<?php echo $this->endSection(); ?>

<footer >
    <?php echo $this->include("Plantilla/piePagina"); ?>
</footer>

<?php echo $this->section("scripts"); ?>

<?php echo $this->endSection(); ?>


