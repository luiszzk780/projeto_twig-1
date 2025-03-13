<?php

//carrega o carregador do composer
require_once('vendor/autoload.php');

//loader é quem carrega os arquivos HTML
$loader = new \Twig\Loader\FilesystemLoader('./templates');

//cirar objeto do twig
$twig = new \Twig\Environment($loader);