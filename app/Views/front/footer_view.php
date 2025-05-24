
<footer class="bg-dark text-white pt-2 pb-2">
    <div class="container">
    <div class="row align-items-center text-center text-md-start">

        <!-- Categorías a la izquierda -->
        <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="fw-bold mb-2">TLPHONE</h5>
        <p class="mb-1 small">info@tlphone.com.ar</p>
        <p class="mb-1 small">ventas@tlphone.com.ar</p>
        <p class="mb-0 small">+54 3777-622526</p>
        </div>

        <!-- Redes sociales al centro con imágenes -->
        <div class="col-md-4 mb-4 mb-md-0 text-center">
        <p class="text-center small text-light mb-0">&copy; 2025 <strong>TLPHONE</strong>. Todos los derechos reservados.
        </p>
        <a href="<?php echo base_url('terminos');?>" class="text-secondary link-light text-decoration-none">Terminos y Condiciones<a>
        <br>
        <a href="<?php echo base_url('comercializacion');?>" class="text-secondary link-light text-decoration-none">Comercialización</a>
        </div>

        <!-- Información de contacto a la derecha -->
        <div class="col-md-4 text-md-end mpt-2 pb-2">
        <div class="d-flex justify-content-center gap-3">
            <a href="https://www.facebook.com/">
            <img src="<?= base_url('assets/img/facebook.png') ?>" alt="Facebook" width="40">
            </a>
            <a href="https://www.instagram.com/">
            <img src="<?= base_url('assets/img/ig.png') ?>" alt="Instagram" width="40">
            </a>
            <a href="https://www.tiktok.com/">
            <img src="<?= base_url('assets/img/tiktok.png') ?>" alt="TikTok" width="40">
            </a>
            <a href="https://wa.me/+543777622526">
            <img src="<?= base_url('assets/img/wpp.png') ?>" alt="WhatsApp" width="40">
            </a>
        </div>
        </div>
    </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Espera 4 segundos y luego oculta el mensaje
    setTimeout(function () {
        const mensaje = document.getElementById('mensaje-bienvenida');
        if (mensaje) {
            // Efecto de desvanecimiento (opcional)
            mensaje.style.transition = 'opacity 0.5s ease';
            mensaje.style.opacity = '0';
            setTimeout(() => mensaje.style.display = 'none', 500); // Oculta completamente después del fade
        }
    }, 4000); // 4000 ms = 4 segundos
</script>
</body>

</html>