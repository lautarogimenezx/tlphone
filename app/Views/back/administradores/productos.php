<div class="container full-height-container d-flex flex-column justify-content-center my-5 py-5">
    <div class="row justify-content-center g-4 py-5">

        <div class="col-12 col-md-6 col-lg-5">
            <a href="<?= base_url('altaproducto'); ?>" class="text-decoration-none" style="cursor:pointer;">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Alta de producto</h5>
                        <h6 class="text-muted">Registrar nuevo producto</h6>
                        <p class="card-text mt-3">
                            Agrega nuevos productos al inventario con toda la información necesaria para su correcta gestión y venta.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-5">
            <a href="editar-producto.html" class="text-decoration-none" style="cursor:pointer;">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Editar producto</h5>
                        <h6 class="text-muted">Modificar datos de productos existentes</h6>
                        <p class="card-text mt-3">
                            Actualiza la información de productos activos para mantener el inventario siempre al día.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-5">
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

        <div class="col-12 col-md-6 col-lg-5">
            <a href="productos-eliminados.html" class="text-decoration-none" style="cursor:pointer;">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Productos eliminados</h5>
                        <h6 class="text-muted">Historial de productos removidos</h6>
                        <p class="card-text mt-3">
                            Consulta los productos que han sido eliminados o desactivados del inventario.
                        </p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>