<div class="container full-height-container d-flex flex-column justify-content-center my-5 py-5">
    <div class="row justify-content-center g-4 py-5">

        <!-- Card: Alta de producto -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="<?= base_url('altaproducto'); ?>" class="text-decoration-none" style="cursor:pointer;">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Alta de producto</h5>
                        <h6 class="text-muted">Registrar nuevo producto</h6>
                        <p class="card-text mt-3">
                            Agrega productos al inventario con toda la información necesaria para su gestión y venta.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card: Productos activos -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="<?= base_url('productosactivos'); ?>" class="text-decoration-none" style="cursor:pointer;">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Productos activos</h5>
                        <h6 class="text-muted">Listado de productos disponibles</h6>
                        <p class="card-text mt-3">
                            Visualiza y administra todos los productos que actualmente están activos y disponibles para la venta.
                        </p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
