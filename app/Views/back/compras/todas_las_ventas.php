<div class="container mt-4">
    <br>
    <h2 class="mb-4">Ventas</h2>

    <?php if (!empty($ventas)) : ?>
        <table id="tablaVentas" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>ID Usuario</th>
                    <th>Nombre Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta) : ?>
                    <tr>
                        <td><?= $venta['id'] ?></td>
                        <td><?= $venta['fecha'] ?></td>
                        <td>$<?= number_format($venta['total_venta'], 2) ?></td>
                        <td><?= $venta['id_usuarios'] ?></td>
                        <td><?= $venta['nombre'] ?></td>
                        <td>
                            <a href="<?= base_url('ventas/ver_factura_admin/' . $venta['id']) ?>" class="btn btn-sm btn-primary">Ver factura</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">No hay ventas registradas aún.</div>
    <?php endif; ?>

    <br>
    
    <div class="mb-3">
        <a href="<?= base_url('ventas/reporte_productos') ?>" class="btn btn-info">Productos más vendidos</a>
        <a href="<?= base_url('ventas/reporte_tiempo') ?>" class="btn btn-success me-2">Reporte de ventas por día</a>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#tablaVentas').DataTable({
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ ventas",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
