<div class="container mt-4">
    <br>
    <h2 class="mb-4">Productos más vendidos</h2>

    <?php if (!empty($reporte)) : ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad Vendida</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reporte as $producto) : ?>
                    <tr>
                        <td><?= $producto['id_producto'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['total_vendidos'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">No hay productos vendidos aún.</div>
    <?php endif ?>
</div>
