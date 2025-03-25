<?php

require('twig_carregar.php');

use Carbon\Carbon;

$horarioHoje = Carbon::now();
$horarioAmanha = Carbon::now()->addDay();

echo $twig->render('horarios.html',[ 
    'titulo' => 'Horários' ,
    'horarioHoje' => $horarioHoje,
    'horarioAmanha' =>$horarioAmanha
]);
