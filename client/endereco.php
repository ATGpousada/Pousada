<?php 
    function ultimoCadastro($conexao, $tabela, $campo) {
        // Monta a consulta SQL
        $sql = "SELECT $campo FROM $tabela ORDER BY $campo DESC LIMIT 1";
        
        // Executa a consulta SQL
        $resultado = mysqli_query($conexao, $sql);
        
        // Verifica se a consulta retornou algum resultado
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtém o último registro inserido
            $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
            
            // Retorna o registro
            return $registro['ID'];
        } else {
            return false;
        }
    }
    //código busca o cep
    if(isset($_POST['cep'])){
        $cep = $_POST['cep'];
        $url = "https://viacep.com.br/ws/$cep/json/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
    
        if(isset($data['erro'])){
            header('location: config_perfil.php?cep=n');
        } else {
            $cidade = isset($data['localidade']) ? $data['localidade'] : '';
            $uf = isset($data['uf']) ? $data['uf'] : '';
        }
    }

    

    // Conexão com o banco 
    include '../connection/connect.php';

    // Verifica se tem valor nos INPUT's
    if ($_POST){
        session_start();
        $dadosCli = $_SESSION['dadosCliente'];
        // Gera o hash MD5 da senha
        $senha_criptografada = md5($dadosCli['senha']);
        // Codifica o hash MD5 em Base64
        $senha_base64 = base64_encode($senha_criptografada);
        // Combina o hash MD5 e a codificação Base64 em uma string única
        $senha_final = $senha_criptografada . ':' . $senha_base64;
         
        //insere os dados do Cliente no Banco de Dados
        $insereCli = "INSERT INTO clientes (NOME, CPF, RG, SENHA, EMAIL)
        VALUES 
        ('".$dadosCli['nome']."','".$dadosCli['cpf']."','".$dadosCli['rg']."','".$senha_final."','".$dadosCli['email']."');";


    if ($connect->query($insereCli)) {
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $tipoTel = $_POST['tipoTel'];
        $telefone = $_POST['telefone'];
        $id = ultimoCadastro($connect, 'clientes', "ID");

            // Insere os dados de endereco dos clientes no banco de dados
            $insereEndCli = ("INSERT INTO enderecos_cli (cep, cidade, uf, cliente_ID) VALUES ('$cep', '$cidade', '$uf', $id);");
            $insereTelCli = ("INSERT INTO telefones_cli (TIPO, TEL, cliente_ID) VALUES ('$tipoTel', '$telefone', $id);");     
            
            // Verifica se a inserção foi bem sucedida
            if($connect->query($insereEndCli) AND $connect->query($insereTelCli)){
                header('location: index.php');
            } else {
                // Informa o Cliente que ocorreu um erro na gravação dos dados
                echo "Ocorreu um erro na gravação dos dados. Por favor, tente novamente.";
            }
        } else {
            header('location: cadastro.php');
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
<body class="body-login-cadastro">
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo-cadastro"></div>
    
    <!-- Card Sing Up -->
    <div class="card-login-cadastro">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <h2>Cadastre um Endereço <br> e um Numero de Contato</h2>
        
        <!-- Formulario do Sing Up -->
        <form class="form-login-cadastro" method="post">

            <!-- Telefone -->
            <div class="form-item">
                <label for="telefone">Informe seu Telefone</label>        
                <input type="tel" id="telefone" name="telefone" class="form-control form-input-item" oninput="mascara(this)" required>
            </div>

            <!-- Tipo de telefone -->
            <div class="form-item">
            <label for="tipo">Digite o Tipo</label>
                <input list="tipos" name="tipo" id="tipo">
                <datalist id="tipos">
                    <option value="Pessoal">
                    <option value="Residêncial">
                    <option value="Profissional">
                </datalist>
            </div>

            <!-- Cep -->
            <div class="form-item">
                <label for="cep">Digite seu CEP</label>
                <input type="text" id="cep" name="cep" class="form-control form-input-item" oninput="mascaraCEP(this)" required>
            </div>


            <button type="submit">Proximo</button>

            
        </form>
        
        <!-- Footer do Sing Up -->
        <footer id="footer-login">
            Já tem uma conta? 
        
            <a href="index.php" class="ancora-login">Entre</a> <br>
        </footer>
    </div>
</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
<!-- busca de cep -->
<script>
    document.getElementById('cidade').value = '<?php echo $cidade; ?>';
    document.getElementById('uf').value = '<?php echo $uf; ?>';
</script>
</html>