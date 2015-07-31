<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller{
    
    public function index(){
    	return Product::all();    	
    }

    public function view($id){
        return Product::query()->find($id);
    }
    
    /**
     * O método precisa informar uma lista de estoques
     * @return {view}
     */
    public function create(){
        $stocks = Stock::all();
        return view('pages.new_product', ['stocks' => $stocks]);
    }
    
    public function save(Request $request){
    	$product = Product::create($request->all());
        return $product;
    }
}
