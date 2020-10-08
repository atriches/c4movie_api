<?php
require_once 'c4MoviesClass.php';
class Upcoming extends c4MoviesClass
{
    public  function __construct()
    {

        $this->categoria =  'upcoming';
        $this->tipo = 'movie';
    }
    public  function listar($pagina)
    {
        return  parent::requisicao($pagina);
    }

}
