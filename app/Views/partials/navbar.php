<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <i class="bi bi-phone"></i> SmartStore
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link <?= url_is('/') ? 'active fw-bold' : '' ?>" href="/">Inicio</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?= url_is('celulares') ? 'active fw-bold' : '' ?>" href="/index.php/celulares">Catálogo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
