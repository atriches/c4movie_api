<?php

require_once 'c4MoviesClass.php';
require_once __DIR__."./../interface/theMovieDb.php";
class Genero extends c4MoviesClass implements theMovieDb
{
    public  function __construct()
    {

        $this->categoria =  '';
        $this->tipo = 'genre';
    }
    public  function listar($id)
    {

        $dados = parent::requisicao(intval($id));
        $result = null;
        if (isset($id) and $id != "" and intval($id) > 0) {

            foreach ($dados->genres as $key => $genre) {

                if (intval($genre->id) == intval($id)) {
                    $result = $genre;
                }
            }
            if(is_null($result)){
                 throw new Exception('Genero inexistente');
            }
        } else {
            $result = $dados;
        }


        return $result;
    }

}
