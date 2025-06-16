<section class="d-flex align-items-center mt-5 mb-5 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="text-center mb-4">Crear Cuenta</h2>

                    <?php if (session()->getFlashdata('fail')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('/enviar-form') ?>" method="POST">
                        <?= csrf_field(); ?>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre') ?>">
                            <?php if(isset($validation) && $validation->getError('nombre')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('nombre'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= old('apellido') ?>">
                            <?php if(isset($validation) && $validation->getError('apellido')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('apellido'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                            <?php if(isset($validation) && $validation->getError('email')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('email'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Usuario -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" value="<?= old('usuario') ?>">
                            <?php if(isset($validation) && $validation->getError('usuario')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('usuario'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                            <?php if(isset($validation) && $validation->getError('pass')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('pass'); ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Repetir contraseña -->
                        <div class="mb-3">
                            <label for="password2" class="form-label">Repetir contraseña</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?php if(isset($validation) && $validation->getError('password2')): ?>
                                <div class="alert alert-danger mt-2"><?= $validation->getError('password2'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark">Registrarme</button>
                        </div>

                        <div class="text-center">
                            <small>¿Ya tenés cuenta? <a href="<?= base_url('iniciosesion'); ?>">Iniciar sesión</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
