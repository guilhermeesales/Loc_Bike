<?php 
    session_start();
    session_destroy();
    header('Location: login.php');


    // Após sair do sistema atribui false ao login
    session_start();

    $_SESSION['login'] = false;
?>