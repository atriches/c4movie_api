<?php
require_once 'c4MoviesClass.php';
require_once 'Pesquisa.php';
class Relacionado extends c4MoviesClass
{
    public  function __construct()
    {

        $this->categoria =  null;
        $this->tipo = 'similar';
    }
    public  function listar($busca)
    {
        if (trim($busca == "")) {
            throw new Exception('Informe o nome do filme para busca');
        }


        $stringPesquisa = str_replace("+", " ", $busca);
        $stringPesquisa = str_replace(" ", "+", $stringPesquisa);

        //pega o id do filme pelo nome de busca
        $ojbPesquisa = new Pesquisa;
        $dados = $ojbPesquisa->requisicao(0, $stringPesquisa);

        if (intval($dados->results[0]->id) <= 0) {
            throw new Exception('Não foi possivel recuperar o id do filme');
        }

        return parent::requisicao(1, "", intval($dados->results[0]->id));
    }
}
