<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Usuarios Registrados</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Perfil ID</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id_usuarios']; ?></td>
                    <td><?= $u['nombre']; ?></td>
                    <td><?= $u['apellido']; ?></td>
                    <td><?= $u['usuario']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= $u['perfil_id'] ?? '—'; ?></td>
                    <td>
                        <?= $u['baja'] === 'SI' ? '<span class="text-danger">Inactivo</span>' : '<span class="text-success">Activo</span>' ?>
                    </td>
                    <td>
                        <?php if ($u['baja'] === 'SI'): ?>
                            <a href="<?= base_url('usuarios/alta/' . $u['id_usuarios']) ?>" class="btn btn-success btn-sm">Reactivar</a>
                        <?php else: ?>
                            <a href="<?= base_url('usuarios/baja/' . $u['id_usuarios']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que querés dar de baja este usuario?');">Dar de baja</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
