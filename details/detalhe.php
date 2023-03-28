<?php ?>

<!DOCTYPE html>
<html lang="pt_BR" id="subir">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: #ebf4fa;" ng-app="meuApp" ng-controller="Controlador">

<a href ="#subir">
    <span class ="quadradinhodasetinha">
    <i class="bi bi-arrow-up"></i>
</span >
</a>

<main>

    <div id="geral_del" class="flex-sa" style="margin-top: 50px;">

        <span id="img_principal">
            <img src="../images/login.jpg" class="imagem-grande">
        </span>

        <div id="esconder_imgs" class="sub-imgs">
            <img src="../images/login.jpg" class="imagem-pequena">
            <img src="../images/Pagamento/Itau.png" class="imagem-pequena">
            <img src="../images/Pagamento/Mercado-Pago.png" class="imagem-pequena">
            <img src="../images/logo/LOGO POUSADA DO SOSSEGO.png" class="imagem-pequena">
        </div>

        <div class="text-detail">

            <p id="titulo" class="text-center">
                Quarto lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>

            <p class="preco" style="cursor: default;">
                R$ 999,99
            </p>

            <button id="reservar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                RESERVAR
            </button>
        </div>
    </div>

    <div id="sub-normal" class="sub-imgs">
        <img src="../images/login.jpg" class="imagem-pequena">
        <img src="../images/Pagamento/Itau.png" class="imagem-pequena">
        <img src="../images/Pagamento/Mercado-Pago.png" class="imagem-pequena">
        <img src="../images/logo/LOGO POUSADA DO SOSSEGO.png" class="imagem-pequena">
    </div>

    <hr class="linha_del">

    <div class="desc_del">
        <h4 class="text-center">Detalhes do Quarto</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aliquam fugiat exercitationem omnis veniam incidunt cum, voluptatibus, quo dolore, quidem ipsa laborum quis quia pariatur consequatur neque doloremque quam at?</p>
    </div>
</main> 

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #d7e8f7;">
            <div class="modal-header" style="display: block !important;">
                <h4 class="modal-title text-center" id="staticBackdropLabel">
                    REALIZAR RESERVA
                </h4>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center" style="margin-top:30px;">

                    <span id="datas_modal" class="text-center" style="margin: 0 30px;">
                        <h4>DATA INICIO</h4>
                        <input type="date" name="data_inicio" id="data_inicio">
                    </span>

                    <span id="datas_modal" class="text-center" style="margin: 0 30px; margin-bottom: 40px;">
                        <h4>DATA FINAL</h4>
                        <input type="date" name="data_final" id="data_final">
                    </span>
                </div>

                <hr>

                <div id="regras">
                    <h5 class="text-center">REGRAS</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae reiciendis quo voluptas delectus. Harum, necessitatibus ea voluptate doloremque reprehenderit illo aperiam, dolore impedit ducimus et, unde debitis tempore iste corrupti?</p>
                </div>

                <hr>

                <div class="d-flex justify-content-around" style="margin-bottom: 15px;">

                    <div style="width: 100%;">
                        <div class="btn-pessoas text-center" ng-click="FuncaoA()">
                            ADULTOS &nbsp;
                            <i class="fa-solid fa-caret-down fa-fade" id="seta" style="color: #fff; font-size:25px;"></i>
                        </div>

                        <div class="d-flex justify-content-center" ng-show="Adulto" id="reserva-pessoas">
                            <input type="number" class="text-center" name="number_adultos" id="number_adultos" min=0>
                        </div>
                    </div>
                    
                    <div style="width: 100%;">
                        <div class="btn-pessoas text-center" ng-click="FuncaoC()">
                            CRIANÇAS &nbsp;
                            <i class="fa-solid fa-caret-down fa-fade" id="seta" style="color: #fff; font-size:25px;"></i>
                        </div>

                        <div class="d-flex justify-content-center" ng-show="Crianca" id="reserva-pessoas">
                            <input type="number" class="text-center" name="number_criancas" id="number_criancas" min=0>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                    <button type="button" class="btn btn-success">CONSULTAR</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Script Provisório  -->
<script>
      var app = angular.module('meuApp', []);
      app.controller('Controlador', function($scope){
        $scope.Adulto = false;
        $scope.Crianca = false;

        $scope.FuncaoA = function(){
            $scope.Adulto = !$scope.Adulto;
        }

        $scope.FuncaoC = function(){
            $scope.Crianca = !$scope.Crianca;
        }
      });
</script>

<script>
      const imagensPequenas = document.querySelectorAll('.imagem-pequena');
      const imagemGrande = document.querySelector('.imagem-grande');

      imagensPequenas.forEach((imagemPequena) => {
        imagemPequena.addEventListener('click', () => {
          const novaSrc = imagemPequena.getAttribute('src');
          imagemGrande.setAttribute('src', novaSrc);
        });
      });
</script>

<!-- Scroll -->
<script>
window.scroll({
top:0,
behavior:'smooth'
})

</script>

</body>
</html>