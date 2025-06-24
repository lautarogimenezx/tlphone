<?php
    $session = session();
    $nombre = $session->get('nombre');
    $perfil = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark px-4 py-2 shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="<?= base_url(''); ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" height="60">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if ($perfil == 1): ?>
        <!-- Administrador -->
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarContent">
            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link text-white" href="<?= base_url('catalogo'); ?>">Catálogo</a>
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.2rem;"></a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/1'); ?>">Celulares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/2'); ?>">Relojes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/3'); ?>">Auriculares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/4'); ?>">Parlantes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/5'); ?>">Cargadores</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/6'); ?>">Fundas</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('nosotros'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto'); ?>">Contacto</a></li>
            </ul>

            <div class="text-secondary text-center fw-bold fs-5 mx-auto font-monospace">
                ADMINISTRADOR: <?= esc($nombre); ?>
            </div>

            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-2 position-relative">
                <div class="dropdown">
                    <a class="text-white fs-5 dropdown-toggle text-decoration-none" href="#" data-bs-toggle="dropdown" title="Administración">
                        <i class="fas fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= base_url('usuarios'); ?>">Usuarios</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('productosactivos'); ?>">Productos</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ventas'); ?>">Ventas</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('consultas'); ?>">Consultas</a></li>
                    </ul>
                </div>

                <div class="logout-wrapper position-relative">
                    <a href="<?= base_url('logout'); ?>" class="text-white fs-5 text-decoration-none" title="Cerrar sesión">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php elseif ($perfil == 2): ?>
        <!-- Usuario logueado -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link text-white" href="<?= base_url('catalogo'); ?>">Catálogo</a>
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.2rem;"></a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/1'); ?>">Celulares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/2'); ?>">Relojes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/3'); ?>">Auriculares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/4'); ?>">Parlantes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/5'); ?>">Cargadores</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/6'); ?>">Fundas</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('nosotros'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto'); ?>">Contacto</a></li>
            </ul>

            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-2 position-relative">
                <div class="dropdown">
                    <a href="#" class="text-white fs-5 dropdown-toggle text-decoration-none" data-bs-toggle="dropdown" title="Cuenta">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= base_url('usuario/perfil'); ?>">Mi perfil</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ventas/mis_compras'); ?>">Compras</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
                    </ul>
                </div>

                <?php $cart = \Config\Services::Cart(); ?>
                <div class="cart-wrapper position-relative">
                    <a href="<?= base_url('carrito'); ?>" class="text-white fs-5">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= count($cart->contents()) ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <?php else: ?>
        <!-- Usuario sin loguear -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link text-white" href="<?= base_url('catalogo'); ?>">Catálogo</a>
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.2rem;"></a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/1'); ?>">Celulares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/2'); ?>">Relojes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/3'); ?>">Auriculares</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/4'); ?>">Parlantes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/5'); ?>">Cargadores</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('catalogo/6'); ?>">Fundas</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('nosotros'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto'); ?>">Contacto</a></li>
            </ul>

            <div class="login-wrapper position-relative">
                <a href="<?= base_url('iniciosesion'); ?>" class="text-white fs-5">
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
        <?php endif; ?>

    </div>
</nav>
