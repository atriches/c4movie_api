<?php
require_once 'c4MoviesClass.php';
require_once 'Pesquisa.php';
require_once __DIR__ . "./../interface/theMovieDb.php";
class Relacionado extends c4MoviesClass implements theMovieDb
{
    public  function __construct()
    {

        $this->categoria =  null;
        $this->tipo = 'similar';
    }
    /**
     * busca de filmes relacionados a um titulo
     *
     * @param [type] $busca
     * @return void
     */
    public  function listar($busca)
    {

        if (trim($busca == "")) {
            throw new Exception('Informe o nome do filme para busca');
        }


        $stringPesquisa = str_replace("+", " ", $busca);
        $stringPesquisa = str_replace(" ", "+", $stringPesquisa);

        //pega o id do filme pelo nome de busca
        $ojbPesquisa = new Pesquisa;

        $dados[] = $ojbPesquisa->requisicao(0, $stringPesquisa);
        $idFilme =  $dados[0]->results[0]->id;

        if (intval($idFilme) <= 0) {
            throw new Exception('Não foi possivel recuperar o id do filme');
        }
        //pega o total de paginas na primeira requisição e busca as demais
        for ($i = 2; $i <= intval($dados[0]->total_pages); $i++) {

            $dados[] = parent::requisicao($i, "", intval($idFilme));
        }

        return $dados;
        // return parent::requisicao(1, "", intval($dados->results[0]->id));
    }
}
