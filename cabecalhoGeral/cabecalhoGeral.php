<header onbeforeunload="headerResponsivo();">
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg shadow-sm mb-5 bg-body-tertiary rounded-bottom p-2 fixed-top" id="area-header" style="transition: 0.3s;">
        <!-- Conteúdo  do cabeçalho -->
        <div class="container-fluid me-2">
            <!-- Logo -->
            <a class="navbar-brand ms-4" href="../index.php" style="width: 165px;">
                <img src="../images/logo/LOGO POUSADA POR EXTENSO.png" alt="Bootstrap" style="width: 100%;">
            </a>

            <!-- Icons do usuário e pedidos -->
            <div class="ms-auto me-3" id="icones">
                <ul class="navbar-nav mb-lg-0 d-flex gap-4">
                    <li class="nav-item mt-auto mb-auto d-flex justify-content-center">
                        <a href="../client/index.php">
                            <i class="text-decoration-none bi bi-person-fill fs-2"></i>
                        </a>
                    </li>
                </ul>
            </div>            
            
            <!-- Burguer para o responsivo -->
            <button id="btn-menu-toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu do cabeçalho -->
            <div class="collapse navbar-collapse menu" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 d-flex gap-4">
                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line text-dark px-3 fonte" aria-current="page" href="../index.php">Home</a>
                    </li>
                    
                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line text-dark px-3 fonte" href="../product/index.php">Quartos</a>
                    </li>

                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line text-dark px-3 fonte" href="../contact/index.php">Contato</a>
                    </li>

                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line text-dark px-3 fonte" href="../about/index.php">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>