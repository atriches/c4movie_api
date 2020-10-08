<?php
require_once 'c4MoviesClass.php';
class Popular extends c4MoviesClass
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
