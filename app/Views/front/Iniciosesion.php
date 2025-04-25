
<section class="d-flex align-items-center mt-5 mb-5 p-5">
    <div class="container mt-5 mb-4 p-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow-sm">
                    <h2 class="text-center mb-4">Iniciar Sesión</h2>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark">Ingresar</button>
                        </div>
                        <div class="text-center">
                            <small>¿No tenés cuenta? <a href="<?php echo base_url('registro');?>">Registrate</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>