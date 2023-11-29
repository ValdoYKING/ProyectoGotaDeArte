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

      

        <form id="formulario" action="<?php echo base_url('/Contactos/insertar')?>" method="post">
            

                <div class="mb-3 row">
                    <label for="nombre" class="col-md-2 col-form-label">Nombre</label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" pattern="[A-Za-z]+" placeholder="Ingresa nombre" name="nombre" id="nombre" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                    <input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" title="Debe contener tres cadenas separadas por un @ y un punto" 
                    placeholder="Ingresa tu email" id="email" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="col-md-2 col-form-label">Telefono</label>
                    <div class="col-md-10">
                    <input class="form-control" type="tel" value="" pattern="[0-9]{10}" title="Le falta numeros" name="telefono" placeholder="Agrega tu telefono" id="telefono" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="asunto" class="col-md-2 col-form-label">Asunto </label>
                    <div class="col-md-10">
                        <select class="input-group-text" name="asunto" for="grupoasusntos" required>
                            <option selected>Selecciona un asunto</option>
                            <option value="1">Informes de Artista</option>
                            <option value="2">Informe del envio de la obra</option>
                            <option value="3">Contactar algun artista</option>
                            <option value="4">Como entrar a una subasta</option>
                            <option value="5">Ser parte de Gota de Arte </option>
                        </select>
<!--                     <input class="form-control" type="text" value="" placeholder="Agregar Asunto " name="asunto"  id="asunto" required />
 -->                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="mensaje" class="form-label">Mensaje que desee enviar</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
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


