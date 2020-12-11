<?php



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'CATALOG_WEBSERVICE_IP'], function () use ($router) {
  $router->get('lookup/{id}',  ['uses' => 'bookController@lookupbook']);

  $router->get('search/{name}', ['uses' => 'bookController@searchbook']);

  $router->post('book', ['uses' => 'bookController@create']);

  $router->delete('book/{id}', ['uses' => 'bookController@delete']);

  $router->put('update/{id}', ['uses' => 'bookController@update']);
});

