<div class="container mt-3 mb-3">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('altaproducto'); ?>" class="btn btn-success mt-3">Agregar nuevo producto</a>
    <a href="<?= base_url('productos/eliminados'); ?>" class="btn btn-danger mt-3">Productos eliminados</a>

    <br>
    <br>

    <table id="tablaProductos" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
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
                    <td><?= esc($producto['id']) ?></td>
                    <td>
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" alt="Imagen del producto" width="80">
                    </td>
                    <td><?= esc($producto['nombre_prod']) ?></td>
                    <td>$<?= number_format($producto['precio'], 2) ?></td>
                    <td>$<?= number_format($producto['precio_vta'], 2) ?></td>
                    <td><?= esc($producto['stock']) ?></td>
                    <td><?= esc($producto['stock_min']) ?></td>
                    <td>
                        <a href="<?= base_url('productos/edit/' . $producto['id']) ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="<?= base_url('productos/delete/' . $producto['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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