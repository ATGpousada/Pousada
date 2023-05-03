<?php
    // Verificação se tem usuário logado 
    include "verificacao.php";
    
    // Função para adicionar cartão
    function editaCartao() {    
        // Conexão com o banco
        include "../connection/connect.php";

        // Verificação para tratar possível erro 
        try {
            // Adição do cartão 
            $connect->query("UPDATE cartoes SET NOME_TITULAR = '".$_POST['nomeTitularAlterar']."', VALIDADE = '".$_POST['dataValidadeAlterar']."' WHERE ID = ".$_GET["ID_CARTAO"].";");

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

    // Chamando a função para executar a alteração uma condição para enviar mensagem de erro
    if (editaCartao()) {
        // mensagem de erro atribuida a variável adicionarCartao (sucesso)
        $_SESSION['editarCartao'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Cartão alterado com sucesso!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável adicionarCartao (erro)
        $_SESSION['editarCartao'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Tente novamente, não foi possível alterar o cartão!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
?>
