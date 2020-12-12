<?php


//route groups allow you to share route attributes, across a large number of routes without needing to define those attributes on each route
// Save Session
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
//every route will have a prefix of order_webservice_ip un buy server

$router->group(['prefix' => 'order_webservice_ip'], function () use ($router) {
  
  $router->post('buy/{id}', ['uses' => 'buyController@buybook']);//buy a book by book's id(post method)
});