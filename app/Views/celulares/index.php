<?= $this->include('partials/head') ?>
<?= $this->include('partials/navbar') ?>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Catálogo de Celulares</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarCelularModal">
                Registrar Celular
            </button>
            <?= $this->include('celulares/create') ?>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Almacenamiento</th>
                        <th>RAM</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($celulares) && is_array($celulares)): ?>
                        <?php foreach ($celulares as $celular): ?>
                            <tr>
                                <td><?= $celular['id'] ?></td>
                                <td><?= $celular['marca'] ?></td>
                                <td><?= $celular['modelo'] ?></td>
                                <td>$<?= number_format($celular['precio'], 2) ?></td>
                                <td><?= $celular['almacenamiento'] ?> GB</td>
                                <td><?= $celular['ram'] ?> GB</td>
                                <td>
                                    <div class="btn-group" role="group">
                                      <button data-bs-toggle="modal" data-bs-target="#editarCelularModal<?= $celular['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</button>
                                      <?= view('celulares/edit', ['celular' => $celular]) ?>
                                      <button data-bs-toggle="modal" data-bs-target="#eliminarCelularModal<?= $celular['id'] ?>" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                      <?= view('celulares/delete', ['celular' => $celular]) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay celulares registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->include('partials/footer') ?>