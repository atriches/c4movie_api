<?php
class c4MoviesClass
{

    protected $apikey = '751eeee6b01c2ff7f9b940012e11e751';
    protected $language = 'en-US';
    protected $include_adult = false;
    protected $sortBy = 'popularity.desc';
    protected $include_video = false;
    public $themovieMoviesDbUrl = 'https://api.themoviedb.org/3/movie/';
    public $themovieGenresDbUrl = 'https://api.themoviedb.org/3/genre/movie/list';
    protected $tipo;
    protected $categoria;

    public function __construct()
    {
    }

    public function requisicao($pagina)
    {
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
            $curl = curl_init($this->themovieGenresDbUrl . "?api_key=" . $this->apikey);
        } else {
            throw new Exception('Tipo de requisição inválida(tipos válidos: movie , genre)');
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=utf-8'
        ]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return $response;
    }

  
}
