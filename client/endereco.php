<?php 

    // Armazena os valores do formulario de Endereços
//     $dados_formEndere = array(
//     'cep' => $_POST['cep'],
//     'cidade' => $_POST['cidade'],
//     'uf' => $_POST['uf'],
// );

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Sing Up - Pousada do Sossego</title>
</head>
<body class="body-login">
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo"></div>
    
    <!-- Card Sing Up -->
    <div class="card-login">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <h2>Cadastre um Endereço</h2>
        
        <!-- Formulario do Sing Up -->
        <form class="form-login">

            <!-- Cep -->
            <div class="form-item">
                <label for="cep">Digite seu CEP</label>
                <input type="text" id="cep" name="cep" class="form-control form-input-item" required>
            </div>

            <!-- Cidade -->
            <div class="form-item">
                <label for="cidade">Informe sua Cidade</label>        
                <input type="cidade" id="cidade" name="cidade" class="form-control form-input-item" required>
            </div>

            <!-- Uf -->
            <div class="form-item">
                <label for="uf">Digite seu UF</label>        
                <input type="uf" id="uf" name="uf" class="form-control form-input-item" required>
            </div>

            <button href="client/endereco.php" type="submit">Proximo</button>
            <button href="client/singUp.php" type="submit">Voltar</button>
        </form>
        
        <!-- Footer do Sing Up -->
        <footer id="footer-login">
            Já tem uma conta? 
        
            <a href="index.php" class="ancora-login">Entre</a>
        </footer>
    </div>
</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>