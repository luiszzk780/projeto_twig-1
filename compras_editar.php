<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$id = $_GET['id'] ?? null;


echo $twig->render('compras_editar.html', [
    'id' => $id 
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    $item = $_POST['item'] ?? null; 

    if ($item) {
        $query = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');
        
        $query->execute([
            ':item' => $item,
            ':id' => $id
        ]);

        header('Location: compras.php');
    } 
}