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
    $router->resource('promocode', PromocodeController::class);

    $router->resource('props/item', \Item\ItemController::class);
    $router->resource('props/size-title', \Item\ItemSizeTitleController::class);
    $router->resource('props/spread-color', \Item\ItemSpreadColorController::class);
    $router->resource('props/spread-type', \Item\ItemSpreadTypeController::class);
    $router->resource('props/cover-type', \Item\ItemCoverTypeController::class);
    $router->resource('props/cover-material', \Item\ItemCoverMaterialController::class);
    $router->resource('props/attributes', \Item\ItemAttributeController::class);

    $router->resource('products', \Product\ProductController::class);

//    $router->resource('prices/{item?}', \Item\ItemSizeController::class);
    $router->get('prices/{item?}/create', [\App\Admin\Controllers\Item\ItemSizeController::class,'create']);
    $router->any('prices/{item}/{id}', [\App\Admin\Controllers\Item\ItemSizeController::class,'update']);
    $router->get('prices/{item?}', [\App\Admin\Controllers\Item\ItemSizeController::class,'index']);
    $router->post('prices/{item?}', [\App\Admin\Controllers\Item\ItemSizeController::class,'store']);
    $router->get('prices/{item?}/{id?}/edit', [\App\Admin\Controllers\Item\ItemSizeController::class,'edit']);


    $router->get('/', 'HomeController@index')->name('home');
});
