<?php
class Filme
{
    public  function __construct()
    {
    }
    public static  function listar($parametro)
    {
        
        if (intval($parametro) <= 0) {
            //throw new Exception('Paginação Inválida.');
            $parametro = 1;
        }
        //pegar a api_key da aplicação
        //fazer o request na api do moviesdb
        //sort by vai trazer os mais populares
        $url = 'https://api.themoviedb.org/3/movie/popular?api_key=751eeee6b01c2ff7f9b940012e11e751&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=' . $parametro;
        $dados =  json_decode(file_get_contents($url));

        //var_dump($dados);
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($dados->results);
    }
}
