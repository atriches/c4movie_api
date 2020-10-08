<?php
require_once 'class/Upcoming.php';
require_once 'class/Popular.php';
require_once 'class/Genero.php';
require_once 'class/Filme.php';
require_once 'controller/c4MoviesController.php';


$c4MoviesController = new c4MoviesController;

header('Content-Type: application/json;charset=utf-8');
if (isset($_REQUEST)) {
    $c4MoviesController->inicializar($_REQUEST);
    $retorno = $c4MoviesController->getResposta();
    echo  json_encode(array('status' => $retorno['status'], 'resposta' => $retorno['resposta'])); 
    
} else {
    echo  json_encode(array('status' => 'erro', 'resposta' => 'a requisição não é valida'));
}
