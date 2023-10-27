<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>
<head>
    <title>Formulario de Usuario Guardado</title>
</head>
<body>
    <h1>Formulario de Usuario Guardado</h1>

    <?= \Config\Services::validation()->listErrors(); ?>

    <?= form_open('usuario-guardado-controller/store'); ?>

    <label for="foto">Foto:</label>
    <input type="text" name="foto" value="<?= set_value('foto'); ?>">
    <br>

    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?= set_value('precio'); ?>">
    <br>

    <label for="medidas">Medidas:</label>
    <input type="text" name="medidas" value="<?= set_value('medidas'); ?>">
    <br>

    <label for="fk_obra">Obra:</label>
    <input type="text" name="fk_obra" value="<?= set_value('fk_obra'); ?>">
    <br>

    <label for="fk_usuario_guardado">Usuario Guardado:</label>
    <input type="text" name="fk_usuario_guardado" value="<?= set_value('fk_usuario_guardado'); ?>">
    <br>

    <input type="submit" value="Guardar">
    </form>
</body>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>

<?php echo $this->endSection(); ?>