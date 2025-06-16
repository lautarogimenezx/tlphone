<div class="container mt-4">
    <br>
    <h2 class="mb-4">Reporte de ventas por día</h2>
    <?php if (!empty($reporte)) : ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad de Ventas</th>
                    <th>Total Vendido</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reporte as $row) : ?>
                    <tr>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['cantidad_ventas'] ?></td>
                        <td>$<?= number_format($row['total'], 2) ?></td>
                        <td>
                            <a href="<?= base_url('ventas/pdf_por_fecha/' . $row['fecha']) ?>" class="btn btn-sm btn-danger">Descargar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">No hay datos disponibles.</div>
    <?php endif ?>
</div>
