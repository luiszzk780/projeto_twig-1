<?php 


//carrega o carregador do twig
require_once('twig_carregar.php');

//mostra o template na tela
echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
]);

