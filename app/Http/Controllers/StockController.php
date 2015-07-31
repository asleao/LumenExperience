<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\StockType;
use App\Models\Employee;
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
        $params = [
            'types' => $types,
            'employees' => $employees
        ];
        return view('new_stock', $params);
    }
    
    public function save(Request $request){
    	$stock = Stock::create($request->all());
        return $stock;
    }
}
