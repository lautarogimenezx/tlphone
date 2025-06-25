<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Editar producto</h2>

    <?php if (session('error')): ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('productos/update/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Producto</label>
            <input type="text" class="form-control" name="nombre_prod" id="nombre_prod"
                   value="<?= old('nombre_prod') ?? esc($producto['nombre_prod']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select" required>
                <option disabled>Seleccionar Categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>"
                        <?= (old('categoria') ?? $producto['categoria_id']) == $categoria['id'] ? 'selected' : '' ?>>
                        <?= esc($categoria['descripcion']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" min="0" class="form-control" name="precio" id="precio"
                   value="<?= old('precio') ?? esc($producto['precio']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="precio_vta" class="form-label">Precio Venta</label>
            <input type="number" step="0.01" min="0" class="form-control" name="precio_vta" id="precio_vta"
                   value="<?= old('precio_vta') ?? esc($producto['precio_vta']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock"
                   value="<?= old('stock') ?? esc($producto['stock']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock Mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min"
                   value="<?= old('stock_min') ?? esc($producto['stock_min']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen Actual</label><br>
            <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" alt="Imagen actual" width="150"><br><br>
            <input type="file" class="form-control" name="imagen" id="imagen">
            <small class="text-muted">Dejar vacío si no querés cambiar la imagen.</small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= site_url('productosactivos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
