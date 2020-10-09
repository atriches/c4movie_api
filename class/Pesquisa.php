<?php
require_once 'c4MoviesClass.php';
require_once __DIR__."./../interface/theMovieDb.php";
class Pesquisa extends c4MoviesClass implements theMovieDb
{
    public  function __construct()
    {
      
        $this->categoria =  null;
        $this->tipo = 'search';
    }
    
    public  function listar($busca)
    {
        if(trim($busca =="")){
            throw new Exception('Informe o nome do filme para busca');
        }
        
        $stringPesquisa = str_replace("+"," ",$busca);
        $stringPesquisa = str_replace(" ","+",$stringPesquisa);
     
        return  parent::requisicao(0,$stringPesquisa);
    }
}
