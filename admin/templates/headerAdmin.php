<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="results.php?entity=evento&action=get">Eventos</a>
                <a class="dropdown-item" href="results.php?entity=producto&action=get">Productos</a>
                <a class="dropdown-item" href="results.php?entity=usuario&action=get">Usuarios</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registros
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="results.php?entity=evento&action=post">Eventos</a>
                <a class="dropdown-item" href="results.php?entity=producto&action=post">Productos</a>
                <a class="dropdown-item" href="results.php?entity=usuario&action=post">Usuarios</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actualizaciones
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Eventos</a>
                <a class="dropdown-item" href="#">Productos</a>
                <a class="dropdown-item" href="#">Usuarios</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Eliminaciones
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Eventos</a>
                <a class="dropdown-item" href="#">Productos</a>
                <a class="dropdown-item" href="#">Usuarios</a>
            </div>
        </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Acerca De</a>
                </li>
            </ul>
    </div>
</nav>