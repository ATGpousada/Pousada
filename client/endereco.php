<?php 

    // Conexão com o banco 
    include '../connection/connect.php';

    // Verifica se tem valor nos INPUT's
    if ($_POST){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        // Consulta para ver se há Cliente cadastrado com o email especificado
        $loginQuery = $connect->query("SELECT * FROM clientes WHERE EMAIL = '$email'");

        // Recupera a quantidade de linhas
        $loginQueryNum = $loginQuery->num_rows;
        
        // Verifica se já existe um Cliente com o email informado
        if($loginQueryNum > 0) {
            // Informa o Cliente que o email já está sendo utilizado e solicita que ele insira outro email
            echo "O email informado já está sendo utilizado. Por favor, informe outro email.";
        } else {
            // Insere os dados dos clientes no banco de dados
            $insereCli = "INSERT INTO clientes (NOME, CPF, RG, SENHA, EMAIL)
            VALUES 
            ('$nome','$cpf','$rg','$senha','$email');";
            $resultado = $connect->query($insereCli);
            
            // Verifica se a inserção foi bem sucedida
            if($resultado){
                // Após a gravação bem sucedida dos dados do cliente, vai (atualiza) para "client/endereco.php"
                // para cadastrar os dados de endereço 
                if(mysqli_insert_id($connect)){
                    header('location: endereco.php');
                }
                
                // Inicia uma sessão
                session_start();
            } else {
                // Informa o Cliente que ocorreu um erro na gravação dos dados
                echo "Ocorreu um erro na gravação dos dados. Por favor, tente novamente.";
            }
        }
    }

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