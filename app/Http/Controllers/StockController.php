<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\StockType;
use App\Models\Employee;
use \App\Models\Product;
use \App\Models\StockProducts;
use Illuminate\Http\Request;

class StockController extends Controller{
    
    public function index(){
    	return Stock::all();
//        Busca Relacionados
//        $stock = Stock::all()->first();
//        return $stock->stocker()->first();
    }

    public function view($id){
        return Stock::query()->find($id);
    }
    
    public function create(){
        $types = StockType::getType();
        $employees = Employee::all();
        $products = Product::all();
        $params = [
            'types' => $types,
            'employees' => $employees,
            'products' => $products
        ];
        return view('pages.new_stock', $params);
    }
    
    public function save(Request $request){
        $products = $request->get('product_id');
    	$stock = Stock::create($request->all());
        foreach ($products as $product) {
            StockProducts::create([
                'product_id' => $product,
                'stock_id'=> $stock->id
            ]);
        }   
        return view('pages.home');
    }
    
    public function getProducts($id){
        $stock = Stock::find($id);
        $stockProducts = $stock->stockProducts;
        $products = [];
        foreach ($stockProducts as $sp) {
            $products[] = $sp->product;
        }
        return $products;
    }
}
