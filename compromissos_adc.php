<?php

require('inc/banco.php');

$titulo = $_POST['titulo'] ?? null;
$date = $_POST['date'] ?? null;

if($titulo && $date){
    $query = $pdo->prepare('INSERT INTO compromissos(titulo, data) VALUES (:titulo, :date)');

    $query->execute([
        ':titulo'=> $titulo,
        ':date' => $date
    ]);
}

header('location:compromissos.php');