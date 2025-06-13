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
                        <th>Respondido</th>
                        <th>Acción</th>
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
                            <td>
                                <?php if ($consulta['respondido'] === 'SI'): ?>
                                    <span class="badge bg-success">Sí</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">No</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form method="post" action="<?= base_url('consultas/cambiarRespondido/' . $consulta['id']) ?>" style="display:inline-block;">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-primary" type="submit">
                                        Cambiar
                                    </button>
                                </form>
                                
                                <form class="mt-1" method="post" action="<?= base_url('consultas/eliminar/' . $consulta['id']) ?>" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que querés eliminar esta consulta?');">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    <?php endif; ?>
</div>
<br>
<script>
    $(document).ready(function () {
        $('#tablaConsultas').DataTable({
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