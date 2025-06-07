<!-- app/Views/back/compras/finalizar_compra.php -->
<div class="container mt-5">
    <h2>Confirmar compra</h2>
    <p>Total a pagar: <strong>$<?= number_format($cart->total(), 2) ?></strong></p>

    <form action="<?= base_url('ventas/registrar_venta') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-success">Finalizar compra</button>
    </form>

    <a href="<?= base_url('carrito') ?>" class="btn btn-secondary mt-2">Volver al carrito</a>
</div>
<br>
