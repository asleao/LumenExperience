<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$prefix = '';
$controllers = [
    'customer' => [
        'controller' => 'App\Http\Controllers\CustomerController',
        'index' => '/customer'
    ],
    'employee' => [
        'controller' => 'App\Http\Controllers\EmployeeController',
        'index' => '/employee'
    ],
    'supplier' => [
        'controller' => 'App\Http\Controllers\SupplierController',
        'index' => '/supplier'
    ],
    'stock' =>[
        'controller' => 'App\Http\Controllers\StockController',
        'index' => '/stock'  
    ],
    'purchase' =>[
        'controller' => 'App\Http\Controllers\PurchaseController',
        'index' => '/purchase'  
    ],
    'product' =>[
        'controller' => 'App\Http\Controllers\ProductController',
        'index' => '/product'  
    ]    
];

foreach ($controllers as $controller => $info) {
    $app->get($info['index'], $info['controller'].'@index');
    $app->get($info['index'].'/add', $info['controller'].'@create');
    $app->post($info['index'].'/add', $info['controller'].'@save');
    $app->get($info['index'].'/{id}', $info['controller'].'@view');
}

$app->get('/test/{prod}', function($prod) {
        
        $prod = \App\Models\Product::firstOrNew(['id' => $prod]);
    
	return $prod->purchaseProducts->first()->product;
});