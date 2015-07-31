<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseProducts;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller{
    
    public function index(){
        $purchases = Purchase::all();
        $response = [];
        foreach ($purchases as $purchase) {
            $response[] = [
                'purchase' => $purchase,
                'products' => $purchase->purchaseProducts()->get()
            ];
        }
        return $response;
    }

    public function view($id){
        $purchase = Purchase::query()->find($id);
        return ['purchase' => $purchase, 'products' => $purchase->purchaseProducts()->get()];
    }
    
    /**
     * O método precisa informar uma lista de produtos
     * @return {view}
     */
    public function create(){
        $products = Product::all();
        $stocks = Stock::all();
        return view('new_purchase', ['products' => $products, 'stocks' => $stocks]);
    }
    
    public function save(Request $request){
        $products = $request->get('products');
        $purchase = Purchase::create(['stock_id' => $request->get('stock_id')]);
        $pp = [];
        
        /**
         * Precisa incrementar a quantidade de produtos no estoque pelo "ammount"
         */
        foreach ($products as $product) {
            $ammount = $request->get($product.'_ammount');
            $pp[] = $this->savePurchaseProductRelation($purchase->id, $product, $ammount);
            $this->updateProductTotal($product, $ammount);
        }
        
    	return ['purchase' => $purchase, 'products' => $pp];
    }
    
    private function savePurchaseProductRelation($purchaseId, $prodId, $ammount){
        
        $purchaseProduct = new \App\Models\PurchaseProducts();
        $purchaseProduct->purchase_id = $purchaseId;
        $purchaseProduct->product_id = $prodId;
        $purchaseProduct->ammount = $ammount;
        $purchaseProduct->save();
        
        return PurchaseProducts::find($purchaseProduct->id);
    }
    
    private function updateProductTotal($prodId, $ammount){
        $prod = Product::find($prodId);
        $prod->total += $ammount;
        $prod->save();
    }
}
