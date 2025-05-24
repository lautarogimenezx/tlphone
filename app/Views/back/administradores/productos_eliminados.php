<table class="table">
    <thead><tr><th>Producto</th><th>Acción</th></tr></thead>
    <tbody>
    <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= esc($p['nombre_prod']) ?></td>
            <td>
                <a href="<?= base_url('productos/reactivar/' . $p['id']) ?>" class="btn btn-success btn-sm">Reactivar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
