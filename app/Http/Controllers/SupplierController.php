<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller{
    
    public function index(){
    	return Supplier::all();    	
    }

    public function view($id){
        return Supplier::query()->find($id);
    }
    
    public function create(){
        return view('new_supplier');
    }
    
    public function save(Request $request){
    	$supplier = Supplier::create($request->all());
        return $supplier;
    }
}
