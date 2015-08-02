<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller{
    
    public function index(){
    	return Customer::all();    	
    }

    public function view($id){
        return Customer::query()->find($id);
    }
    
    public function create(){
        return view('new_customer');
    }
    
    public function save(Request $request){
    	$customer = Customer::create($request->all());
        return $customer;
    }
}
