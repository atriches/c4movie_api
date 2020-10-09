<?php

class c4MoviesController
{

    private $resposta;
    private $status;

    public function __construct()
    {
    }

    public function setResposta($status, $resesposta)
    {
        $this->status = $status;
        $this->resposta = $resesposta;
    }
    public function getResposta()
    {
        return  array('status' => $this->status, 'resposta' => $this->resposta);
    }

    public function inicializar($request)
    {
        $url = explode('/', $request['url']);

        //categoria do filme
        $categoria = ucfirst($url[0]);

        //apagando primeira posição
        array_shift($url);

        //ação
        //se tiver vazio mostra os primeiros
        $acao = $url[0];

        //apagando primeira posição
        array_shift($url);

        $parametros = array();
        $parametros = $url;

        //die(var_dump($parametros));

        //testanto se a classe existe
        try {
            if (class_exists($categoria)) {
                //testando se o metodo existe
                if (method_exists($categoria, $acao)) {

                    $retorno = call_user_func_array(array(new $categoria, $acao),$parametros);
                    //$this->setResposta(json_encode(array('status' => 'sucesso', 'resposta' => $retorno)));
                    $this->setResposta('sucesso', $retorno);
                } else {
                    // $this->setResposta(json_encode(array('status' => 'erro', 'resposta' =>  $acao . " não é um filtro valido.")));
                    $this->setResposta('erro', $acao . " não é um filtro valido.");
                }
            } else {
                //$this->setResposta(json_encode(array('status' => 'erro', 'resposta' => $categoria . " não é uma pesquisa valida.")));
                $this->setResposta('erro', $categoria . " não é uma pesquisa valida.");
            }
        } catch (Exception $e) {
            //$this->setResposta(json_encode(array('status' => 'erro', 'resposta' => $e->getMessage())));
            $this->setResposta('erro', $e->getMessage());
        }
    }
}
