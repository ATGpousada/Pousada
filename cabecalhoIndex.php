<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onbeforeunload="headerResponsivo();">
    <header>
        <!-- Cabeçalho -->
        <nav class="navbar navbar-expand-lg shadow-sm mb-5 rounded-bottom p-2 fixed-top" id="area-header" style="transition: 0.3s;">
            <!-- Conteúdo do cabeçalho -->
            <div class="container-fluid me-2">
                <!-- Logo -->
                <a class="navbar-brand ms-4" href="index.php" style="width: 165px;">
                    <img src="images/logo/LOGO POUSADA POR EXTENSO.png" alt="Bootstrap" style="width: 100%;">
                </a>

                <!-- Icons do usuário e pedidos -->
                <div class="ms-auto me-3" id="icones">
                    <ul class="navbar-nav mb-lg-0 d-flex gap-4">
                        <li class="nav-item mt-auto mb-auto d-flex justify-content-center gap-4">
                            <a href="" class="">
                                <i class="text-decoration-none text-secondary bi bi-bag-check-fill fs-2"></i></i>
                            </a>

                            <a href="client/index.php" class="">
                                <i class="text-decoration-none text-secondary bi bi-person-fill fs-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>            
                
                <!-- Burguer para o responsivo -->
                <button id="btn-menu-toggler" onclick="colorResponsive();" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Menu do cabeçalho -->
                <div class="collapse navbar-collapse menu" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 d-flex gap-4">
                        <li class="nav-item ms-auto me-auto">
                            <a class="nav-link fs-4 hover-line text-dark px-3 fonte" aria-current="page" href="index.php">Home</a>
                        </li>
                        
                        <li class="nav-item ms-auto me-auto">
                            <a class="nav-link fs-4 hover-line text-dark px-3 fonte" href="product/index.php">Serviços</a>
                        </li>

                        <li class="nav-item ms-auto me-auto">
                            <a class="nav-link fs-4 hover-line text-dark px-3 fonte" href="contact/index.php">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>