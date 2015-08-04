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
    'sale' =>[
        'controller' => 'App\Http\Controllers\SaleController',
        'index' => '/sale'  
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
    $app->get($info['index'].'/view/{id}', $info['controller'].'@view');
}
$app->get('/', function() {
     return view('pages.home');
});
$app->get('/stock/{id}/products', 'App\Http\Controllers\StockController@getProducts');
$app->get('/sale/filter', 'App\Http\Controllers\SaleController@filter');
$app->get('/sale/find', 'App\Http\Controllers\SaleController@find');
$app->post('/employee/delete', 'App\Http\Controllers\EmployeeController@delete');
$app->get('/employee/edit/{id}', 'App\Http\Controllers\EmployeeController@edit');

