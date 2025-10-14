<?= $this->include('partials/head') ?>
<?= $this->include('partials/navbar') ?>

<div class="container py-4">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">Smartphones en Oferta</h1>
        <p class="text-muted">Descubre nuestra selección de los mejores celulares</p>
    </div>

    <!-- Products Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php foreach ($celulares as $celular): ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                <img src="<?= $celular['imagen'] ?>" class="card-img-top" alt="<?= $celular['modelo'] ?>">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-1"><?= $celular['modelo'] ?></h5>
                        <p class="card-text text-primary fw-bold mb-2">$<?= number_format($celular['precio'], 2) ?></p>
                        <p class="card-text small text-muted"><?= substr($celular['descripcion'], 0, 80) ?>...</p>
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#detalleCelularModal<?= $celular['id'] ?>">Ver Detalles</button>
                    </div>
                </div>
                <!-- Modal Detalles -->
                <div class="modal fade" id="detalleCelularModal<?= $celular['id'] ?>" tabindex="-1" aria-labelledby="detalleCelularModalLabel<?= $celular['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detalleCelularModalLabel<?= $celular['id'] ?>">Detalles del Celular</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $celular['imagen'] ?>" class="img-thumbnail mb-3" alt="<?= $celular['modelo'] ?>" style="max-width: 380px; max-height: 380px; display: block; margin-left: auto; margin-right: auto;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Marca:</strong> <?= $celular['marca'] ?></li>
                                    <li class="list-group-item"><strong>Modelo:</strong> <?= $celular['modelo'] ?></li>
                                    <li class="list-group-item"><strong>Precio:</strong> $<?= number_format($celular['precio'], 2) ?></li>
                                    <li class="list-group-item"><strong>Almacenamiento:</strong> <?= $celular['almacenamiento'] ?></li>
                                    <li class="list-group-item"><strong>RAM:</strong> <?= $celular['ram'] ?></li>
                                    <li class="list-group-item"><strong>Descripción:</strong> <?= $celular['descripcion'] ?></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->include('partials/footer') ?>