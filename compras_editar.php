<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$id = $_GET['id'] ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'GET' && $id) {
    $id = $_GET['id'] ?? null; 

    if ($id) {
        $item = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
        $item->execute([':id'=>$id]);
        $dados = $item->fetch();
        echo $twig->render('compras_editar.html', [
            'titulo' => 'compras',
            'dados' => $dados,
        ]);
    } 
} else{
    $edit = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');
    $edit->execute([
        ':item' => $_POST['item'],
        ':id' => $_POST['id']
    ]);
    header('Location:compras.php');
}