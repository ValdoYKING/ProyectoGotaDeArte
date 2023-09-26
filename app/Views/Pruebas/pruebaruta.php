<?php echo $this->extend('Plantilla/disenio'); ?>
<?php echo $this->section('contenido'); ?>

<nav class="nav nav-pills nav-fill">
  <li class="nav-item">
    <button class="nav-link active" data-bs-target="javascript:void(0)">Active</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" data-bs-target="javascript:void(0)">Much longer nav link</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" data-bs-target="javascript:void(0)">Link</button>
  </li>
  <li class="nav-item">
    <button class="nav-link disabled" data-bs-target="javascript:void(0)" tabindex="-1" aria-disabled="true">Disabled</button>
  </li>
</nav>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>
  alert('Miame')
</script>

<?php echo $this->endSection(); ?>