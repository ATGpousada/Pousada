<?php ?>

<footer  class="bg-body-tertiary">

<div class="cor_footer p-4" style="background: #c2daf2;">
    <form id="form_oferta">
        <div class="flex">

            <div class="flex-end w25">
                <i class="fa-solid fa-square-envelope d-flex align-items-center" style="font-size: 60px;"></i>
                <span style="margin-left: 10px;">
                    <p class="text_fp">RECEBA NOSSAS OFERTAS</p>
                    <p class="text-center" style="font-weight: bold;">Cadastre seu email Já!</p>
                </span>
            </div>

            <div class="align-items-center flex-end w30">
                <input type="text" id="nome" class="form-control input_oferta"  placeholder="Nome" required>
            </div>

            <div class="align-items-center flex-end w30">
                <input type="email" id="email" class="form-control input_oferta" placeholder="Email" required>
            </div>

            <div class="d-flex align-items-center justify-content-center w15">
                <button type="submit" value="Enviar" id="botao_oferta" class="btn btn-primary p-2 botao_form" style="font-weight: bold; font-size: 20px;">Enviar</button>
            </div>
        </div>
    </form>
</div>


<section class="flex-sa pt-3" style="width: 90%; margin: 0 auto;">

        <div class="logo_div">
            <img src="images/logo/LOGO POUSADA DO SOSSEGO.png" alt="Logo da pousada" class="logo_footer">
        </div>

        <article id="Bloco-1" class="flex-between w25 text-center">

            <div id="mapa" class="p-3">
                <span class="map_text">
                    MAPA DO SITE
                    <hr class="mb-3 map_linha">
                </span>

                <div>
                    <div class="mb-1">
                        <a href="index.php" class="map_link">HOME</a>
                    </div>

                    <div class="mb-1">
                        <a href="product/index.php" class="map_link">SERVIÇOS</a>
                    </div>

                    <div class="mb-1">
                        <a href="about/index.php" class="map_link">SOBRE NÓS</a>
                    </div>

                    <div>
                        <a href="contact/index.php" class="map_link">CONTATO</a>
                    </div>

                </div>
            </div>

            <div id="telefone" class="p-3">

                <span class="map_text">
                    TELEFONE
                    <hr class="mb-3 map_linha">
                </span>

                <div class="mb-1 text-center">
                    <span class="map_contato">(21) 4002-8922</span>
                </div>

                <div class="mb-1 text-center">
                    <span class="map_contato">(21) 7070-8580</span>
                </div>
            </div>
        </article>


        <article id="Bloco-2" class="flex-between w45 text-center"> 

            <div id="endereco" class="p-3">
                <span class="map_text">
                    ENDEREÇO
                    <hr class="mb-3 map_linha">
                </span>

                <div class="mb-1 text-center">
                    <span class="map_contato">Rua José Batista Maia n°3 - Conceição de Jacareí, RJ</span>
                </div>
            </div>

        
            <div id="pagamento" class="p-3">

                <span class="map_text">
                    FORMAS DE PAGAMENTO
                    <hr class="mb-3 map_linha">
                </span>

                <span class="img-bancos">
                    <img src="images/Pagamento/Banco-do-Brasil.png" alt="Banco do Brasil" class="img_pag">
                    <img src="images/Pagamento/bradesco.svg" alt="Banco Bradesco" class="img_pag">
                    <img src="images/Pagamento/caixa-logo.svg" alt="Banco Caixa" class="img_pag">
                    <img src="images/Pagamento/Itau.png" alt="Banco Itau" class="img_pag"> <br>
                    <img src="images/Pagamento/Mercado-Pago.png" alt="Mercado Pago" class="img_pag">
                    <img src="images/Pagamento/Paypal.png" alt="Paypal" class="img_pag">
                    <img src="images/Pagamento/pix.png" alt="PIX" class="img_pag">
                </span>
            </div>
        </article>
</section>

<!-- Início do Scroll -->
<a href ="#subir">
    <span class ="quadradinhodasetinha">
        <i class="bi bi-arrow-up"></i>
    </span >
</a>
<!-- Fim do Scroll -->
    
<div class="dropdownn">
    <button class="redes">
        <i class="fa-solid fa-mobile-screen"></i>
     </button>
    <div class="drop_link">
        <a href="#"><img src="images/instagram.svg" alt="" style="width: 70px;"></a>
        <a href="#"><i class="fa-brands fa-square-facebook img_redes" style="font-size: 70px; color: blue;"></i></a>
        <a href="#"><img src="images/whatsapp.svg" alt="" style="width: 70px;"></i></a>
    </div>
</div>

    <div class="text-center" id="copy">
        &copy; Todos os Direitos Reservados á Pousada do Sossego - 2023
    </div>
</footer>
