<?php

//Gestão do Dashboard

Route::group(['prefix' => 'painel','middleware' => [],'web'], function($route){

	//Estilos Musicais
	$route->get('estilos','Painel\EstiloController@index');
	$route->get('estilo/cadastrar','Painel\EstiloController@cad');
	$route->post('estilo/cadastrar','Painel\EstiloController@cadGo');
	$route->get('estilo/editar/{id}','Painel\EstiloController@edit');
	$route->post('estilo/editar/{id}','Painel\EstiloController@editGo');
	$route->get('estilo/deletar/{id}','Painel\EstiloController@delete');
	$route->post('estilo/pesquisar','Painel\EstiloController@pesquisar');

	//Albuns 
	$route->get('albuns','Painel\AlbumController@index');
	$route->get('album/cadastrar','Painel\AlbumController@cad');
	$route->post('album/cadastrar','Painel\AlbumController@cadGo');
	$route->get('album/editar/{id}','Painel\AlbumController@edit');
	$route->post('album/editar/{id}','Painel\AlbumController@editGo');
	$route->get('album/deletar/{id}','Painel\AlbumController@delete');
	$route->post('album/pesquisar','Painel\AlbumController@pesquisar');

	//Músicas
	$route->get('musicas','Painel\MusicaController@index');
	$route->get('musica/cadastrar','Painel\MusicaController@cad');
	$route->post('musica/cadastrar','Painel\MusicaController@cadGo');
	$route->get('musica/editar/{id}','Painel\MusicaController@edit');
	$route->post('musica/editar/{id}','Painel\MusicaController@editGo');
	$route->get('musica/deletar/{id}','Painel\MusicaController@delete');
	$route->post('musica/pesquisar','Painel\MusicaController@pesquisar');

	//Rota inicial do Dashboard
	$route->get('','Painel\PainelController@index');
});

//Home Page do Laramusic
Route::get('/', 'Site\SiteController@index');
