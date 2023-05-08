<?php
session_start();
include '../connection/connect.php';
$id = $_GET['ID'];

// condição para verificar se existe sessão, se existir sessão ele consulta os dados do cliente logado, se não ele não consulta para evitar erro
if ((isset($_SESSION['pousada'])) &&  ($_SESSION['pousada'] == "pousada")) {
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

if ($linhas > 0) {
    // select para consultar status do pedido de reserva
    $lista_status = $connect->query("SELECT * FROM pedidos_reservas WHERE pedidos_reservas.status_ID = 4");
    // linha do status do pedido de reserva
    $linha_status = $lista_status->fetch_assoc();
}

if ($_POST) {
    // variáveis que armazenam valores do formulário
    $data_inicio = $_POST['data_inicio']; // variável que armazena a data de inicio enviada do formulario
    $data_final = $_POST['data_final']; // variável que armazena a data final enviada do formulario
    $criancas = $_POST['number_criancas']; // variável que armazena o numero de criancas enviado do formulario
    $adultos = $_POST['number_adultos']; // variável que armazena o numero de adultos enviado do formulario
    $acompanhantes = $criancas + $adultos; // variável que armazena o numero total de acompanhantes

    $insert = "INSERT INTO pedidos_reservas (DATA_RESERVA, DATA_ENTRADA, DATA_SAIDA, NOME, CPF, EMAIL, ACOMPANHANTES, quartos_ID, status_ID) VALUES (default, '$data_inicio', '$data_final', '{$linha_cliente['NOME']}', '{$linha_cliente['CPF']}', '{$linha_cliente['EMAIL']}', '$acompanhantes', $id, 7)";
    $resultado = $connect->query($insert);
}

header('location: ../client/reservas.php');
?>
<!-- Início script para verificar datas reservadas do banco -->
<script>
    // Função para verificar se uma data está reservada
    function isDataReservada(data) {
        // Lógica para consultar o banco de dados e verificar se a data está reservada

        if (<?php echo $linhas > 0 ?>) {
            if (<?php echo $linha_status ?>) {
                var datasReservadas = <?php echo $linha_reserva ?>;
                return datasReservadas.includes(data);
            }
        }
        return false
        // Retorne true se a data estiver reservada e false caso contrário

        // Exemplo simplificado:
        //var datasReservadas = ['2023-05-02', '2023-05-07', '2023-05-12'];
        //return datasReservadas.includes(data);
    }

    // Desabilitar as datas já reservadas
    document.getElementById('data_inicio').addEventListener('change', function() {
        var dataInicio = this.value;
        var dataFinalInput = document.getElementById('data_final');
        var dataFinal = dataFinalInput.value;

        // Habilitar todas as datas no início
        dataFinalInput.disabled = false;

        // Desabilitar as datas já reservadas
        var todasAsDatas = document.querySelectorAll('input[type="datetime-local"]');
        todasAsDatas.forEach(function(dataInput) {
            var data = dataInput.value;
            if (data && isDataReservada(data)) {
                dataInput.disabled = true;
            }
        });

        // Verificar se a data final já está reservada
        if (dataFinal && isDataReservada(dataFinal)) {
            dataFinalInput.value = '';
        }
    });

    // Desabilitar as datas já reservadas
    document.getElementById('data_final').addEventListener('change', function() {
        var dataFinal = this.value;
        var dataInicioInput = document.getElementById('data_inicio');
        var dataInicio = dataInicioInput.value;

        // Habilitar todas as datas no início
        dataInicioInput.disabled = false;

        // Desabilitar as datas já reservadas
        var todasAsDatas = document.querySelectorAll('input[type="datetime-local"]');
        todasAsDatas.forEach(function(dataInput) {
            var data = dataInput.value;
            if (data && isDataReservada(data)) {
                dataInput.disabled = true;
            }
        });

        // Verificar se a data de início já está reservada
        if (dataInicio && isDataReservada(dataInicio)) {
            dataInicioInput.value = '';
        }
    });
</script>
<!-- Fim script para verificar datas reservadas do banco -->