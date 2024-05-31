<?php
    session_start(); 
    // mensagem de erro atribuida a variável reserva
    $_SESSION['reserva'] = '
        <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
            <div class="d-flex">
                <div class="toast-body">
                    Faça seu login ou cadastra-se no nosso site para realizar um pedido de reserva!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    '; 

    header('location: ../client/login.php')
?>