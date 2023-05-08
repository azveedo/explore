<?php

require_once '../model/conexao';
$pdo = new Conexao("dbTurism", "localhost", "root", "");
include('register.html');

    $nomeUs = addslashes($_POST['usuario']);
    $emailUs = addslashes($_POST['email']);
    $senhaUS = addslashes($_POST['senha']);
    $telefoneUs = addslashes($_POST['telefone']);
    $paisUS = addslashes($_POST['pais']);
    $estadoUs = addslashes($_POST['estado']);
    $cidadeUs = addslashes($_POST['cidade']);
    $bairroUS = addslashes($_POST['bairro']);
    $ruaUS = addslashes($_POST['rua']);
    $numeroUS = addslashes($_POST['numero']);
    var_dump($nomeUs, $emailUs, $senhaUS, $telefoneUs, $paisUS, $estadoUs, $cidadeUs, $bairroUS, $ruaUS, $numeroUS);


    //validação se há um email já existente no banco de dados e caso não tenha irá cadastrar o usuário
    $pdo -> validaEmail($nomeUs, $emailUs, $senhaUS, $telefoneUs, $paisUS, $estadoUs, $cidadeUs, $bairroUS, $ruaUS, $numeroUS);

?>