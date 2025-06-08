<div class="container mt-5">
    <h2 class="mb-4">Consultas recibidas</h2>

    <?php if (empty($consultas)): ?>
        <div class="alert alert-info">No hay consultas aún.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table id="tablaConsultas" class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= $consulta['id'] ?></td>
                            <td><?= esc($consulta['nombre']) ?></td>
                            <td><?= esc($consulta['email']) ?></td>
                            <td><?= esc($consulta['mensaje']) ?></td>
                            <td><?= $consulta['fecha'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<script>
    $(document).ready(function () {
        $('#tablaConsultas').DataTable({
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar MENU entradas",
                "info": "Mostrando START a END de TOTAL ventas",
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