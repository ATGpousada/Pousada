<?php
session_start();
include '../connection/connect.php';
$id = $_GET['ID'];

// condição para verificar se existe sessão, se existir sessão ele consulta os dados do cliente logado, se não ele não consulta para evitar erro
if ((isset($_SESSION['pousada'])) && ($_SESSION['pousada'] == "pousada")) 
{
    // select para consultar o id, nome, email e cpf do cliente logado
    $lista_cliente = $connect->query("SELECT clientes.ID, clientes.NOME, clientes.EMAIL, clientes.CPF FROM clientes WHERE clientes.ID = " . $_SESSION['id'] . ";");
    // linha do id, nome, email e cpf do cliente consultado
    $linha_cliente = $lista_cliente->fetch_assoc();
}

// select para consultar a data de entrada e saida das reservas
$lista_reserva = $connect->query("SELECT pedidos_reservas.DATA_ENTRADA, pedidos_reservas.DATA_ENTRADA FROM pedidos_reservas"); // trocar dps
// linha da data de entrada e saida das reservas
$linha_reserva = $lista_reserva->fetch_assoc();

// select para consultar tabela de pedidos de reservas
$lista_pedidos = $connect->query("SELECT * FROM pedidos_reservas");
// linha da tabela pedidos de reservas
$linha_pedidos = $lista_pedidos->fetch_assoc();
// retorna o número de linhas de pedidos de reservas
$linhas = $lista_pedidos->num_rows;

if ($linhas > 0) 
{
    // select para consultar status do pedido de reserva
    $lista_status = $connect->query("SELECT pedidos_reservas.DATA_ENTRADA, pedidos_reservas.DATA_SAIDA FROM pedidos_reservas WHERE pedidos_reservas.status_ID = 5");
    // linha do status do pedido de reserva
    $linha_status = $lista_status->fetch_assoc();
}

if ($_POST) 
{
    // variáveis que armazenam valores do formulário
    $data_inicio = $_POST['data_inicio']; // variável que armazena a data de inicio enviada do formulario
    $data_final = $_POST['data_final']; // variável que armazena a data final enviada do formulario
    $criancas = $_POST['number_criancas']; // variável que armazena o numero de criancas enviado do formulario
    $adultos = $_POST['number_adultos']; // variável que armazena o numero de adultos enviado do formulario
    $acompanhantes = $criancas + $adultos; // variável que armazena o numero total de acompanhantes

    $insert = "INSERT INTO pedidos_reservas (DATA_RESERVA, DATA_ENTRADA, DATA_SAIDA, NOME, CPF, EMAIL, ACOMPANHANTES, quartos_ID, status_ID) VALUES (default, '$data_inicio', '$data_final', '{$linha_cliente['NOME']}', '{$linha_cliente['CPF']}', '{$linha_cliente['EMAIL']}', '$acompanhantes', $id, 7)";
    
    // Chamando a função para executar a alteração uma condição para enviar mensagem de erro
    if ($connect->query($insert)) {
        // mensagem de sucesso atribuida a variável adicionarCartao (sucesso)
        $_SESSION['reserva'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Pedido de reserva realizado com sucesso!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável adicionarCartao (erro)
        $_SESSION['reserva'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Não foi possível realizar a reserva, tente novamente!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
}

header('location: ../client/reservas.php');
?>
