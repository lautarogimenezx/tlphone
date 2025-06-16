<div class="container mt-4">
    <h2 class="mb-4">Carrito de compras</h2>
    
    <?php if (session('mensaje')) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= session('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if (empty($cart->contents())) : ?>
        <div class="alert alert-warning">Tu carrito está vacío.</div>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart->contents() as $item) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($item['options']['imagen'])) : ?>
                                    <img src="<?= esc($item['options']['imagen']) ?>" alt="Producto" width="60">
                                <?php else : ?>
                                    <span>Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($item['name']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <form action="<?= base_url('carrito/actualiza_carrito') ?>" method="post" class="d-flex justify-content-center align-items-center">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <button type="submit" name="accion" value="restar" class="btn btn-sm btn-secondary me-1">-</button>
                                    <span><?= $item['qty'] ?></span>
                                    <button type="submit" name="accion" value="sumar" class="btn btn-sm btn-dark ms-1">+</button>
                                </form>
                            </td>
                            <td>$<?= number_format($item['subtotal'], 2) ?></td>
                            <td>
                                <form action="<?= base_url('carrito/eliminar_item') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td colspan="2"><strong>$<?= number_format($cart->total(), 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <form action="<?= base_url('carrito/vaciar_carrito') ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-warning">Vaciar Carrito</button>
            </form>

            <a href="<?= base_url('carrito/finalizar_compra') ?>" class="btn btn-success">Proceder al pago</a>
        </div>
    <?php endif; ?>
</div>

<br>
