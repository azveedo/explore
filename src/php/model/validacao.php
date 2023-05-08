<?php

    require_once './conexao.php';
    $pdo = new Conexao("dbTurism", "localhost", "root", "");
    include ('login.html');

    $emailUs = addslashes($_POST['usuario']);
    $senhaUS = addslashes($_POST['senha']);

    

    if($pdo->logarUser($emailUs, $senhaUS))
    {
        header("location:register.html");
    }
    else
    {
        echo "<script>alert('Email ou senha incorretos')</script>";
    }

?>