<?php

require_once('twig_carregar.php');

require('inc/banco.php');
$data = $_GET['data'] ?? null;

if ($data == 'recente'){

    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data ASC');

    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('compromissos.html' , [
        'titulo' => 'compromissos',
        'compromissos' => $compromissos,
    ]);

} else if ($data == 'distante') {

    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data DESC');

    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('compromissos.html' , [
        'titulo' => 'compromissos',
        'compromissos' => $compromissos,
    ]);

} else if ($data == 'alfabeto'){

    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY titulo ASC');

    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('compromissos.html' , [
        'titulo' => 'compromissos',
        'compromissos' => $compromissos,
    ]);

} else {

    //busca as compras no banco
    $dados = $pdo->query('SELECT * FROM compromissos');

    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);
    
    echo $twig->render('compromissos.html' , [
        'titulo' => 'compromissos',
        'compromissos' => $compromissos,
    ]);

}