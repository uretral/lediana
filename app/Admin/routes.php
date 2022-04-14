<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {


    $router->resource('content/slides', \Content\SlideController::class);
    $router->resource('block/promotion', \Blocks\PromotionController::class);
    $router->resource('settings/communications', \Settings\CommunicationController::class);
    $router->resource('settings/socials', \Settings\SocialController::class);
    $router->resource('pages', PageController::class);
    $router->resource('menu', \Services\MenuTypeController::class);
    $router->resource('products', \Product\ProductController::class);

    $router->get('/', 'HomeController@index')->name('home');
});
