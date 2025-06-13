<?php if (session()->getFlashdata('msg')): ?>
    <div id="mensaje-bienvenida" class="alert alert-success text-center">
        <?= esc(session()->getFlashdata('msg')) ?>
    </div>
<?php endif; ?>


<!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="assets/img/banner1.jpg" class="d-block w-100"
        alt="Promo 1">
    </div>
    <div class="carousel-item">
        <img src="assets/img/banner2.jpg" class="d-block w-100"
        alt="Promo 2">
    </div>
    <div class="carousel-item">
        <img src="assets/img/banner3.jpg" class="d-block w-100"
        alt="Promo 3">
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
    data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
    data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Categorías -->
<div class="container py-4">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4 text-center">
        <?php foreach ($categorias as $categoria): ?>
        <?php
            $esActual = isset($categoria_actual) && $categoria['id'] == $categoria_actual;
        ?>
        <div class="col">
            <a href="<?= base_url('catalogo/' . $categoria['id']) ?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm <?= $esActual ? 'bg-secondary text-white' : 'bg-light' ?>">
                    <img src="<?= base_url('assets/img/' . strtolower($categoria['descripcion']) . '.png') ?>"
                        class="card-img-top mx-auto mt-3 img-cat"
                        alt="<?= esc($categoria['descripcion']) ?>">

                    <div class="card-body">
                        <p class="card-text"><?= esc($categoria['descripcion']) ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<!-- Productos -->
<section>
    <div class="container pb-3">
    <div class="row g-4">

        <!-- Tarjeta 1 -->
        <section>
    <div class="container pb-3">
    <div class="row g-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($productosDestacados)): ?>
            <?php foreach ($productosDestacados as $producto): ?>
                <div class="col">
                    <div class="card text-center h-100">
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" 
                            class="card-img-top object-fit-contain img-tarjetas" 
                            alt="<?= esc($producto['nombre_prod']) ?>">

                        <div class="card-body">
                            <?php if ($producto['stock'] <= $producto['stock_min']): ?>
                                <span class="badge mb-2 bg-danger">¡Últimas unidades!</span>
                            <?php endif; ?>
                            <br>

                            <span class="badge mb-2 bg-primary">¡NUEVO!</span>

                            <h4>$<?= esc(number_format($producto['precio_vta'], 2, ',', '.')) ?></h4>
                            <p class="text-muted small">
                                Precio sin impuestos nacionales $<?= esc(number_format($producto['precio'], 2, ',', '.')) ?>
                            </p>
                            <p><?= esc($producto['nombre_prod']) ?></p>

                            <form action="<?= base_url('carrito/add') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                <input type="hidden" name="nombre_prod" value="<?= $producto['nombre_prod'] ?>">
                                <input type="hidden" name="precio_vta" value="<?= $producto['precio_vta'] ?>">
                                <input type="hidden" name="imagen" value="<?= $producto['imagen'] ?>">
                                <button type="submit" class="btn btn-dark w-100">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>No hay productos destacados en este momento.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
</section>


<!-- Envío Express (como imagen alargada) -->
<div class="my-1">
    <img src="assets/img/Envios.png" alt="Envio Express" class="img-fluid w-100">
</div>

<!-- Opiniones de Clientes -->
<div class="container py-4">
    <h3 class="text-center mb-2">Nuestros clientes te ayudan a tomar la mejor decisión</h3>
    <p class="text-center text-muted">¡Comentarios 100% verificados!</p>
    <div class="row">
    <div class="col-md-3">
        <div class="border p-3">
        <p><strong>Norma M.</strong></p>
        <p>Muy buena experiencia con los chicos. Me asesoraron completamente...</p>
        <p><i class="fas fa-check-circle text-success"></i> COMPRA VERIFICADA</p>
        <p>★★★★★</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border p-3">
        <p><strong>Natalí I.</strong></p>
        <p>Excelente atención de la vendedora, súper amables...</p>
        <p><i class="fas fa-check-circle text-success"></i> COMPRA VERIFICADA</p>
        <p>★★★★★</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border p-3">
        <p><strong>Sabrina C.</strong></p>
        <p>No sabía qué celular comprarme, me asesoraron muy bien...</p>
        <p><i class="fas fa-check-circle text-success"></i> COMPRA VERIFICADA</p>
        <p>★★★★★</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border p-3">
        <p><strong>Máximo M.</strong></p>
        <p>Destacable la atención de todos los chicos! Ya compré varias veces...</p>
        <p><i class="fas fa-check-circle text-success"></i> COMPRA VERIFICADA</p>
        <p>★★★★★</p>
        </div>
    </div>
    </div>
</div>

<!-- Newsletter -->
<div class="text-center py-4 bg-light">
    <h4>Suscribite a nuestro newsletter</h4>
    <form class="d-flex justify-content-center mt-3">
    <input type="email" class="form-control w-25 me-2" placeholder="Ingresa tu mail para recibir todas las novedades">
    <button class="btn btn-dark">SUSCRIBIR</button>
    </form>
</div>