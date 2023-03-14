<?php 

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="carrosselPousada" class="carousel slide">
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
    <div class="carousel-item active">
      <img src="../images/banners/banner1.png" class="d-block w-100" alt="Banner 1">
      <div class="carousel-caption d-none d-md-block">
        <h3>First slide label</h3>
        <p>Quartos com suíte.</p>
      </div>
    </div>
  <!-- Fim Primeiro Item do Slide -->
  <!-- Início Segundo Item do Slide -->
    <div class="carousel-item">
      <img src="../images/banners/banner2.png" class="d-block w-100" alt="Banner 2">
      <div class="carousel-caption d-none d-md-block">
        <h3>First slide label</h3>
        <p>Anakin Skywalker.</p>
      </div>
    </div>
  <!-- Fim Segundo Item do Slide -->
  <!-- Início Terceiro Item do Slide -->
    <div class="carousel-item">
      <img src="../images/banners/banner3.png" class="d-block w-100" alt="Banner 3">
      <div class="carousel-caption d-none d-md-block">
        <h3>First slide label</h3>
        <p>Some representative placeholder content for the first slide.</p>
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