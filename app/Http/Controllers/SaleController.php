<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Sales;
use App\Models\SalesProducts;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\StockProducts;
use Illuminate\Http\Request;
use App\Models\Employee;

class SaleController extends Controller{
    
    public function index(){
        $sales = Sale::all();
        $response = [];
        foreach ($sales as $sale) {
            
            $prods = [];
            $pps = $sale->salesProducts()->get();
            foreach ($pps as $pp) {
                $prods[] = $pp->product->name;
            }
            
            $response[] = [
                'sale' => $sale->created_at->toDateString(),
                'products' => $prods
            ];
        }
        return $response;
    }

    public function view($id){
        $sale = Sale::query()->find($id);
        return ['sale' => $sale, 'products' => $sale->saleProducts()->get()];
    }
    
    /**
     * O método precisa informar uma lista de produtos
     * @return {view}
     */
    public function create(){
        $stocks = Stock::all();
        $customers = Customer::all();
        $employees = Employee::all();
        return view('pages.new_sale', ['stocks' => $stocks,'customers' =>$customers,'employees' =>$employees]);
    }
    
    public function save(Request $request){
        $products = $request->get('products');
        $stockId = $request->get('stock_id');
        $customerId = $request->get('customer_id');
        $salesmanId = $request->get('employee_id');
        
        $sale = Sales::create([
            'stock_id' => $stockId,
            'customer_id' => $customerId,
            'employee_id'=> $salesmanId
        ]);        
        
        /**
         * Precisa incrementar a quantidade de produtos no estoque pelo "ammount"
         */
        foreach ($products as $product) {
            $ammount = $request->get($product.'_ammount');
            
            $sp = StockProducts::query()
                    ->where('stock_id', $stockId)
                    ->where('product_id', $product)
                    ->first();
            
            SalesProducts::create([
               'sale_id' => $sale->id,
               'stock_product_id' => $sp->id,
               'ammount' => $ammount
            ]);
            
            $sp->ammount -= $ammount;
            $sp->save();
        }
        
    	return view('pages.home');
    }    
}
