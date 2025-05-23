<section class="d-flex align-items-center mt-5 mb-5 p-5">
    <div class="container mt-5 mb-4 p-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow-sm">
                    <h2 class="text-center mb-4">Iniciar Sesión</h2>

                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-warning text-center">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('iniciosesion') ?>" method="POST">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="password" name="pass" class="form-control" id="pass" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark">Ingresar</button>
                        </div>

                        <div class="text-center">
                            <small>¿No tenés cuenta? <a href="<?= base_url('registrarse') ?>">Registrate</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
