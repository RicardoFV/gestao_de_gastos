<?php

// importando o use da rota
use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// rota geral do sistema
Route::group(['prefix' => 'api'], function () {
    // rota de login
    Route::group(['prefix' => 'auth'], function () { //usuarioLogado
        Route::post('login', 'Api\Auth\AuthController@login');
        Route::get('logado', 'Api\Auth\AuthController@usuarioLogado');

        // cadastra um novo usuario
        Route::group(['prefix' => 'novo_usuario'], function () {
            Route::post('cadastrar', 'Api\Admin\Usuario\UsuarioController@cadastrarUsuario');
        });
    });
    // acesso restrito
    Route::group(['middleware' => 'auth'], function () {

        // rota responsavel por cadastrar o usuario
        Route::group(['prefix' => 'usuario'], function () {
            Route::put('atualizar/{id}', 'Api\Admin\Usuario\UsuarioController@atualizarUsuario');
            Route::get('consultar/{id}', 'Api\Admin\Usuario\UsuarioController@consultar');
            Route::get('listar', 'Api\Admin\Usuario\UsuarioController@listar');
            Route::delete('deletar/{id}', 'Api\Admin\Usuario\UsuarioController@deletar');
        });

        // rota de tipo
        Route::group(['prefix' => 'tipo'], function () {
            Route::post('cadastrar', 'Api\Admin\Tipo\TipoController@cadastrar');
            Route::put('atualizar/{id}', 'Api\Admin\Tipo\TipoController@atualizar');
            Route::get('consultar/{id}', 'Api\Admin\Tipo\TipoController@consultar');
            Route::get('listar', 'Api\Admin\Tipo\TipoController@listar');
            Route::delete('deletar/{id}', 'Api\Adm\Tipo\TipoController@deletar');
        });

        // rota de subtipo
        Route::group(['prefix' => 'subtipo'], function () {
            Route::post('cadastrar', 'Api\Admin\Tipo\SubTipoController@cadastrar');
            Route::put('atualizar/{id}', 'Api\Admin\Tipo\SubTipoController@atualizar');
            Route::get('listar/{id}', 'Api\Admin\Tipo\SubTipoController@consultar');
            Route::get('listar', 'Api\Admin\Tipo\SubTipoController@listar');
            Route::delete('deletar/{id}', 'Api\Adm\Tipo\SubTipoController@deletar');
        });

         // rota de carteira de lançamentos
         Route::group(['prefix' => 'carteira'], function () {
            Route::post('cadastrar', 'Api\Admin\Carteira\CarteiraController@cadastrarCarteira');
            Route::put('atualizar/{id}', 'Api\Admin\Carteira\CarteiraController@atualizar');
            Route::get('listar/{id}', 'Api\Admin\Carteira\CarteiraController@consultar');
            Route::get('listar', 'Api\Admin\Carteira\CarteiraController@listar');
            Route::get('minhacarteira/{id}', 'Api\Admin\Carteira\CarteiraController@listarCarteiraPorUsuario');
            Route::delete('deletar/{id}', 'Api\Adm\Carteira\CarteiraController@deletar');
        });
    });
});
