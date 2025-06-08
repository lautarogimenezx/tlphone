<div class="container mt-4">
    <h2 class="mb-4">Factura N° <?= $cabecera['id'] ?></h2>

    <p><strong>Fecha:</strong> <?= $cabecera['fecha'] ?></p>
    <p><strong>Total:</strong> $<?= number_format($cabecera['total_venta'], 2) ?></p>

    <h4 class="mt-4">Productos</h4>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $item) : ?>
                <tr>
                    <td><?= $item['nombre_prod'] ?></td>
                    <td>$<?= number_format($item['precio_vta'], 2) ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($item['precio_vta'] * $item['cantidad'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('ventas/mis_compras') ?>" class="btn btn-secondary mt-3">Volver a mis compras</a>
</div>
<br>
