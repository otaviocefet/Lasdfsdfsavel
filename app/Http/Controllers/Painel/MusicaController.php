<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Controllers\StandardController;

use App\Models\Painel\Musica;

class MusicaController extends StandardController
{

    protected $model;
    protected $nameView = 'painel.musicas';
    protected $redirectCad = '/painel/musica/cadastrar';
    protected $redirectEdit = '/painel/musica/editar';
    protected $route = '/painel/musicas';
    protected $request;

    public function __construct(Musica $musica, Request $request)
    {
        
        $this->model = $musica;
        $this->request = $request;
    }

        /**
    *   Faz o cadastro  
    */
    public function cadGo()
    {
        //Recupera os dados do formulário
        $dadosForm = $this->request->all();
/*
        //Valida os dados
        $validator = validator($dadosForm, $this->model->rules);
        if ( $validator->fails() ) {
            return redirect($this->redirectCad)
            ->withErrors($validator)
            ->withInput();
        }
*/
        /**
        *  Upload do arquivo de música
        **/

        //Recupera o campo de upload
        $musica = $this->request->file('arquivo');


        //Define o caminho
        $path = storage_path('app/public/painel/musicas');

        //Define o nome da música
        $nameMusic = date('YmdHis').'.'.$musica->getClientOriginalExtension();
        $dadosForm['arquivo'] = $nameMusic;


        

        //Faz o upload da música
        $upload = $musica->move($path,$nameMusic);

        if( !$upload )
            return redirect($this->redirectCad)
                ->withErrors(['errors' => 'Falha ao fazer o upload']);
                

        /**
        *  Final do Upload do arquivo de música
        **/
        
        //Faz o insert
        $insert = $this->model->create($dadosForm);

        //Verifica se deu tudo certo
        if( $insert )
            return redirect($this->route);
        else
            return redirect($this->redirectCad)
        ->withErrors(['errors' => 'Falha ao Cadastrar'])
        ->withInput();

    }
}
