<h2 style="text-align: center;">Reporte de Ventas - <?= $fecha ?></h2>
<hr>

<?php foreach ($ventas as $venta): ?>
    <h4>Venta #<?= $venta['id'] ?> - Total: $<?= number_format($venta['total_venta'], 2) ?></h4>
    <p><strong>Usuario ID:</strong> <?= $venta['usuario_id'] ?></p>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Producto ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta['detalles'] as $detalle): ?>
                <tr>
                    <td><?= $detalle['producto_id'] ?></td>
                    <td><?= $detalle['nombre_prod'] ?? '—' ?></td>
                    <td><?= $detalle['cantidad'] ?></td>
                    <td>$<?= number_format($detalle['precio'], 2) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
<?php endforeach ?>

<hr>
<h4 style="text-align: right; margin-top: 20px;">
    Total del día: $<?= number_format($total_del_dia, 2, ',', '.') ?>
</h4>
