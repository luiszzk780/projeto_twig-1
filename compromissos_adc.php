<?php

require('inc/banco.php');

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if($titulo){
    //prepara a consulta
    $query = $pdo->prepare('INSERT INTO compromissos (titulo, data) VALUES (:titulo, :data)');

    //executa a consulta
    $query->execute([
        ':titulo' => $titulo,
        ':data' => $data
    ]);
}

header('location:compromissos.php');