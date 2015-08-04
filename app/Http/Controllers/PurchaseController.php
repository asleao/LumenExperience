<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseProducts;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockProducts;
use Illuminate\Http\Request;

class PurchaseController extends Controller{
    
    public function index(){
        $purchases = Purchase::all();
        $response = [];
        foreach ($purchases as $purchase) {
            
            $prods = [];
            $pps = $purchase->purchaseProducts()->get();
            foreach ($pps as $pp) {
                $prods[] = $pp->product->name;
            }
            
            $response[] = [
                'purchase' => $purchase->created_at->toDateString(),
                'products' => $prods
            ];
        }
        return $response;
    }

     public function filter(Request $request){
        
        $iniDate = $request->get("dataIni");
        $endDate = $request->get("dataFim");
        
        $column = 'created_at';
        $purchases = Purchase::query()
                    ->where($column, '>=', $iniDate.' 00:00')
                    ->where($column, '<=', $endDate.' 23:59')
                    ->get();
        
        
        return view('pages.purchases', ['purchases' => $purchases]);
    }
    
    public function find(){
        return view('pages.find_purchases');
    }

    public function view($id){
        $purchase = Purchase::query()->find($id);
        
        $purchaseProducts = $purchase->purchaseProducts()->get();
        
        $products = [];
        
        foreach ($purchaseProducts as $sp) {
            $products[] = [
                'productId' => $sp->stockProduct->product->id,
                'ammount' => $sp->ammount,
                'name' => $sp->stockProduct->product->name,
                'unit_price' => $sp->stockProduct->product->unit_price
            ];
        }
        
        return view('pages.purchase_products', ['purchase' => $purchase, 'products' => $products]);
    }
    
    /**
     * O método precisa informar uma lista de produtos
     * @return {view}
     */
    public function create(){
        $stocks = Stock::all();
        return view('pages.new_purchase', ['stocks' => $stocks]);
    }
    
    public function save(Request $request){
        $products = $request->get('products');
        $stockId = $request->get('stock_id');
        
        $purchase = Purchase::create(['stock_id' => $request->get('stock_id')]);
        
        /**
         * Precisa incrementar a quantidade de produtos no estoque pelo "ammount"
         */
        foreach ($products as $product) {
            $ammount = $request->get($product.'_ammount');
            
            $sp = StockProducts::query()
                    ->where('stock_id', $stockId)
                    ->where('product_id', $product)
                    ->first();
            
            PurchaseProducts::create([
               'purchase_id' => $purchase->id,
               'stock_product_id' => $sp->id,
               'ammount' => $ammount
            ]);
            
            $sp->ammount += $ammount;
            $sp->save();
        }
        
    	return view('pages.home');
    }    
}
