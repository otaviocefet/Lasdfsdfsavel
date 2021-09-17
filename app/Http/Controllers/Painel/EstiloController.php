<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Controllers\StandardController;

use App\Models\Painel\Estilo;

class EstiloController extends StandardController
{

    protected $model;
    protected $nameView = 'painel.estilos';
    protected $redirectCad = '/painel/estilo/cadastrar';
    protected $redirectEdit = '/painel/estilo/editar';
    protected $route = '/painel/estilos';
    protected $request;

    public function __construct(Estilo $estilo, Request $request)
    {
        
        $this->model = $estilo;
        $this->request = $request;
    }
}
