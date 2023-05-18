<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/categoria', 'CategoriaController@index');
$router->get('/categoria/{id}', 'CategoriaController@show');
$router->post('/categoria/create', 'CategoriaController@store');
$router->post('/categoria/update/{id}', 'CategoriaController@update');
$router->delete('/categoria/delete/{id}', 'CategoriaController@destroy');

$router->get('/tipo', 'TipoController@index');
$router->get('/tipo/{id}', 'TipoController@show');
$router->post('/tipo/create', 'TipoController@store');
$router->post('/tipo/update/{id}', 'TipoController@update');
$router->delete('/tipo/delete/{id}', 'TipoController@destroy');

$router->get('/descuento', 'DescuentoController@index');
$router->get('/descuento/{id}', 'DescuentoController@show');
$router->post('/descuento/create', 'DescuentoController@store');
$router->post('/descuento/update/{id}', 'DescuentoController@update');
$router->delete('/descuento/delete/{id}', 'DescuentoController@destroy');

$router->get('/subproducto', 'SubproductoController@index');
$router->get('/subproducto/{id}', 'SubproductoController@show');
$router->post('/subproducto/create', 'SubproductoController@store');
$router->post('/subproducto/update/{id}', 'SubproductoController@update');
$router->delete('/subproducto/delete/{id}', 'SubproductoController@destroy');

$router->get('/producto', 'ProductoController@index');
$router->get('/producto/{id}', 'ProductoController@show');
$router->post('/producto/create', 'ProductoController@store');
$router->post('/producto/update/{id}', 'ProductoController@update');
$router->delete('/producto/delete/{id}', 'ProductoController@destroy');

$router->get('/usuarios', 'UsuariosController@index');
$router->get('/usuarios/{id}', 'UsuariosController@show');
$router->post('/usuarios/create', 'UsuariosController@store');
$router->post('/usuarios/update/{id}', 'UsuariosController@update');
$router->delete('/usuarios/delete/{id}', 'UsuariosController@destroy');

$router->get('/lineaticket', 'LineaticketController@showAll');
$router->get('/lineaticket/{id}', 'LineaticketController@showOne');
$router->post('/lineaticket/create', 'LineaticketController@create');
$router->post('/lineaticket/update/{id}', 'LineaticketController@update');
$router->delete('/lineaticket/delete/{id}', 'LineaticketController@destroy');

$router->get('/cuenta', 'CuentaController@index');
$router->get('/cuenta/{id}', 'CuentaController@show');
$router->post('/cuenta/create', 'CuentaController@store');
$router->post('/cuenta/update/{id}', 'CuentaController@update');
$router->delete('/cuenta/delete/{id}', 'CuentaController@destroy');

$router->get('/ticket', 'TicketController@index');
$router->get('/ticket/{id}', 'TicketController@show');
$router->post('/ticket/create', 'TicketController@store');
$router->post('/ticket/update/{id}', 'TicketController@update');
$router->delete('/ticket/delete/{id}', 'TicketController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
