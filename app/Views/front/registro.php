<section class="d-flex align-items-center mt-5 mb-5 p-5">
    <div class="container container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="text-center mb-4">Crear Cuenta</h2>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Repetir contraseña</label>
                            <input type="password" class="form-control" id="password2" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark">Registrarme</button>
                        </div>
                        <div class="text-center">
                            <small>¿Ya tenés cuenta? <a href="<?php echo base_url('iniciosesion');?>">Iniciar sesión</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>