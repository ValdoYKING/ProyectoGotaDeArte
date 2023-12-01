<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $titulo; ?></title>
  <meta name="description" content="" />
  <link rel="shortcut icon" href="<?php echo base_url('img/recursos/logotipoGA_zoom.png') ?>">
  <!-- Favicon -->
  <link rel="stylesheet" href="<?= base_url('img/favicon/favicon.ico'); ?>">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url('vendorTemplate/fonts/boxicons.css'); ?>">
  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('vendorTemplate/css/core.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendorTemplate/css/theme-default.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('css/demo.css'); ?>">
  <!-- Estilos particular -->
  <link rel="stylesheet" href="<?= base_url('vendorTemplate/css/estilosPropios.css'); ?>">
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url('vendorTemplate/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
  <!-- Page CSS -->
  <link rel="stylesheet" href="<?php echo base_url('vendorTemplate/css/pages/page-icons.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('vendorTemplate/css/pages/page-misc.css') ?>" />
  <!-- Helpers -->
  <script src="<?= base_url('vendorTemplate/js/helpers.js'); ?>"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url('js/config.js'); ?>"></script>
</head>

<body>
  <!-- Navbar de la pagina -->
  <?php echo $this->include("Plantilla/menu"); ?>
  <!-- Vista correspondiente a la ruta -->
  <?php echo $this->renderSection("contenido"); ?>


  
  <!-- Core JS -->
  <!-- build:js assets/vendorTemplate/js/core.js -->
  <script src="<?= base_url('vendorTemplate/libs/jquery/jquery.js'); ?>"></script>
  <script src="<?= base_url('vendorTemplate/libs/popper/popper.js'); ?>"></script>
  <script src="<?= base_url('vendorTemplate/js/bootstrap.js'); ?>"></script>
  <script src="<?= base_url('vendorTemplate/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>

  <script src="<?= base_url('vendorTemplate/js/menu.js'); ?>"></script>

  <script>
    function search() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const bodyContent = document.body.innerHTML;

      // Si el término de búsqueda está vacío, mostrar todo el contenido del cuerpo nuevamente
      if (searchTerm.trim() === '') {
        document.body.innerHTML = bodyContent;
        return;
      }

      // Resaltar el término de búsqueda solo dentro del contenido de texto (no dentro de etiquetas)
      const highlightedContent = bodyContent.replace(new RegExp(`(?<=>)([^<]*${searchTerm}[^<]*)(?=<)`, 'gi'), (_, match) => `<span class="highlight">${match}</span>`);
      document.body.innerHTML = highlightedContent;

      const matches = document.querySelectorAll('.highlight');

      if (matches.length === 0) {
        document.getElementById('searchResults').innerText = 'No se encontraron coincidencias.';
      } else {
        document.getElementById('searchResults').innerText = `Coincidencias encontradas: ${matches.length}`;
      }
    }

    document.getElementById('searchInput').addEventListener('input', search);
    document.getElementById('searchInput').addEventListener('keyup', function(event) {
      if (event.key === 'Escape') {
        this.value = ''; // Limpiar el contenido cuando se presiona Esc
        search(); // Ejecutar búsqueda para mostrar todo el contenido nuevamente
      }
    });
  </script>

  <!-- <script src="/assets/js/main.js"></script> -->
  <script src="<?= base_url('js/main.js'); ?>"></script>
  <!-- Page JS -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <?php echo $this->renderSection("scripts"); ?>
</body>

</html>