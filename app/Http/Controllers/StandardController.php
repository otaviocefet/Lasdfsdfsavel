<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class StandardController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    
	protected $totalPorPagina = 10;

	/**
	*	Listagem dos Itens	
	*/
    public function index()
    {

        //Recupera todos os estilos musicais cadastrados
        $data = $this->model->paginate($this->totalPorPagina);

        return view("{$this->nameView}.index",compact('data'));
    }

    /**
	*	Exibe o formulário de cadastro	
	*/
    public function cad()
    {
    	return view("{$this->nameView}.cad-edit");
    }



    /**
	*	Faz o cadastro	
	*/
    public function cadGo()
    {
    	//Recupera os dados do formulário
        $dadosForm = $this->request->all();

        //Valida os dados
        $validator = validator($dadosForm, $this->model->rules);
        if ( $validator->fails() ) {
            return redirect($this->redirectCad)
            ->withErrors($validator)
            ->withInput();
        }
        
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

	/**
	*	Exibe o formulário de edição	
	*/
    public function edit($id)
    {

        //Recupera o item pelo seu id
        $data = $this->model->find($id);

        return view("{$this->nameView}.cad-edit", compact('data'));
    }

    /**
	*	Editando o item
	*/
    public function editGo($id)
    {

        //Recupera os dados do formulário em forma de array
        $dadosForm = $this->request->all();

        //Valida os dados antes de editar
        $validator = validator($dadosForm, $this->model->rules);
        if ( $validator->fails() ) {
            return redirect("{$this->redirectEdit}/$id")
            ->withErrors($validator)
            ->withInput();
        }

        //Recupera o item pelo seu id
        $item = $this->model->find($id);

        //Faz a edição do item
        $update = $item->update($dadosForm);


        //Verifica se editou com sucesso
        if( $update )
            return redirect($this->route);
        else
            return redirect("{$this->redirectEdit}/$id")
        ->withErrors(['errors' => 'Falha ao Editar'])
        ->withInput();

        
    }

    /**
	*	Deleta um registro
	*/
    public function delete($id)
    {
        //Recupera o item pelo seu id
        $item = $this->model->find($id);

        //Deleta o item
        $deleta = $item->delete();

        //Redireciona
        return redirect($this->route);
    }

    /**
	*	Faz a pesquisa
	*/
    public function pesquisar ()
    {
        //Recupera a palavra de pesquisa
        $palavraPesquisa = $this->request->get('pesquisar');

        //Filtra os dados de acordo com a palavra de pesquisa
        $data = $this->model->where("nome","LIKE","%$palavraPesquisa%")->paginate(10);

        //mostra a view
        return view("{$this->nameView}.index", compact('data'));
    }
}
