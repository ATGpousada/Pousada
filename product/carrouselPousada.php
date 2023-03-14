<?php 

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="carouselExample" class="carousel slide m20">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/banners/banner1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/banners/banner2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/banners/banner3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</body>
</html>

<!-- classe d-block e w100 para evitar alinhamento padrão dos navegadores nos itens do carrossel -->