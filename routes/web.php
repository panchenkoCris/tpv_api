<?php
use App\Http\Controllers\CuentaController;

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

$router->get('/categoria', 'CategoriaController@showAll');
$router->get('/categoria/{id}', 'CategoriaController@showOne');
$router->post('/categoria/create', 'CategoriaController@create');
$router->post('/categoria/update/{id}', 'CategoriaController@update');
$router->delete('/categoria/delete/{id}', 'CategoriaController@destroy');

$router->get('/tipo', 'TipoController@showAll');
$router->get('/tipo/{id}', 'TipoController@showOne');
$router->post('/tipo/create', 'TipoController@create');
$router->post('/tipo/update/{id}', 'TipoController@update');
$router->delete('/tipo/delete/{id}', 'TipoController@destroy');

$router->get('/descuento', 'DescuentoController@showAll');
$router->get('/descuento/{id}', 'DescuentoController@showOne');
$router->post('/descuento/create', 'DescuentoController@create');
$router->post('/descuento/update/{id}', 'DescuentoController@update');
$router->delete('/descuento/delete/{id}', 'DescuentoController@destroy');

$router->get('/producto', 'ProductoController@showAll');
$router->get('/producto/{id}', 'ProductoController@showOne');
$router->post('/producto/create', 'ProductoController@create');
$router->post('/producto/update/{id}', 'ProductoController@update');
$router->delete('/producto/delete/{id}', 'ProductoController@destroy');

$router->get('/usuarios', 'UsuariosController@showAll');
$router->get('/usuarios/{id}', 'UsuariosController@showOne');
$router->post('/usuarios/create', 'UsuariosController@create');
$router->post('/usuarios/update/{id}', 'UsuariosController@update');
$router->delete('/usuarios/delete/{id}', 'UsuariosController@destroy');
$router->get('/authenticate', 'UsuariosController@authenticate');

$router->get('/lineaticket', 'LineaticketController@showAll');
$router->get('/lineaticket/{id}', 'LineaticketController@showOne');
$router->post('/lineaticket/create', 'LineaticketController@create');
$router->post('/lineaticket/update/{id}', 'LineaticketController@update');
$router->delete('/lineaticket/delete/{id}', 'LineaticketController@destroy');
$router->get('/productosTicket', 'LineaticketController@showAllProductsByTicket');

$router->get('/cuenta', 'CuentaController@showAll');
$router->get('/cuenta/{id}', 'CuentaController@showOne');
$router->post('/cuenta/create', 'CuentaController@create');
$router->post('/cuenta/update/{id}', 'CuentaController@update');
$router->delete('/cuenta/delete/{id}', 'CuentaController@destroy');
$router->get('/descuentosUsuario', 'CuentaController@getAllDiscountsUser');

$router->get('/ticket', 'TicketController@showAll');
$router->get('/ticket/{id}', 'TicketController@showOne');
$router->post('/ticket/create', 'TicketController@create');
$router->post('/ticket/update/{id}', 'TicketController@update');
$router->delete('/ticket/delete/{id}', 'TicketController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
