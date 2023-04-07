<header>
    <div class="sidebar shadow">
        <div class="logo-details">
            <img src="../images/logo/LOGO POUSADA POR EXTENSO.png" class="logo_name w-75" alt="">

            <i class='bx bx-menu' id="btn" ></i>
        </div>

        <ul class="nav-list">
            <li>
                <a href="../index.php" class="link">
                    <i class='bx bx-home' ></i>
                    <span class="links_name">Home</span>
                </a>

                <span class="tooltip">Home</span>
            </li>

            <li>
                <a href="index.php" class="link">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Geral</span>
                </a>

                <span class="tooltip">Geral</span>
            </li>

            <li>
                <a href="perfil.php" class="link">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Perfil</span>
                </a>

                <span class="tooltip">Perfil</span>
            </li>

            <li>
                <a href="reservas.php" class="link">
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">Reservas</span>
                </a>

                <span class="tooltip">Rerservas</span>
            </li>

            <li>
                <a href="configuracao.php" class="link">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Configurações</span>
                </a>
                
                <span class="tooltip">Configurações</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['nome'];?></div>
                        <div class="job">Seja Bem-Vindo</div>
                    </div>
                </div>

                <a href="logout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
            </li>
        </ul>
    </div>
</header>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange(); // Chamando a função (opcional)
    });

    searchBtn.addEventListener("click", ()=>{ // Barra lateral aberta quando você clica no ícone de pesquisa
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
