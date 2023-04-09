<?php 

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="carrosselPousada" class="carousel slide" data-bs-ride="carousel">
  <!-- Início Indicadores Carrossel -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carrosselPousada" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Banner 1"></button>
    <button type="button" data-bs-target="#carrosselPousada" data-bs-slide-to="1" aria-label="Banner 2"></button>
    <button type="button" data-bs-target="#carrosselPousada" data-bs-slide-to="2" aria-label="Banner 3"></button>
  </div>
  <!-- Fim Indicadores Carrossel -->
  <!-- Início itens do Carrossel -->
  <div class="carousel-inner">
  <!-- Início Primeiro Item do Slide -->
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="../images/banners/Cafe.jpg" class="d-block w-100" alt="Banner 1">
      <div class="carousel-caption d-none d-md-block">
        <h3>CAFÉ DA MANHÃ</h3>
        <p>Café da manhã incluso em todos os quartos da pousada.</p>
      </div>
    </div>
  <!-- Fim Primeiro Item do Slide -->
  <!-- Início Segundo Item do Slide -->
    <div class="carousel-item" data-bs-interval="5000">
      <img src="../images/banners/Area_de_lazer.jpg" class="d-block w-100" alt="Banner 2">
      <div class="carousel-caption d-none d-md-block">
        <h3>ÁREA DE LAZER</h3>
        <p>Área de lazer mais aconchegante e sossegante que se pode imaginar.</p>
      </div>
    </div>
  <!-- Fim Segundo Item do Slide -->
  <!-- Início Terceiro Item do Slide -->
    <div class="carousel-item" data-bs-interval="5000">
      <img src="../images/banners/Area_brinquedo.jpg" class="d-block w-100" alt="Banner 3">
      <div class="carousel-caption d-none d-md-block">
        <h3>PLAYGROUND INFANTIL</h3>
        <p>A pousada do sossego fornece diversão para todos.</p>
      </div>
    </div>
  <!-- Fim Terceiro Item do Slide -->
  </div>
  <!-- Início Controladores Banner Carrossel-->
  <!-- Início Próximo -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carrosselPousada" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
  <!-- Fim Próximo -->
  <!-- Início Anterior -->
  <button class="carousel-control-next" type="button" data-bs-target="#carrosselPousada" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <!-- Fim Anterior -->
  <!-- Fim Controladores Banner Carrossel -->
</div>
</body>
</html>

<!-- classe d-block e w100 para evitar alinhamento padrão dos navegadores nos itens do carrossel -->