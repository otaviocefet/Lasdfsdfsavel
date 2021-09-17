<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Controllers\StandardController;

use App\Models\Painel\Album;
use App\Models\Painel\Estilo;
class AlbumController extends StandardController
{
    protected $model;
    protected $nameView = 'painel.albuns';
    protected $redirectCad = '/painel/album/cadastrar';
    protected $redirectEdit = '/painel/album/editar';
    protected $route = '/painel/albuns';
    protected $request;

    public function __construct(Album $album, Request $request)
    {
        
        $this->model = $album;
        $this->request = $request;
    }

    /**
    *   Exibe o formulário de cadastro  
    */
    public function cad()
    {
        //Recupera os estilos musicais
        $estilos = Estilo::get();


        return view("{$this->nameView}.cad-edit",compact('estilos'));
    }

    /**
    *   Exibe o formulário de edição    
    */
    public function edit($id)
    {

        //Recupera os estilos musicais
        $estilos = Estilo::get();

        //Recupera o item pelo seu id
        $data = $this->model->find($id);

        return view("{$this->nameView}.cad-edit", compact('data','estilos'));
    }
}
