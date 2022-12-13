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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Création du groupr api : http://localhost:8000/api/
$router->group(['prefix' => 'rapnoteapi'], function () use ($router) {
    $router->get('notes', ['uses' => 'NoteController@getAllNotes']);
    $router->get('notes/{id}', ['uses' => 'NoteController@getOneNote']);

    $router->put('notes/{id}', ['uses' => 'NoteController@updateNote']);

    $router->post('notes', ['uses' => 'NoteController@createNote']);

    $router->delete('notes/{id}', ['uses' => 'NoteController@deleteNote']);

    $router->put('notes/{id}/instrumental', ['uses' => 'NoteController@updateInstrumental']);

});
