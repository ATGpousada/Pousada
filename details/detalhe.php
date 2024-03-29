<?php
include '../date/limitarData.php';
$objetoData = new DataVerifica();
$min = $objetoData->getDataMinima();
echo $min;
$max =  $objetoData->getDataMaxima();
// select para repetição de sub-imagens
$listaIMG = $connect->query("SELECT * FROM imagens WHERE quartos_ID = $id;");
$linhaIMG = $listaIMG->fetch_assoc();
$linhasIMG = $listaIMG->num_rows;

// select para repetição de sub-imagens no responsivo
$listaIMGres = $connect->query("SELECT * FROM imagens WHERE quartos_ID = $id;");
$linhaIMGres = $listaIMGres->fetch_assoc();
$linhasIMGres = $listaIMGres->num_rows;

// select para consultar o id do quarto aberto 
$lista_quarto = $connect->query("SELECT quartos.ID, quartos.status_ID, quartos.QTDE_PESSOAS FROM quartos WHERE quartos.ID = $id");
// linha do id do quarto consultado
$linha_quarto = $lista_quarto->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt_BR" id="subir">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color: #ebf4fa;" ng-app="meuApp" ng-controller="Controlador">
    <main>
        <!-- Div principal (Foto quarto, titulo, preço, botão...) -->
        <div id="geral_del" class="flex-sa" style="margin-top: 130px;">

            <!-- Imagem Principal -->
            <span id="img_principal">
                <img src="<?php echo $linha['IMAGEM_CAMINHO_2'] ?>" class="imagem-grande">
            </span>


            <!-- Sub-Imagens do Responsivo -->
            <div id="esconder_imgs" class="sub-imgs">
                <?php do { ?>
                    <img src="<?php echo $linhaIMGres['IMAGEM_CAMINHO_2'] ?>" class="imagem-pequena">
                <?php } while ($linhaIMGres = $listaIMGres->fetch_assoc()); ?>
            </div>

            <!-- Titulo, preço do Quarto e Botão de Reserva -->
            <div class="text-detail">

                <p id="titulo" class="text-center"><?php echo $linha['QUARTO']; ?></p>

                <!-- Icons -->
                <div class="text-center icones_detalhes" style="font-size: 30px; margin-top: 20px; margin-bottom: 20px;">

                    <div class="icones_detalhes text-center" style="margin-right: 25px;">
                        <i class="fa-solid fa-users"></i>
                        <span class="texto_del"><?php echo $linha['QTDE_PESSOAS']; ?></span>
                    </div>

                    <div class="icones_detalhes text-center" style="margin-right: 25px;">
                        <i class="fa-solid fa-car-side"></i>
                        <span class="texto_del">1</span>
                    </div>

                    <div class="icones_detalhes text-center" style="margin-right: 25px;">
                        <i class="fa-solid fa-paw"></i>
                        <span class="texto_del">✓</span>
                    </div>

                    <div class="icones_detalhes text-center">
                        <i class="fa-solid fa-mug-hot"></i>
                        <span class="texto_del">✓</span>
                    </div>
                </div>

                <span style="display: flex;justify-content: space-around; width: 60%; align-items: center;" class="flex-wrap">

                    <p class="preco"> R$&nbsp;<?php echo str_replace('.', ',', $linha['PRECO_DIARIA']); ?></p>

                    <a class="botao_del" style="max-height: 50px;" data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="vertical-align:middle">
                        <span>
                            Reservar
                        </span>
                    </a>
                </span>
            </div>

        </div>

        <!-- Sub-Imagens do Quarto (Normal) -->
        <div class="flex">
            <div id="sub-normal" class="sub-imgs">
                <?php do { ?>
                    <img src="<?php echo $linhaIMG['IMAGEM_CAMINHO_2'] ?>" class="imagem-pequena">
                <?php } while ($linhaIMG = $listaIMG->fetch_assoc()); ?>
            </div>
        </div>

        <!-- Descrição do Quarto -->
        <div class="desc_del">

            <hr class="linha_del">
            <h2 class="text-center" style="font-weight: bold; margin-bottom:15px;">
                Detalhes do Quarto
            </h2>

            <p><?php echo $linha['DESCRICAO']; ?></p>
        </div>
    </main>

    <!-- Modal 1  De Regras-->
    <div class="modal s-modal cor fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">REGRAS</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color:#d7e8f7;">
                    <div id="regras">
                        <ul class="list-group list-group-numbered">
                            <li class="list-group-item"><strong style="color: black">Os pedidos devem ser solicitados com dias de entrada e saída, assim como quantidade de acompanhantes;</strong></li>
                            <li class="list-group-item"><strong style="color: black">É obrigatório em cada reserva ter ao menos 1 adulto;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Toda criança é abaixo de 12 anos de idade, toda criança não paga valor algum e não é contada como um acompanhante, dessa forma um quarto que cabe até 4 pessoas pode ter até 3 crianças;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Se o cliente pagar e não comparecer, ou chegar nos dias seguintes, não será reembolsado pelos dias perdidos, e no caso de o cliente não cancelar sua reserva e não comparecer dia algum, também não será reembolsado;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Após aprovação do pedido de reserva será solicitado 30% do valor da reserva de adiantamento;</strong></li>
                            <li class="list-group-item"><strong style="color: black">O tempo de permanência máxima da pousada é de 14 dias;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Os clientes poderão alterar suas reservas, como quantidade de pessoas, quartos e tempo de permanência, com um mínimo de 72 horas de antecedência em relação ao dia da reserva;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Cancelamentos só serão permitidos com no máximo 24 horas de antecedência;</strong></li>
                            <li class="list-group-item"><strong style="color: black">Antes de ser considerado uma reserva a pousada precisa aprovar um pedido e o cliente será notificado por e-mail. Após isso, sera solicitado um pagamento de 30% do valor da estadia. Após o pagamento a reserva será confirmada;</strong></li>
                        </ul>
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color:#0d6efd;">
                    <div class="form-check"> <!-- Início Check Box -->
                        <!-- fazer funcionar o required do checkbox -->
                        <input class="form-check-input" id="termos" type="checkbox" id="flexCheckDefault" onclick="termos();">
                        <label class="form-check-label" for="termos" style="color:white">
                            Concordo com as regras
                        </label> <!-- Fim Check Box -->
                    </div>

                    <button class="btn btn-success text-white" id="reserva-btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">AVANÇAR</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal de Regras -->

    <!-- Modal 2 de inputs para pedido de reserva-->
    <div class="modal s-modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: #d7e8f7;">
                <div class="modal-header" style="display: block !important;">
                    <h4 class="modal-title text-center" id="staticBackdropLabel" style="color:white">
                        REALIZAR PEDIDO DE RESERVA
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- INÍCIO DO FORMLÁRIO -->
                    <form method="post" action="enviaPedido.php?ID=<?php echo $_GET['ID']?>">
                        <div class="d-flex justify-content-center" style="margin-top:30px;">
                            <span id="datas_modal" class="text-center" style="margin: 0 30px;" name="data_inicio">
                                <h4>DATA INICIO</h4>
                                <input type="datetime-local" name="data_inicio" id="data_inicio" min="<?php echo $min ?>" max="<?php echo $max; ?>" required>
                            </span>

                            <span id="datas_modal" class="text-center" style="margin: 0 30px; margin-bottom: 40px;" name="data_final">
                                <h4>DATA FINAL</h4>
                                <input type="datetime-local" name="data_final" id="data_final" min="<?php echo $min ?>" max="<?php echo $max ?>" required>
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-around" style="margin-bottom: 15px;">
                            <div style="width: 100%;">
                                <div class=" text-center">
                                    <strong>ADULTOS</strong>
                                </div>

                                <div class="d-flex justify-content-center" ng-show="Adulto" id="reserva-pessoas">
                                    <input type="number" class="text-center" name="number_adultos" id="number_adultos" value="1" min="1" max=<?php echo $linha_quarto['QTDE_PESSOAS']; ?> ng-model="adultos" required>
                                    <!-- pega a quantidade máxima de pessoas por quarto -->
                                </div>
                            </div>

                            <div style="width: 100%;">
                                <div class=" text-center">
                                   <strong>CRIANÇAS</strong> 
                                </div>

                                <div class="d-flex justify-content-center" ng-show="Crianca" id="reserva-pessoas">
                                    <input type="number" class="text-center" name="number_criancas" id="number_criancas" value="0" min=0 max=<?php echo $linha_quarto['QTDE_PESSOAS'] - 1; ?> ng-model="criancas" required>
                                    <!-- pega a quantidade máxima de pessoas por quarto -1 por que é obrigatório ter ao menos 1 adulto -->
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" >VOLTAR</button>
                            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button> -->
                            <?php if ((isset($_SESSION['pousada'])) &&  ($_SESSION['pousada'] == "pousada")) // se tiver com sessão, as informações inseridas do formulário serão enviadas
                            {
                            ?>
                                <button type="submit" onclick="verificarDisponibilidade()" class="btn btn-success text-decoration-none text-reset" style="color: white !important;" id="btn-consultar" method="post">
                                    ENVIAR
                                </button>
                            <?php
                            } else // se caso não tiver sessão ele redireciona o usuário para a página de login
                            { ?>
                                <a href="mensagemErro.php" type="button" class="btn btn-success text-decoration-none text-reset" style="color: white !important;" id="btn-consultar">
                                    ENVIAR
                                </a>
                            <?php } ?>
                        </div>
                    </form>
                    <!-- FIM DO FORMULÁRIO -->
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal 2 para inputs de pedido de reservas -->

    <!-- Início Modal 3 para confirmação dos dados e forma de pagamento -->

    <!-- Fim Modal 3 para confirmação dos dados e forma de pagamento -->
    
    <!-- Script do Angular (Modal)  -->
    <script>
        // var app = angular.module('meuApp', []);
        // app.controller('Controlador', function($scope) {
        //     $scope.Adulto = false;
        //     $scope.Crianca = false;

        //     $scope.FuncaoA = function() {
        //         $scope.Adulto = !$scope.Adulto;
        //     }

        //     $scope.FuncaoC = function() {
        //         $scope.Crianca = !$scope.Crianca;
        //     }
        // });
    </script>
    <!-- Script JS para imagens -->
    <script>
        const imagensPequenas = document.querySelectorAll('.imagem-pequena');
        const imagemGrande = document.querySelector('.imagem-grande');

        imagensPequenas.forEach((imagemPequena) => {
            imagemPequena.addEventListener('click', () => {
                const novaSrc = imagemPequena.getAttribute('src');
                imagemGrande.setAttribute('src', novaSrc);
            });
        });

        function termos() { 
            let check = document.getElementById('termos');
            let btn = document.getElementById('reserva-btn');

            if (check.checked == true) {
                return btn.classList.remove("disabled");
            } else {
                return btn.classList.add("disabled");
            }
        }
        termos();
    </script>
</body>
</html>