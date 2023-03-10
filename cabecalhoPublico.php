<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabeçalho</title>
</head>
<body>
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm mb-5 bg-body-tertiary rounded">
        <!-- Conteúdo do cabeçalho -->
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand ms-4" href="#" style="width: 165px;">
                <img src="images/LOGO POUSADA POR EXTENSO.png" alt="Bootstrap" style="width: 100%;">
            </a>
            
            <!-- Burguer para o responsivo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu do cabeçalho -->
            <div class="collapse navbar-collapse menu" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0 d-flex gap-4">
                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line" aria-current="page" href="#">Home</a>
                    </li>
                    
                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line" href="">Servicos</a>
                    </li>

                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line" href="product/index.php">Produtos</a>
                    </li>

                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line" href="contact/index.php">Contato</a>
                    </li>
                    
                    <li class="nav-item ms-auto me-auto">
                        <a class="nav-link fs-4 hover-line" href="">Desabilitado</a>
                    </li>

                    <li class="nav-item mt-auto mb-auto d-flex justify-content-center gap-4">
                        <a href="">
                            <i class="text-decoration-none text-secondary bi bi-person-fill fs-2"></i>
                        </a>

                        <a href="">
                            <i class="text-decoration-none text-secondary bi bi-bag-check-fill fs-2"></i></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>