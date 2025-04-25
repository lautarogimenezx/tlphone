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

        <div class="col">
            <a href="<?php echo base_url('celulares');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Iphone.png" class="card-img-top mx-auto mt-3 img-cat" alt="Celulares">
                    <div class="card-body">
                        <p class="card-text">Celulares</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo base_url('relojes');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Relojes.png" class="card-img-top mx-auto mt-3 img-cat" alt="Relojes">
                    <div class="card-body">
                        <p class="card-text">Relojes</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo base_url('auriculares');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Auriculares.png" class="card-img-top mx-auto mt-3 img-cat" alt="Auriculares">
                    <div class="card-body">
                        <p class="card-text">Auriculares</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo base_url('parlantes');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Parlantes1.png" class="card-img-top mx-auto mt-3 img-cat" alt="Parlantes">
                    <div class="card-body">
                        <p class="card-text">Parlantes</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo base_url('cargadores');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Cargadores.png" class="card-img-top mx-auto mt-3 img-cat" alt="Cargadores">
                    <div class="card-body">
                        <p class="card-text">Cargadores</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo base_url('fundas');?>" class="text-decoration-none text-reset">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="assets/img/Fundas.png" class="card-img-top mx-auto mt-3 img-cat" alt="Fundas">
                    <div class="card-body">
                        <p class="card-text">Fundas</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>


<!-- Productos -->
<section>
    <div class="container pb-3">
    <div class="row g-4">

        <!-- Tarjeta 1 -->
        <div class="col-12 col-md-6 col-lg-4">
                <div class="card text-center h-100 position-relative">
                    <button class="btn position-absolute top-0 end-0 m-2 bg-transparent border-0 fs-2" style="z-index: 1;" title="Agregar a favoritos">🤍</button>
                    <img src="assets/img/auricularess.png" class="card-img-top object-fit-contain" style="height: 300px;" alt="AirPods Max">
                    <div class="card-body">
                        <span class="badge mb-2 bg-warning">ENVÍO GRATIS</span>
                        <h4>$174.999</h4>
                        <p class="text-muted small">Precio sin impuestos nacionales $144.627,27</p>
                        <p>Apple AirPods Max con Smart Case</p>
                        <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                    </div>
                </div>
            </div>

        <!-- Tarjeta 2 -->
        <div class="col-12 col-md-6 col-lg-4">
                <div class="card text-center h-100 position-relative">
                    <button class="btn position-absolute top-0 end-0 m-2 fs-2 bg-transparent border-0" title="Agregar a favoritos">❤️</button>
                    <img src="assets/img/parlante5.png" class="card-img-top object-fit-contain img-tarjetas" alt="JBL-Flip-6">
                    <div class="card-body">
                        <span class="badge mb-2 bg-primary">STOCK LIMITADO</span>
                        <h4>$229.999</h4>
                        <p class="text-muted small">Precio sin impuestos nacionales $189.914,31</p>
                        <p>JBL Flip 6 - Altavoz portátil a prueba de agua</p>
                        <a href="#" class="btn btn-dark w-100">Quitar del carrito</a>
                    </div>
                </div>
            </div>


        <!-- Tarjeta 3 -->
        <div class="col-12 col-md-6 col-lg-4">
                <div class="card text-center h-100 position-relative">
                    <button class="btn position-absolute top-0 end-0 m-2 fs-2 border-0 bg-transparent" title="Agregar a favoritos">🤍</button>
                    <img src="assets/img/fundaip.png" class="card-img-top object-fit-contain img-tarjetas" alt="Funda Iphone 16 Pro Max">
                    <div class="card-body">
                        <span class="badge mb-2 bg-success">¡NUEVO!</span>
                        <h4>$199.999</h4>
                        <p class="text-muted small">Precio sin impuestos nacionales $165.289,26</p>
                        <p>Incase Slim Funda iPhone 16 Pro Max - Transparente</p>
                        <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                    </div>
                </div>
            </div>
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