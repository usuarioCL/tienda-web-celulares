<!-- Modal Editar -->
<div class="modal fade" id="editarCelularModal<?= $celular['id'] ?>" tabindex="-1" aria-labelledby="editarCelularModalLabel<?= $celular['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCelularModalLabel">Editar Celular</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/index.php/celulares/update/<?= $celular['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="<?= $celular['id'] ?>">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?= $celular['marca'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $celular['modelo'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?= $celular['precio'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="almacenamiento" class="form-label">Almacenamiento</label>
                        <input type="text" class="form-control" id="almacenamiento" name="almacenamiento" value="<?= $celular['almacenamiento'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ram" class="form-label">RAM</label>
                        <input type="text" class="form-control" id="ram" name="ram" value="<?= $celular['ram'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="1" required><?= $celular['descripcion'] ?></textarea>
                    </div>
                    <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <?php if (!empty($celular['imagen'])): ?>
                                <div class="mb-2">
                                    <img src="/<?= $celular['imagen'] ?>" alt="Imagen actual" style="max-width: 100px; max-height: 100px; border-radius: 8px; border: 1px solid #ccc;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
