<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierProducts;

class ProductController extends Controller{
    
    public function index(){
        $products = Product::all();
        return view('pages.products', ['products' => $products]);
    }

    public function view($id){
        return Product::query()->find($id);
    }
    
    /**
     * O método precisa informar uma lista de estoques
     * @return {view}
     */
    public function create(){
        $supplier = Supplier::all();
        return view('pages.new_product', ['suppliers' => $supplier]);
    }
    
    public function save(Request $request){
        $suppliers = $request->get('supplier_id');
        $product = Product::create($request->all());
        foreach ($suppliers as $supp) {
            SupplierProducts::create([
                'product_id' => $product->id,
                'supplier_id' => $supp
            ]);
        }
        $products = Product::all(); 
        return view('pages.products', ['products' => $products]); 
    }
}
