<nav class="navbar navbar-expand-lg navbar-black bg-dark mb-5 desliza">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('/') ?>">
            <img src="<?php echo base_url('img/recursos/logotipoGA_zoom.png') ?>" alt="Logo" height="30" class="d-inline-block align-top" /> | <b> Gota de Arte </b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('/inicio') ?>">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Obras </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('/obras') ?>">Todas las obras</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/subastas') ?>">Subastas</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/info') ?>">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/Contactos') ?>">Contactanos</a>
                </li>

            </ul>

            <form class="d-flex ms-auto" onsubmit="return false">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Buscar" aria-label="Search" />
                <button class="btn btn-outline-primary" type="button" onclick="search()">Buscar</button>
            </form>


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $userName; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo $canastaUrl; ?>">Mi canasta</a></li>
                        <li><a class="dropdown-item" href="<?php echo $guardadosUrl; ?>">Guardados</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li><a class="dropdown-item" href="<?php echo $urlSalir ?>"><?php echo $sesion; ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>