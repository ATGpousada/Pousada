<?php ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: #ebf4fa;">
<main class="container-fluid">

    <div class="flex-sa" style="margin-top: 50px;">

        <span id="img_principal">
            <img src="../images/login.jpg" class="imagem-grande">
        </span>

        <div class="text-detail">

            <p id="titulo" class="btn btn-primary active">
                QUARTO Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>

            <p class="btn btn-primary active" style="cursor: default;">
                R$ ###,##
            </p>

            <span id="comprar" class="btn btn-success">
                COMPRAR
            </span>
        </div>
    </div>

    <div class="sub-imgs">
        <img src="../images/login.jpg" class="imagem-pequena">
        <img src="../images/Pagamento/Itau.png" class="imagem-pequena">
        <img src="../images/Pagamento/Mercado-Pago.png" class="imagem-pequena">
        <img src="../images/logo/LOGO POUSADA DO SOSSEGO.png" class="imagem-pequena">
    </div>

</main> 

<!-- Script Provisório  -->
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