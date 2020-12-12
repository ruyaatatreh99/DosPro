<?php



$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/', function (\Illuminate\Http\Request $request) {

    $request->session()->put('name', 'Lumen-Session');

    return response()->json([
        'session.name' => $request->session()->get('name')
    ]);
});
// Test session
$router->get('/session', function (\Illuminate\Http\Request $request) {

    return response()->json([
        'session.name' => $request->session()->get('name'),
    ]);
});
Route::any('event', 'Event_c@eventTest');
$router->group(['prefix' => 'CATALOG_WEBSERVICE_IP'], function () use ($router) {
  $router->get('lookup/{id}',  ['uses' => 'bookController@lookupbook']);

  $router->get('search/{name}', ['uses' => 'bookController@searchbook']);

  $router->post('book', ['uses' => 'bookController@create']);

  $router->delete('book/{id}', ['uses' => 'bookController@delete']);

  $router->put('update/{id}', ['uses' => 'bookController@update']);
});

