<!-- Modal Eliminar Celular -->
<div class="modal fade" id="eliminarCelularModal<?= $celular['id'] ?>" tabindex="-1" aria-labelledby="eliminarCelularModalLabel<?= $celular['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarCelularModalLabel<?= $celular['id'] ?>">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <strong>⚠️ ¡Atención!</strong> Esta acción no se puede deshacer.
                </div>
                <p>¿Estás seguro de que deseas eliminar el siguiente celular?</p>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><?= $celular['marca'] ?> <?= $celular['modelo'] ?></h6>
                        <p class="card-text">
                            <strong>Precio:</strong> $<?= number_format($celular['precio'], 2) ?><br>
                            <strong>Almacenamiento:</strong> <?= $celular['almacenamiento'] ?> GB<br>
                            <strong>RAM:</strong> <?= $celular['ram'] ?> GB
                        </p>
                        <?php if (!empty($celular['descripcion'])): ?>
                            <p class="card-text"><small class="text-muted"><?= $celular['descripcion'] ?></small></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="/index.php/celulares/delete/<?= $celular['id'] ?>" method="POST" style="display: inline;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
