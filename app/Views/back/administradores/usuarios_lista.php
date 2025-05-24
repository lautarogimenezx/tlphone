<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Usuarios Registrados</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Perfil ID</th>
                <th>Baja</th>
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
                    <td><?= $u['baja'] ?? 'NO'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
