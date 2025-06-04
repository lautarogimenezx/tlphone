<div class="container mt-4">
    <h2 class="text-center p-2">Productos en tu Carrito</h2>

    <table class="table table-bordered text-center">
        <thead class="bg-dark text-white">
            <tr>
                <th>IMAGEN</th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
                <th>Cancelar</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($cart->contents() as $item): ?>
                <tr class="bg-light">
                    <td>
                        <img src="<?= base_url('uploads/' . $item['imagen']) ?>" width="80">
                    </td>
                    <td><?= esc($item['name']) ?></td>
                    <td>$ <?= number_format($item['price'], 2) ?></td>
                    <td>
                        <form method="post" action="<?= base_url('carrito/actualiza_carrito') ?>" class="d-flex justify-content-center">
                            <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                            <button class="btn btn-success btn-sm me-1" name="accion" value="sumar">+</button>
                            <span class="mx-2"><?= $item['qty'] ?></span>
                            <button class="btn btn-danger btn-sm" name="accion" value="restar">−</button>
                        </form>
                    </td>
                    <td>$ <?= number_format($item['subtotal'], 2) ?></td>
                    <td>
                        <form method="post" action="<?= base_url('carrito/eliminar_item') ?>">
                            <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                            <button type="submit" class="btn btn-link p-0">
                                <img src="<?= base_url('assets/img/basura.png') ?>" width="40">
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $total += $item['subtotal']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end pe-2">
        <h4>Total: $ <?= number_format($total, 2) ?></h4>
    </div>

    <div class="text-end mt-3">
        <form method="post" action="<?= base_url('carrito/vaciar_carrito') ?>" class="d-inline">
            <button type="submit" class="btn btn-primary">Borrar Carrito</button>
        </form>
        <a href="<?= base_url('comprar') ?>" class="btn btn-secondary">Comprar</a>
    </div>
</div>
<br>