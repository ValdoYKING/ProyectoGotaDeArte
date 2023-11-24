<?php echo $this->extend('Plantilla/disenioArtista'); ?>
<?php echo $this->section('contenido'); ?>
<br>
<div class="container">
    <nav class="breadcrumb  mb-5 segundo-navbar">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url('/inicioartista')?>">/Inicio</a>
            </li>
            <li class="breadcrumb-item active"></li>
                <a href="<?php echo base_url('/inicioartista/obraArtista/'.$publicaciones->id)?>">Obra</a>
            </li>
        </ol>
    </nav>
</div>

<div class="contaier ">

 <div class="row">
 <div class="col-8">
    
    <section class="text-center">
        
        <div>
            <img src="<?php echo base_url($publicaciones->foto)?>" width="600" alt="imagenPublicacion">
        </div>
    </section>
</div>
<div class="col-4">
    <aside>
        <h2><?php echo $publicaciones->nombre?></h2>
        <p><?php echo $publicaciones->descripcion?></p>
        <h3><?php echo $datosarte->a_paterno ."," . $datosarte->nombre ?></h3>
        <?php $fecha = explode(' ',$publicaciones->fecha_creacion)?>
        <h3>
            <?php echo $fecha[0] ?>
        </h3>
        <h3><?php echo $publicaciones->medidas?></h3>
        <h2>$<?php echo $publicaciones->precio?>.00 MXN</h2>
        

        <?php if ($publicaciones->estatus_subasta == 0){ ?>
            <button class="btn btn-outline-warning">Adquirir Obra</button>
            <button class="btn btn-outline-success">Pregunta para subastar</button>
        <?php } else {?>
            <h3>Esa obra estara en subasta</h3>
            <button class="btn btn-outline-warning">Ver subasta</button>
            <?php } ?>
            
    </aside>
</div>
 </div>
</div>
<hr>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>
<!-- <script>

</script> -->

<?php echo $this->endSection(); ?>