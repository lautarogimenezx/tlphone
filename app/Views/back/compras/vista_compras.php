<div class="container mt-4">
    <h2 class="mb-4">Mis Compras</h2>

    <?php if (!empty($compras)) : ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra) : ?>
                    <tr>
                        <td><?= $compra['id'] ?></td>
                        <td><?= $compra['fecha'] ?></td>
                        <td>$<?= number_format($compra['total_venta'], 2) ?></td>
                        <td>
<a href="<?= base_url('ventas/ver_factura/' . $compra['id']) ?>" class="btn btn-sm btn-primary">Ver factura</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Aún no has realizado ninguna compra.</div>
    <?php endif; ?>
</div>
