<?php
class c4MoviesClass
{

    protected $apikey = '751eeee6b01c2ff7f9b940012e11e751';
    protected $language = 'en-US';
    protected $include_adult = false;
    protected $sortBy = 'popularity.desc';
    protected $include_video = false;
    public $themovieMoviesDbUrl = 'https://api.themoviedb.org/3/movie/';
    public $themovieSearchDbUrl = 'https://api.themoviedb.org/3/search/movie';
    public $themovieGenresDbUrl = 'https://api.themoviedb.org/3/genre/movie/list';
    protected $tipo;
    protected $categoria;

    public function __construct()
    {
    }
    /**
     * função de requisição base do sistema
     *
     * @param integer $pagina
     * @param string $busca
     * @param integer $idFilme
     * @return void
     */
    public function requisicao(int $pagina, string $busca = null, int $idFilme = null)
    {



        switch ($this->tipo) {
            case 'movie':

                if (intval($pagina) <= 0) {
                    throw new Exception('Pagina não pode ser menor que 1');
                }

                $curl = curl_init($this->themovieMoviesDbUrl .
                    $this->categoria .
                    "?api_key=" . $this->apikey .
                    "&language=" . $this->language .
                    "&sort_by=" . $this->sortBy .
                    "&include_adult=" . $this->include_adult .
                    "&include_video=" . $this->include_video .
                    "&page=" . $pagina);

                break;
            case 'genre':

                $curl = curl_init($this->themovieGenresDbUrl .
                    "?api_key=" . $this->apikey);

                break;
            case 'search':

                $curl = curl_init($this->themovieSearchDbUrl .
                    "?api_key=" . $this->apikey .
                    "&query=" . $busca);

                break;

            case 'similar':

                $curl = curl_init($this->themovieMoviesDbUrl .
                    $idFilme .
                    "/" . $this->tipo .
                    "?api_key=" . $this->apikey .
                    "&language=" . $this->language .
                    "&page=" . $pagina);

                break;
            default:
                throw new Exception('Tipo de requisição inválida.(tipos válidos: upcoming, popular , genero, pesquisa e relacionado)');
        }



/*
        if ($this->tipo == 'movie') {

            if (intval($pagina) <= 0) {
                throw new Exception('Pagina não pode ser menor que 1');
            }

            $curl = curl_init($this->themovieMoviesDbUrl .
                $this->categoria .
                "?api_key=" . $this->apikey .
                "&language=" . $this->language .
                "&sort_by=" . $this->sortBy .
                "&include_adult=" . $this->include_adult .
                "&include_video=" . $this->include_video .
                "&page=" . $pagina);
        } else if ($this->tipo == 'genre') {
            $curl = curl_init($this->themovieGenresDbUrl .
                "?api_key=" . $this->apikey);
        } else if ($this->tipo == 'search') {
            $curl = curl_init($this->themovieSearchDbUrl .
                "?api_key=" . $this->apikey .
                "&query=" . $busca);
        } else if ($this->tipo == 'similar') {
            $curl = curl_init($this->themovieMoviesDbUrl .
                $idFilme .
                "/" . $this->tipo .
                "?api_key=" . $this->apikey .
                "&language=" . $this->language .
                "&page=" . $pagina);
        } else {
            throw new Exception('Tipo de requisição inválida.(tipos válidos: upcoming, popular , genero, pesquisa e relacionado)');
        }
*/
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=utf-8'
        ]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return $response;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}
