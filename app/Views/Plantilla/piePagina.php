<div id="footer" class="container-fluid pt-5 pb-4">
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
        <h5 class="footerW" >Acerca de Gota de Arte</h5>
        <ul class="list-unstyled">
          <li><a href="javascript:void(0)" class="footer-link d-block pb-2">Acerca de nosotros</a></li>
          <li>
            <a href="javascript:void(0)" class="footer-link d-block pb-2">Sobre los Artistas</a>
          </li>
          <li><a href="javascript:void(0)" class="footer-link d-block pb-2">Arte</a></li>         
      </div>
      <div class="col-12 col-sm-4 col-md-2 mb-3 mb-sm-0">
        <h5>Servicio a cliente</h5>
        <ul id="list" class="list-unstyled">
          <li><a href="<?php echo base_url('/registrar')?>" class="footer-link d-block pb-2">Crear Cuenta</a></li>  
          <li><a href="<?php echo base_url('/login')?>" class="footer-link d-block pb-2">Iniciar Sesion</a></li>
          <li><a href="<?php echo base_url('/Contactos')?>" class="footer-link d-block pb-2">Contactanos</a></li>
          <li><a href="javascript:void(0)" class="footer-link d-block pb-2">¿Preguntas?</a></li>
        </ul>
      </div>
      <div class="col-12 col-sm-4 col-md-2">
        <h5 class="footerW" >Servicios del Sitio</h5>
        <ul class="list-unstyled">
        <li><a href="<?php echo base_url('/TerminosYCondiciones/TerminosyCondiciones') ?>" class="footer-link d-block pb-2">Terminos y condiciones</a></li>
          <li><a href="javascript:void(0)" class="footer-link d-block pb-2">Politicas del sitio Web</a></li>
      </div>
      <div class="col-12 col-sm-4 col-md-2">
        <h5 class="footerW" >Soy artista</h5>
        <ul class="list-unstyled">
        <li><a href="<?php echo base_url('/login_art')?>" class="footer-link d-block pb-2">Iniciar sesión</a></li>
          <li><a href="<?php echo base_url('/registrar_art')?>" class="footer-link d-block pb-2">Crear cuenta</a></li>
      </div>
  <div class="col-12 col-sm-4 col-md-2 mb-3 mb-sm-0">
        <h4 class="footerW fw-bold mb-3 "><a 
        target="_blank" class="footer-text">SIGUENOS EN: </a></h4>  <span>gota de Arte </span>
        <div class="social-icon my-3">
          <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-facebook"><i class='bx bxl-facebook'></i></a>
          <a href="javascript:void(0)" class="ms-2 btn btn-icon btn-sm btn-twitter"><i class='bx bxl-twitter'></i></a>
          <a href="javascript:void(0)" class="ms-2 btn btn-icon btn-sm btn-linkedin"><i class='bx bxl-pinterest'></i></a>
          <!--<a href="javascript:void(0)" class="ms-2 btn btn-icon btn-sm btn-github"><i class='bx bxl-instagram'></i></a>-->
        </div>
      </div>
      <p id="cop" class="pt-4">

          <script>
        document.write(new Date().getFullYear())
        </script> © <a href="<?php echo base_url('/login_admin')?>">PixelFusion</a> / © <a href="https://themeselection.com/">Sneat</a>
        <script>
          function mostrarPregunta() {
            document.getElementById('pregunta').classList.remove('hidden');
          }

          function ocultarPregunta() {
            document.getElementById('pregunta').classList.add('hidden');
          }
          function mostrarPreguntaR() {
            document.getElementById('preguntaR').classList.remove('hidden');
          }

          function ocultarPreguntaR() {
            document.getElementById('preguntaR').classList.add('hidden');
          }
        </script>  
    </p>
  </div>
</div>