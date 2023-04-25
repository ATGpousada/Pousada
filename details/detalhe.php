<?php 
// select para repetição de sub-imagens
$listaIMG = $connect->query("select * from imagens where quartos_ID = $id;");
$linhaIMG = $listaIMG->fetch_assoc();
$linhasIMG = $listaIMG->num_rows;

// select para repetição de sub-imagens no responsivo
$listaIMGres = $connect->query("select * from imagens where quartos_ID = $id;");
$linhaIMGres = $listaIMGres->fetch_assoc();
$linhasIMGres = $listaIMGres->num_rows;


// Verifica se o usuário está logado
if (!isset($_SESSION['nome_da_sessao'])) {
    echo '<script>$("#btn-consultar").attr("href", "../client/login.php")</script>
';
}
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
    <div id="geral_del" class="flex-sa" style="margin-top: 190px;">

        <!-- Imagem Principal -->
        <span id="img_principal">
            <img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" class="imagem-grande">
        </span>
             
        <!-- Icons -->
        <span class="text-center" style="font-size: 40px; margin-top: 135px;">

            <div class="icons_del text-center">
                <i class="fa-solid fa-users"></i>
                <span class="texto_del"><?php echo $linha['QTDE_PESSOAS'];?></span>
            </div>

            <div class="icons_del text-center">
                <i class="fa-solid fa-car-side"></i>
                <span class="texto_del">1</span>
            </div>

            <div class="icons_del text-center">
                <i class="fa-solid fa-paw"></i>
                <span class="texto_del">✓</span>
            </div>

            <div class="icons_del text-center">
                <i class="fa-solid fa-mug-hot"></i>
                <span class="texto_del">✓</span>
            </div>
        </span>

        <!-- Sub-Imagens do Responsivo -->
        <div id="esconder_imgs" class="sub-imgs">
        <?php do{?>
            <img src="<?php echo $linhaIMGres['IMAGEM_CAMINHO_2']?>" class="imagem-pequena">
        <?php }while($linhaIMGres = $listaIMGres->fetch_assoc());?>
        </div>

        <!-- Titulo, preço do Quarto e Botão de Reserva -->
        <div class="text-detail">

            <p id="titulo" class="text-center"><?php echo $linha['QUARTO'];?></p>

            <p class="preco"> R$&nbsp;<?php echo str_replace('.', ',', $linha['PRECO_DIARIA']);?></p>

            <a class="botao_del" data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="vertical-align:middle">
                <span>
                    Reservar
                </span>
            </a>
        </div>
    </div>

    <!-- Sub-Imagens do Quarto (Normal) -->
    <div id="sub-normal" class="sub-imgs">
    <?php do{?>
        <img src="<?php echo $linhaIMG['IMAGEM_CAMINHO_2']?>" class="imagem-pequena">
    <?php }while($linhaIMG = $listaIMG->fetch_assoc());?>
    </div>

    <!-- Descrição do Quarto -->
    <div class="desc_del">

        <hr class="linha_del">
        <h2 class="text-center" style="font-weight: bold; margin-bottom:15px;">
            Detalhes do Quarto
        </h2>

        <p><?php echo $linha['DESCRICAO'];?></p>
    </div>
</main> 

<!-- Modal 1 -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: #d7e8f7;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">REGRAS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="regras">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae reiciendis quo voluptas delectus. Harum, necessitatibus ea voluptate doloremque reprehenderit illo aperiam, dolore impedit ducimus et, unde debitis tempore iste corrupti?</p>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">AVANÇAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2-->
<div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #d7e8f7;">
            <div class="modal-header" style="display: block !important;">
                <h4 class="modal-title text-center" id="staticBackdropLabel">
                    REALIZAR RESERVA
                </h4>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center" style="margin-top:30px;">

                    <span id="datas_modal" class="text-center" style="margin: 0 30px;" name="data_inicio">
                        <h4>DATA INICIO</h4>
                        <input type="date" name="data_inicio" id="data_inicio">
                    </span>

                    <span id="datas_modal" class="text-center" style="margin: 0 30px; margin-bottom: 40px;" name="data_final">
                        <h4>DATA FINAL</h4>
                        <input type="date" name="data_final" id="data_final">
                    </span>
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

                    <a href="" type="button" class="btn btn-success text-decoration-none text-reset" style="color: white !important;"id="btn-consultar">
                        CONSULTAR
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Script do Angular (Modal)  -->
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
</script>

</body>
</html>