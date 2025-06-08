<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura <?= $cabecera['id'] ?></title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Factura N° <?= $cabecera['id'] ?></h2>
    <p><strong>Fecha:</strong> <?= $cabecera['fecha'] ?></p>
    <p><strong>Cliente:</strong> <?= esc($cabecera['nombre_usuario'] ?? 'Usuario') ?></p>
    <p><strong>Total:</strong> $<?= number_format($cabecera['total_venta'], 2) ?></p>

    <h4>Productos</h4>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $item): ?>
                <tr>
                    <td><?= esc($item['nombre_prod']) ?></td>
                    <td>$<?= number_format($item['precio_vta'], 2) ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($item['precio_vta'] * $item['cantidad'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
