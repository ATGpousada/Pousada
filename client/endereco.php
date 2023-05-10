<?php
    // Conexão com o banco 
    include '../connection/connect.php';

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
            $numero = $_POST['numero'];
            $log = $_POST['log'];
            $id = ultimoCadastro($connect, 'clientes', "ID");

            // Insere os dados de endereco dos clientes no banco de dados
            $insereEndCli = ("INSERT INTO enderecos_cli (CEP, CIDADE, UF, LOGRADOURO, NUMERO, cliente_ID) VALUES ('$cep', '$cidade', '$uf','$log','$numero', $id);");
            $insereTelCli = ("INSERT INTO telefones_cli (TIPO, TEL, cliente_ID) VALUES ('$tipoTel', '$telefone', $id);");     
            
            // Verifica se a inserção foi bem sucedida
            if($connect->query($insereEndCli) AND $connect->query($insereTelCli)){
                // mensagem de erro atribuida a variável alterar (sucesso)
                $_SESSION['cadastro'] = '
                    <div style="z-index: 9999;" class="toast align-items-center text-bg-success border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                Cadastro efetuado com sucesso. Faça seu login!
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                ';     

                header('location: index.php');
            } else {
                // Informa o Cliente que ocorreu um erro na gravação dos dados
                $_SESSION['cadastro'] = '
                    <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                Ocorreu um erro na gravação dos dados. Por favor, tente novamente!
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                ';  
            }
        } else {
            // Informa o Cliente que ocorreu um erro na gravação dos dados
            $_SESSION['cadastro'] = '
                <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            Ocorreu um erro na gravação dos dados. Por favor, tente novamente!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            ';  

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
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Mensagem na tela -->
    <?php 
        if(isset($_SESSION['cadastro'])){
            echo $_SESSION['cadastro'];
            unset($_SESSION['cadastro']);
        }
    ?>

    <!-- Icone para voltar -->
    <a class="icon-voltar-cadastro" href="cadastro.php"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>

    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo-cadastro"></div>

    <!-- Card Sing Up -->
    <div class="card-login-cadastro" style="min-width: 250px; max-height: 800px;">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <div id="txt1"><h2>Cadastro de Endereço <br> e Numero de Contato</h2>
        <p>Informe seus dados</p></div>
        <div id="txt2">
            <h4>Cadastro</h2>
        </div>

        
        <!-- Formulario do Sing Up -->
        <form class="form-login-cadastro" style="width: 100%; min-width: 200px;" method="post">

            <div class="nresp d-flex">
                <!-- Telefone -->
                <div id="tel" class="nrespfi form-item">
                    <label for="telefone">Telefone</label>        
                    <input type="tel" id="telefone" name="telefone" class="form-control form-input-item" data-js="phone" required>
                </div>

                <!-- Tipo de telefone -->
                <div id="tel" class="nrespfi form-item ms-2">
                    <label for="tipo">Tipo</label>
                    <input list="tipos" name="tipoTel" class="form-control form-input-item" id="tipo">
                    <datalist id="tipos">
                        <option value="Pessoal">
                        <option value="Residêncial">
                        <option value="Profissional">
                    </datalist>
                </div>

            </div>


            <!-- Cep -->
            <div class="form-item">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control form-input-item" data-js="cep" required>
            </div>

            <div id="des" class=" nresp d-flex">
                <!-- Cidade -->
                <div id="cid" class="nrespfi form-item w-75">
                    <label for="cidade">Cidade</label>        
                    <input type="api" id="cidade" name="cidade" value="" class="form-control form-input-item" required readonly>
                </div>
                <!-- Uf -->
                <div id="ufa" class="nrespfi form-item w-25 ms-2">
                    <label for="uf">UF</label>        
                    <input type="api" id="uf" name="uf" value="" class="form-control form-input-item" required readonly>
                </div>
            </div>




            <div class="nresp d-flex">
            <!-- Logradouro -->
                <div id="logr" class="nrespfi form-item w-75">
                    <label for="log">Logradouro</label>        
                    <input type="api" id="log" name="log" value="" class=" form-control form-input-item" required readonly>
                </div>
                <!-- Numero -->
                <div name="num" id="num" class="nrespfi form-item w-25 ms-2">
                    <label for="numero">Numero</label>        
                    <input type="numero" id="numero" name="numero" class="form-control form-input-item" required>
                </div>

            </div>

            <div class="">
                <input type="checkbox" style="width:'3px !impotant'" name="termos" id="termos" required>
                Lí e concordo com os <a href="termos.php">termos</a>
            </div>

            <button type="submit">Cadastrar-se</button>
        </form>
        
        <!-- Footer do Sing Up -->
        <footer id="footer-login">
            Já tem uma conta? 
        
            <a href="index.php" class="ancora-login">Entre</a> <br>
        </footer>
    </div>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- responsivo -->
<script>
            $('#txt2').hide();
    $(window).resize(() => {
        let larguraTela = $(window).width();
        if (larguraTela < 960) {
        // Remove o display flex
        $('.nresp').removeClass('d-flex');
        // deixa do msm tamanho
        $('.nrespfi').removeClass().addClass('nrespfi form-item ');
        $('#des').hide();
        $('#txt1').hide();
        $('#txt2').show();
    }else{
        $('.nresp').addClass('d-flex');
        $('#num').addClass(' form-item w-25 ms-2');
        $('#logr').addClass(' form-item w-75');
        $('#des').show();
        $('#cid').addClass(' form-item w-25 ms-2');
        $('#ufa').addClass(' form-item w-75');
        $('#cid').addClass(' form-item ');
        $('#ufa').addClass(' form-item ms-2');
        $('#txt1').show();
        $('#txt2').hide();
    }
    })
    // Chamando a função
    inicializaResponsivoEndereco();
    //Inicializa sem um evento
    function inicializaResponsivoEndereco() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    if (larguraTela < 960) {
        // Remove o display flex
        $('.nresp').removeClass('d-flex');
        // deixa do msm tamanho
        $('.nrespfi').removeClass().addClass('nrespfi form-item mb-3');
        $('#des').hide();
        $('#txt1').hide();
        $('#txt2').show();
    }
}


</script>
<!-- API cep -->
<script>
$(document).ready(function(){
    $("input[name=cep]").keyup(function(){
        var cep = $(this).val().replace(/[^0-9]/, '');
        if(cep){
            var url = 'https://viacep.com.br/ws/'+cep+'/json/';
            $.ajax({
                    url: url,
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: "application/json",
                    success : function(json){
                        if(json.logradouro){
                            $("input[id=cidade]").attr('value', json.localidade);
                            $("input[id=uf]").attr('value', json.uf);
                            $("input[id=log]").attr('value', json.logradouro);
                        }
                    }
            });
        }                   
    }); 
});    
</script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>