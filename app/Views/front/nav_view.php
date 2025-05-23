<body>

<?php
    $session = session();
    $nombre = $session->get('nombre');
    $perfil = $session->get('perfil_id');
?>

<!-- Navbar superior -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark px-4 py-2 shadow-sm">

    <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?php echo base_url('');?>">
        <img src="assets/img/logo.png" alt="Logo" height="60">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>


<!-- Navbar superior para administradores -->    
    <?php if ($perfil == 1): ?>

    <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarContent">
    <!-- Menú de la izquierda -->
    <ul class="navbar-nav me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                Categorías
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="<?= base_url('celulares'); ?>">Celulares</a></li>
                <li><a class="dropdown-item" href="<?= base_url('relojes'); ?>">Relojes</a></li>
                <li><a class="dropdown-item" href="<?= base_url('auriculares'); ?>">Auriculares</a></li>
                <li><a class="dropdown-item" href="<?= base_url('parlantes'); ?>">Parlantes</a></li>
                <li><a class="dropdown-item" href="<?= base_url('cargadores'); ?>">Cargadores</a></li>
                <li><a class="dropdown-item" href="<?= base_url('fundas'); ?>">Fundas</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('nosotros'); ?>">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto'); ?>">Contacto</a></li>
    </ul>

    <!-- Texto centrado con el nombre del administrador -->
    <div class="text-white text-center fw-bold fs-5 mx-auto">
        Administrador: <?= session('nombre'); ?>
    </div>

    <!-- Íconos de la derecha -->
    <div class="d-flex align-items-center position-relative">
        <div class="settings-wrapper position-relative me-3">
            <a href="<?= base_url('administracion'); ?>" class="text-white fs-5" title="Configuración">
                <i class="fas fa-cog"></i>
            </a>
        </div>

        <div class="logout-wrapper position-relative me-3">
            <a href="<?= base_url('logout'); ?>" class="text-white fs-5" title="Cerrar sesión">
                <i class="fas fa-door-open"></i>
            </a>
        </div>
    </div>
</div>


<!-- Navbar superior para usuarios logueados -->  
    <?php elseif ($perfil == 2): ?>
    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
        <ul class="navbar-nav me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="" role="button" data-bs-toggle="dropdown">
            Categorías
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?php echo base_url('celulares');?>">Celulares</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('relojes');?>">Relojes</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('auriculares');?>">Auriculares</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('parlantes');?>">Parlantes</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('cargadores');?>">Cargadores</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('fundas');?>">Fundas</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contacto');?>">Contacto</a></li>
        </ul>

                <div class="d-flex align-items-center position-relative">
            <div class="login-wrapper position-relative me-3">
                <a href="<?php echo base_url('iniciosesion');?>" class="text-white fs-5">
                    <i class="fas fa-user"></i>
                </a>
            </div>

            <div class="favorites-wrapper position-relative me-3">
                <a href="<?php echo base_url('favoritos');?>" class="text-white fs-5">
                    <i class="fas fa-heart"></i>
                </a>
            </div>

            <div class="cart-wrapper position-relative">
                <a href="<?php echo base_url('carrito');?>" class="text-white fs-5">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
            </div>
        </div>
    </div>
    </div>

<!-- Navbar superior para usuarios sin loguearse -->  
    <?php else: ?>
    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
        <ul class="navbar-nav me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="" role="button" data-bs-toggle="dropdown">
            Categorías
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?php echo base_url('celulares');?>">Celulares</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('relojes');?>">Relojes</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('auriculares');?>">Auriculares</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('parlantes');?>">Parlantes</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('cargadores');?>">Cargadores</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('fundas');?>">Fundas</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('nosotros');?>">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contacto');?>">Contacto</a></li>
        </ul>

                <div class="d-flex align-items-center position-relative">
            <div class="login-wrapper position-relative me-3">
                <a href="<?php echo base_url('iniciosesion');?>" class="text-white fs-5">
                    <i class="fas fa-user"></i>
                </a>
            </div>

            <div class="favorites-wrapper position-relative me-3">
                <a href="<?php echo base_url('favoritos');?>" class="text-white fs-5">
                    <i class="fas fa-heart"></i>
                </a>
            </div>

            <div class="cart-wrapper position-relative">
                <a href="<?php echo base_url('carrito');?>" class="text-white fs-5">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
            </div>
        </div>
    </div>
    </div>
    <?php endif; ?>


    </div>
</nav>

