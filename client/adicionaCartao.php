<?php
    // Verificação se tem usuário logado 
    include "verificacao.php";
    
    // Função para adicionar cartão
    function adicionaCartao() {    
        // Conexão com o banco
        include "../connection/connect.php";

        // Consulta para tratar erro caso já existente o mesmo cartão cadastrado
        $verificacaoCartao = $connect->query("SELECT * FROM cartoes where cvv = '".$_POST['cvv']."';");
        
        // Verificação se cartão já existe
        if ($verificacaoCartao->num_rows > 0) {
            // Após a verificação, voltar para a página de formasPagamentoPerfil.php
            header('location: formasPagamentoPerfil.php');
            
            // retorna falso
            return false;
        } else {
            // Verificação para tratar possível erro 
            try {
                // Adição do cartão 
                $connect->query("INSERT INTO cartoes(NOME_TITULAR, NUMERO, VALIDADE, CVV, TIPO, clientes_ID) VALUES ('".$_POST['nomeTitular']."', '".$_POST['numeroCartao']."', '".$_POST['dataValidade']."', '".$_POST['cvv']."', '".$_POST['tipoCartao']."', ".$_SESSION['id'].");");

                // Após a verificação, voltar para a página de formasPagamentoPerfil.php
                header('location: formasPagamentoPerfil.php');

                // Retorno caso dar certo
                return true;
            } catch (\Throwable $th) {
                // Após a verificação, voltar para a página de formasPagamentoPerfil.php
                header('location: formasPagamentoPerfil.php');

                // Variável com erro
                return false;
            }
        }
    }

    // Chamando a função para executar a alteração uma condição para enviar mensagem de erro
    if (adicionaCartao()) {
        // mensagem de erro atribuida a variável adicionarCartao (sucesso)
        $_SESSION['adicionarCartao'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Cartão cadastrado com sucesso!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável adicionarCartao (erro)
        $_SESSION['adicionarCartao'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Coloque outro cartão, esse já está cadastrado!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
?>
