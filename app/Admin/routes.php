<?php

use Illuminate\Routing\Router;
use LotController;
use TaskController;
use JobberController;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('lots', LotController::class);
    $router->resource('tasks', TaskController::class);
    $router->resource('jobbers', JobberController::class);

});