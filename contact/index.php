<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Pousada - Contato</title>
</head>
<body class="fundofixo" style="padding-top: 6.5em !important;" onbeforeunload="contactResponsivo();">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Adição do cabeçalho -->
    <?php include '../cabecalhoGeral/cabecalhoGeral.php'; ?>
    
    <!-- Início do conteúdo principal -->
    <div class="container mb-3 bg-body-tertiary rounded p-4">
        <div class="row mb-5">
            <!-- Começo contato -->
            <h1 class="text-center text-uppercase">Contato</h1>

            <hr>

            <!-- Começo fale conosco -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Fale conosco</h2>

                <form action="contatoEnvia.php" method="post">
                    <!-- Nome input -->
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Nome:</span>
                        
                        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" aria-label="nome" aria-describedby="basic-addon1">
                    </div>

                    <!-- Email input  -->
                    <div class="input-group mb-4">
                        <input type="text" name="email" class="form-control" placeholder="Digite seu email" aria-label="email" aria-describedby="basic-addon2">
                        
                        <span class="input-group-text" id="basic-addon2">@exemplo.com</span>
                    </div>

                    <!-- Assunto input  -->
                    <div class="input-group mb-4">                     
                        <span class="input-group-text">Assunto:</span>
                        
                        <input type="text" name="assunto" class="form-control" placeholder="Digite o assunto" aria-label="Assunto">
                    </div>

                    <!-- Comentário input -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">Comentário:</span>
                    
                        <textarea class="form-control" name="comentario" aria-label="Comentário" placeholder="Digite seu comentário"></textarea>
                    </div>

                    <!-- Button submit -->
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary ps-5 pe-5"><i class="fa-solid fa-paper-plane"></i>&nbsp;Enviar</button>
                    </div>
                </form>
            </div>
            <!-- Fim fale conosco -->

            <hr id="separador-responsive">

            <!-- Começo localização -->
            <div id="localizacao-area" class="col-md-6">
                <h2 class="text-center mb-4">Localização</h2>

                <!-- Rua list -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item rounded"><i class="fa-solid fa-location-dot"></i>&nbsp;Rua José Batista Maia no. 3 - Conceição de Jacareí, RJ, 23885-000</li>
                </ul>
                
                <!-- Maps -->
                <div class="d-flex justify-content-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14687.362106785902!2d-44.16917470373536!3d-23.029626895147487!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9c438e8edb483d%3A0x8e9481f17412dc06!2sPousada%20do%20Sossego%20Jacare%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1679196047639!5m2!1spt-BR!2sbr" width="100%" height="265" class="shadow-sm mt-2 p-2 bg-body rounded" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- Fim localização -->
        </div>
        <!-- Começo contato -->

        <hr>
    
        <!-- Começo perguntas frequentes -->
        <div class="row mt-5">
            <h2 class="text-center mb-4">Perguntas Frequentes</h2>
            
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <!-- Primeira pergunta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            A pousada oferece café da manhã?
                        </button>
                    </h2>

                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <strong>Sim, oferecemos café da manhã incluso na diária. Ele é servido das 7h às 10h e inclui diversas opções de pães, bolos, frutas, sucos e café.</strong>
                        </div>
                    </div>
                </div>

                <!-- Segunda pergunta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            A pousada oferece estacionamento para os hóspedes?
                        </button>
                    </h2>

                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <strong> Sim, dispomos de estacionamento próprio e gratuito para os nossos hóspedes. O estacionamento é seguro e monitorado por câmeras de segurança.</strong>
                        </div>
                    </div>
                </div>

                <!-- Terceira pergunta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            A pousada aceita animais de estimação?
                        </button>
                    </h2>

                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong>Sim, nós aceitamos animais de estimação em nossa pousada, mediante algumas condições específicas, tais como o porte e o comportamento do animal, além de uma taxa adicional de limpeza. Por favor, entre em contato conosco com antecedência para que possamos avaliar a possibilidade de receber seu animalzinho de estimação e orientá-lo sobre as condições para hospedagem.</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim perguntas frequentes -->
    </div>
    <!-- Fim do conteúdo principal -->

    <!-- Adição do rodapé -->
    <?php include '../rodapeGeral/rodapeGeral.php'; ?>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>