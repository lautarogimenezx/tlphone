<div class="container mt-4">
    <h2><?= $titulo ?></h2>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-info">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('usuario/actualizar_perfil') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre'] ?>">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= $usuario['apellido'] ?>">
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?= $usuario['usuario'] ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>">
        </div>

        <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?= base_url('/usuario/perfil') ?>" class="btn btn-danger">Cancelar</a>
</div>

    </form>
</div>
<br>
