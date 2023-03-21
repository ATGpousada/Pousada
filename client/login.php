<?php ?>

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
    <title>Login</title>
</head>
<body class="body_login">

    <div class="container_login">
        <h2> Login</h2>
        <form>
            <div class="form-control">
                <input type="text" required/>
                <label>Email:</label>
            </div>

            <div class="form-control">
                 <input type="password" required/>
                    <label>Senha:</label>
            </div>

            <button class="btn_login">Login</button>
                <p class="text"> Vai Brasil  <a href="#">Registrar</a></p>
           
        </form>
    </div>
 
<!--------------------- javaScript  ---------------------->
<script>
    const labels = document.querySelectorAll(".form-control label");
labels.forEach((label) => {
    label.innerHTML = label.innerHTML
    .split("")
    .map(
        (letter,idx) =>
        `<span style="transtiton-delay:$(idx * 50)}ms">${letter}</span>`
    )
    .join("");
});
</script>

    
</body>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>