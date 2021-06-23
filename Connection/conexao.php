<?php 
    $servidor = 'mysql:dbname=loc_bike;host=localhost';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO($servidor, $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec('SET CHARACTER SET utf8');

    } catch(PDOException $error) {
        echo 'Mensagem: '. $error;

    }
?>