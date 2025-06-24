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
            <a href="<?= site_url('productosactivos') ?>" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
