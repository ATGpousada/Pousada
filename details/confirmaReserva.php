<?php
//condição para verificar se existe sessão para fazer a consulta, se não existir essa consulta toda vez que entrar na página de detalhes sem ter sessão dara erro pois o where
// depende do id de sessão
if ((isset($_SESSION['pousada'])) &&  ($_SESSION['pousada'] == "pousada"))
{
    // select para consultar o id, nome, email e cpf do cliente logado
    $lista_cliente = $connect->query("SELECT clientes.ID, clientes.NOME, clientes.EMAIL, clientes.CPF FROM clientes WHERE clientes.ID = ".$_SESSION['id'].";");
    // linha do id, nome, email e cpf do cliente consultado
    $linha_cliente = $lista_cliente->fetch_assoc();
}
// select para consultar o id do quarto aberto 
$lista_quarto = $connect->query("SELECT quartos.ID, quartos.status_ID FROM quartos WHERE quartos.ID = $id");
// linha do id do quarto consultado
$linha_quarto = $lista_quarto->fetch_assoc();



$criancas = $_POST['number_criancas'];
$adultos = $_POST['number_adultos'];
?>