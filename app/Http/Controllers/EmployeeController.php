<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeController extends Controller{
    
    public function index(){
    	$employees = Employee::all();         
        return view('pages.employees', ['employees' => $employees]);     	
    }

    public function view($id){
        return Employee::query()->find($id);
    }
    
    public function create(){
        $types = EmployeeType::getType();
        return view('pages.new_employee', ['types' => $types]);
    }
    
    public function save(Request $request){
    	$employee = Employee::updateOrCreate($request->all());
        $employees = Employee::all();         
        return view('pages.employees', ['employees' => $employees]);          
    }
    
    public function delete(Request $request){
        $id = $request->get('id');
        $employee = Employee::find($id);
        $employee->delete();
        
        $employees = Employee::all();         
        return view('pages.employees', ['employees' => $employees]);          
    }
    
    public function edit($id){
        $employee = Employee::find($id);
        $types = EmployeeType::getType();
        return view('pages.edit_employee', ['employee' => $employee, 'types' => $types]);
    }
}
