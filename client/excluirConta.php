<?php
    // Verificação se tem usuário logado 
    include "verificacao.php";

    // Função para excluir conta
    function excluirConta() {  
        // Conexão com o banco  
        include "../connection/connect.php";

        // Verificação para tratar possível erro 
        try {
            // Exclusão da conta cliente
            $connect->query("DELETE FROM cartoes WHERE clientes_ID = ".$_SESSION["id"].";");
            $connect->query("DELETE FROM enderecos_cli WHERE cliente_ID = ".$_SESSION["id"].";");
            $connect->query("DELETE FROM telefones_cli WHERE cliente_ID = ".$_SESSION["id"].";");
            $connect->query("DELETE FROM clientes WHERE ID = ".$_SESSION["id"].";");

            // Após a exclusão, voltar para a página de index.php
            header('location: ../index.php');

            // Destrói a variavél da sessão
            unset($_SESSION['pousada']);

            // Retorno caso dar certo
            return true;
        } catch (\Throwable $th) {
            // Após a desativação, voltar para a página de index.php
            header('location: configuracao.php');

            // Retorno caso dar errado
            return false;
        }
    }

    // Chamando a função para executar a exclusão(uma condição para enviar mensagem de erro)
    if (excluirConta()) {
        // mensagem de erro atribuida a variável alterar (sucesso)
        $_SESSION['conf-s'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Conta excluída com sucesso!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável alterar (erro)
        $_SESSION['conf'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Ação mal sucedida, tente novamente!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
?>