<?php 
session_start();
include '../connection/connect.php';
$id = $_GET['ID'];

// condição para verificar se existe sessão, se existir sessão ele consulta os dados do cliente logado, se não ele não consulta para evitar erro
if ((isset($_SESSION['pousada'])) &&  ($_SESSION['pousada'] == "pousada")) 
{
    // select para consultar o id, nome, email e cpf do cliente logado
    $lista_cliente = $connect->query("SELECT clientes.ID, clientes.NOME, clientes.EMAIL, clientes.CPF FROM clientes WHERE clientes.ID = " . $_SESSION['id'] . ";");
    // linha do id, nome, email e cpf do cliente consultado
    $linha_cliente = $lista_cliente->fetch_assoc();
}

// select para consultar a data de entrada e saida das reservas
$lista_reserva = $connect->query("SELECT reservas.DATA_ENTRADA, reservas.DATA_ENTRADA FROM reservas");
// linha da data de entrada e saida das reservas
$linha_reserva = $lista_reserva->fetch_assoc();

// select para consultar tabela de pedidos de reservas
$lista_pedidos = $connect->query("SELECT * FROM pedidos_reservas");
// linha da tabela pedidos de reservas
$linha_pedidos = $lista_pedidos->fetch_assoc();
// retorna o número de linhas de pedidos de reservas
$linhas = $lista_pedidos->num_rows;

if ($linhas > 0) {
    // select para consultar status do pedido de reserva
    $lista_status = $connect->query("SELECT * FROM pedidos_reservas WHERE pedidos_reservas.status_ID = 1");
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

    $insert = "INSERT INTO pedidos_reservas (DATA_RESERVA, DATA_ENTRADA, DATA_SAIDA, NOME, CPF, EMAIL, ACOMPANHANTES, quartos_ID, status_ID) VALUES (default, '$data_inicio', '$data_final', '{$linha_cliente['NOME']}', '{$linha_cliente['CPF']}', '{$linha_cliente['EMAIL']}', '$acompanhantes', $id, 6)";
    $resultado = $connect->query($insert);
}

header('location: ../client/reservas.php');
?>