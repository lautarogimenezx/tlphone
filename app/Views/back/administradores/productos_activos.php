<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Productos Activos</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
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
                        <a href="<?= base_url('productos/edit/' . $producto['id']) ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="<?= base_url('productos/delete/' . $producto['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('altaproducto'); ?>" class="btn btn-success mt-3">Agregar nuevo producto</a>
    <a href="<?= base_url('productos/eliminados'); ?>" class="btn btn-danger mt-3">Productos eliminados</a>
</div>
