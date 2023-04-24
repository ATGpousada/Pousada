<?php 
// select para repetição de sub-imagens
$listaIMG = $connect->query("select * from imagens where quartos_ID = $id;");
$linhaIMG = $listaIMG->fetch_assoc();
$linhasIMG = $listaIMG->num_rows;

// select para repetição de sub-imagens no responsivo
$listaIMGres = $connect->query("select * from imagens where quartos_ID = $id;");
$linhaIMGres = $listaIMGres->fetch_assoc();
$linhasIMGres = $listaIMGres->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_BR" id="subir">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: #ebf4fa;" ng-app="meuApp" ng-controller="Controlador">

<main>

    <div id="geral_del" class="flex-sa" style="margin-top: 110px;">

        <span id="img_principal">
            <img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" class="imagem-grande">
        </span>

        <div id="esconder_imgs" class="sub-imgs">
        <?php do{?>
            <img src="<?php echo $linhaIMGres['IMAGEM_CAMINHO_2']?>" class="imagem-pequena">
        <?php }while($linhaIMGres = $listaIMGres->fetch_assoc());?>
        </div>

        <div class="text-detail">

            <p id="titulo" class="text-center">
                <?php echo $linha['QUARTO'];?>
            </p>

            <p class="preco" style="cursor: default;">
                R$&nbsp;<?php echo $linha['PRECO_DIARIA'];?>
            </p>

            <button id="reservar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                RESERVAR
            </button>
        </div>
    </div>

    <div id="sub-normal" class="sub-imgs">
    <?php do{?>
        <img src="<?php echo $linhaIMG['IMAGEM_CAMINHO_2']?>" class="imagem-pequena">
    <?php }while($linhaIMG = $listaIMG->fetch_assoc());?>
    </div>

    <hr class="linha_del">

    <div class="desc_del">
        <h4 class="text-center">Detalhes do Quarto</h4>
        <p> <?php echo $linha['DESCRICAO'];?></p>

        <p>
            Até <?php echo $linha['QTDE_PESSOAS'];?> pessoas!
        </p>
    </div>
</main> 

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                    
                        <?php if (isset($_SESSION['pousada'])){?>
                            <button type="button" class="btn btn-success">
                                    CONSULTAR
                            </button >
                        <?php }else if(!isset($_SESSION['pousada'])){?>
                            <button type="button" class="btn btn-success">
                                <a href="../client/login.php" class="text-decoration-none text-reset">
                                    CONSULTAR
                                </a>
                            </button >
                        <?php } ?>


                    
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



</body>
</html>