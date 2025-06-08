<div class="container mt-4">
    <h2 class="mb-4">Ventas (Administrador)</h2>

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
                            <a href="<?= base_url('ventas/ver_factura/' . $venta['id']) ?>" class="btn btn-sm btn-primary">Ver factura</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">No hay ventas registradas aún.</div>
    <?php endif; ?>
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
