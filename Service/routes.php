<?php
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


$router->any('{dir}-ajax={file}', function (Request $request, $dir, $file) {
    require ROOT . "/ajax/$dir/$file.php";
});

$router->get('/', function () {
    return 'Hello';
});

$router->get('/widgets', function () {
    return \MyWay\Model\Widgets::get()->toJson();
});
$router->get('/widgets/{id}', function (int $id) {
    return \MyWay\Model\Widgets::find($id)->toJson();
});

$router->get('bye', function () {
    return 'goodbye world!';
});



$router->group(['namespace' => 'MyWay\Controllers', 'prefix' => 'users'], function (Router $router) {
    $router->get('/', ['name' => 'users.index', 'uses' => 'UsersController@index']);
    $router->post('/', ['name' => 'users.store', 'uses' => 'UsersController@store']);
});

$router->any('{any}', function (Request $request, ... $params) {
    dump($params,$request);
    return new Response('Oups... Page not found', 404);
})->where('any', '(.*)');