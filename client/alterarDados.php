<?php
    // Verificação se tem usuário logado 
    include "verificacao.php";
    
    // Função para alterar dados pessoais
    function alterarDados() {  
        // Conexão com o banco  
        include "../connection/connect.php";
        
        // Verificação para tratar possível erro 
        try {
            // Alteração da tabela do cliente (dados pessoais) 
            $connect->query("UPDATE clientes SET CPF = '".$_POST['cpfAlterar']."', RG = '".$_POST['rgAlterar']."' WHERE ID = ".$_SESSION["id"].";");
            
            // Após a alteração, voltar para a página de pefil.php
            header('location: perfil.php');

            // Retorno caso dar certo
            return true;
        } catch (\Throwable $th) {
            // Após o erro, voltar para a página de pefil.php
            header('location: perfil.php');
            
            // Retorno caso dar errado
            return false;
        }
    }

    // Chamando a função para executar a alteração uma condição para enviar mensagem de erro
    if (alterarDados()) {
        // mensagem de sucesso atribuida a variável alterar (sucesso)
        $_SESSION['alterar'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Dados pessoais alterado com sucesso!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável alterar (erro)
        $_SESSION['alterar'] = '
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
