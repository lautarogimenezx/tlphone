<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Productos Eliminados</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table id="tablaProductos" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Precio Venta</th>
                <th>Stock</th>
                <th>Stock Mínimo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" alt="Imagen del producto" width="80">
                    </td>
                    <td><?= esc($producto['nombre_prod']) ?></td>
                    <td>$<?= number_format($producto['precio'], 2) ?></td>
                    <td>$<?= number_format($producto['precio_vta'], 2) ?></td>
                    <td><?= esc($producto['stock']) ?></td>
                    <td><?= esc($producto['stock_min']) ?></td>
                    <td>
                        <a href="<?= base_url('productos/reactivar/' . $producto['id']) ?>" class="btn btn-sm btn-success">Reactivar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('productosactivos'); ?>" class="btn btn-primary mt-3">Volver a productos activos</a>
</div>

<script>
    $(document).ready(function () {
        $('#tablaProductos').DataTable({
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