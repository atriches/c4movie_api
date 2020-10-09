<?php
require_once 'c4MoviesClass.php';
require_once __DIR__."./../interface/theMovieDb.php";
class Popular extends c4MoviesClass implements theMovieDb
{
    public  function __construct()
    {
      
        $this->categoria =  'top_rated';
        $this->tipo = 'movie';
    }
    public  function listar($pagina)
    {
        return  parent::requisicao($pagina);

    }
}
