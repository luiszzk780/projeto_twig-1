<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$id = $_GET['id'] ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'GET' && $id) {
    $id = $_GET['id'] ?? null; 

    if ($id) {
        $compromisso = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
        $compromisso->execute([':id'=>$id]);
        $dados = $compromisso->fetch();
        echo $twig->render('compromissos_editar.html', [
            'titulo' => 'Editar compromisso',
            'dados' => $dados,
        ]);
    } 
} else{
    $edit = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, data = :date WHERE id = :id');
    $edit->execute([
        ':titulo' => $_POST['titulo'],
        ':date' => $_POST['date'],
        ':id' => $_POST['id']
    ]);
    header('Location:compromissos.php');
}