<?php

//------------Route User V1-------------------//

$router->group(['prefix' => 'v1'],  function () use ($router) {

    $router->group(['prefix' => 'users', 'namespace' => 'App\Modules\V1\Users\Controllers'], function() use($router) {

        // untuk menyimpan data user
        $router->post('/', 'UserController@simpan');

        // untuk mengambil semua data user
        $router->get('/', 'UserController@all');

        // untuk update berdasarkan id
        $router->put('{id}', 'UserController@update');

        // untuk delete data berdasarkan id
        $router->delete('{id}', 'UserController@delete');
    
    });

});


