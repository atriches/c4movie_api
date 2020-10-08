<?php
require_once 'c4MoviesClass.php';
class Pesquisa extends c4MoviesClass
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
        $stringPesquisa = str_replace(" ","+",$busca);
     
        return  parent::requisicao(null,$stringPesquisa);
    }
}
