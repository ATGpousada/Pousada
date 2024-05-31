<!-- Cabecalho da aréa do cliente -->
<header>
    <!-- Cabecalho -->
    <div class="sidebar shadow">
        <!-- Logo da pousada  -->
        <div class="logo-details">
            <!-- Imagem - Logo  -->
            <img src="../images/logo/LOGO POUSADA POR EXTENSO.png" class="logo_name w-75" alt="Logo da pousada">
            
            <!-- Icone - burguer para abrir e fechar o cabecalho -->
            <i class='bx bx-menu' id="btn" ></i>
        </div>

        <!-- Começo lista do menu -->
        <ul class="nav-list">
            <!-- Link para o index.php principal do projeto -->
            <li>
                <!-- Link -->
                <a href="../index.php" class="link">
                    <i class='bx bx-home' ></i>
                    <span class="links_name">Home</span>
                </a>

                <!-- Tooltip -->
                <span class="tooltip">Home</span>
            </li>


            <!-- Link para a página principal do cliente -->
            <li>
                <!-- Link -->
                <a href="index.php" class="link">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Geral</span>
                </a>

                <!-- Tooltip -->
                <span class="tooltip">Geral</span>
            </li>


            <!-- Link para a página perfil do cliente -->
            <li>
                <!-- Link -->
                <a href="perfil.php" class="link">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Perfil</span>
                </a>

                <!-- Tooltip -->
                <span class="tooltip">Perfil</span>
            </li>


            <!-- Link para página de reservas do cliente -->
            <li>
                <!-- Link -->
                <a href="reservas.php" class="link">
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">Reservas</span>
                </a>

                <!-- Tooltip -->
                <span class="tooltip">Reservas</span>
            </li>


            <!-- Link para a página de configuração do cliente -->
            <li>
                <!-- Link -->
                <a href="configuracao.php" class="link">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Configurações</span>
                </a>
                
                <!-- Tooltip -->
                <span class="tooltip">Configurações</span>
            </li>

            <!-- Item final para mostrar o nome do cliente cadastrado e para fazer logout -->
            <li class="profile">
                <!-- Nome Cliente cadastrado -->
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['nome'];?></div>
                        <div class="job">Seja Bem-Vindo</div>
                    </div>
                </div>

                <!-- Link para o logout -->
                <a href="logout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
            </li>
        </ul>
    </div>
</header>

<!-- Script JS do cabecalho do cliente -->
<script>
    // Cabeçalho
    let sidebar = document.querySelector(".sidebar");
    // Botão para fechar e abrir cabeçalho - burguer
    let closeBtn = document.querySelector("#btn");

    // Função abrir e fechar lateral do cabeçalho
    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange(); // Chamando a função (opcional)
    });

    // A seguir estão os códigos para alterar o botão da barra lateral (opcional)
    function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); // Substituindo a classe dos ícones
        }else {
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu"); // Substituindo a classe dos ícones
        }
    }
</script>
