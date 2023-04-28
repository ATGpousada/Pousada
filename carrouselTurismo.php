<?php ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <!-- Imagem Principal -->
        <div class="img-pontos">
        <img src="images/banners/Pontos_turisticos.jpg" class="img-ponto">


        <div class="subimg-turistico">
                <p class="img-turistico txt-1" id="images/banners/Ilha_grande.jpg">ILHA GRANDE</p>
                <p class="img-turistico txt-1" id="images/banners/Lagoa_azul.jpg">LAGOA AZUL</p>
                <p class="img-turistico txt-1" id="images/banners/Praia_de_mangaratiba.jpg">PRAIA MANGARATIBA</p>
                <p class="img-turistico txt-1" id="images/banners/Abraão.jpg">PRAIA ABRAÃO</p>
        </div>
    </div>
    
<!-- Script JS para imagens -->
<script>
      const textoImagem = document.querySelectorAll(".img-turistico")
      const imagemGrande = document.querySelector('.img-ponto');

      textoImagem.forEach((texto) => {
        texto.addEventListener('click', () => {
          const novaSrc = texto.getAttribute('id');
          imagemGrande.setAttribute('src', novaSrc);
        });
      });
</script>
</body>
</html>