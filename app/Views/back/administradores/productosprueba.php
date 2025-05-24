<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Alta de Productos</h2>

    <form action="<?= site_url('productos/store') ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Producto</label>
            <input type="text" class="form-control" name="nombre_prod" id="nombre_prod" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select" required>
                <option value="" disabled selected>Seleccionar Categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id']; ?>"><?= $categoria['descripcion']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio" required>
        </div>

        <div class="mb-3">
            <label for="precio_vta" class="form-label">Precio Venta</label>
            <input type="number" step="0.01" class="form-control" name="precio_vta" id="precio_vta" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" required>
        </div>

        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock Mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="<?= site_url('productos') ?>" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Lista de Productos Activos</h2>

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