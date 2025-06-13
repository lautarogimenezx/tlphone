<br>
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

<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="col">
                    <div class="card text-center h-100 position-relative">
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" 
                            class="card-img-top object-fit-contain img-tarjetas" 
                            alt="<?= esc($producto['nombre_prod']) ?>">

                        <div class="card-body">
                            <?php if ($producto['stock'] <= $producto['stock_min']): ?>
                                <span class="badge mb-2 bg-danger">¡Últimas unidades!</span>
                            <?php endif; ?>
                            <br>
                            <span class="badge mb-2 bg-warning">ENVÍO GRATIS</span>

                            <h4>$<?= esc(number_format($producto['precio_vta'], 2, ',', '.')) ?></h4>
                            <p class="text-muted small">
                                Precio sin impuestos nacionales $<?= esc(number_format($producto['precio'], 2, ',', '.')) ?>
                            </p>
                            <p><?= esc($producto['nombre_prod']) ?></p>

                            <!-- Formulario funcional para agregar al carrito -->
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
                <p>No hay productos disponibles en esta categoría.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<br>
