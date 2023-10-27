<?= $this->extend('Plantilla/disenio'); ?>
<?= $this->section('contenido'); ?>

<head>
    <title>Formulario de Usuario en Canasta</title>
    <!-- Enlaza el archivo CSS -->
    <link rel="stylesheet" href="<?= base_url('vendorTemplate/css/estilosPropios.css'); ?>">
</head>
<body>
    <h1>Formulario de Usuario en Canasta</h1>

    <!-- Muestra los errores de validación -->
    <div class="validation-errors">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>

    <form method="POST" action="<?php echo base_url('/UsuarioCanasta/edit') ?>"> 

        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?= old('precio'); ?>">

        <label for="foto">Foto:</label>
        <input type="text" name="foto" value="<?= old('foto'); ?>">

        <label for="medidas">Medidas:</label>
        <input type="text" name="medidas" value="<?= old('medidas'); ?>">

        <label for="fk_usuario_canasta">Usuario en Canasta:</label>
        <input type="text" name="fk_usuario_canasta" value="<?= old('fk_usuario_canasta'); ?>">

        <label for="fk_obra">Obra:</label>
        <input type="text" name="fk_obra" value="<?= old('fk_obra'); ?>">

        <input type="submit" value="Guardar">
    </form>
</body>

<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>

<?= $this->endSection(); ?>