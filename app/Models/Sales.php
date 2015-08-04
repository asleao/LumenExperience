<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Sales extends Model{
    protected $table = 'sales';
    protected $fillable = ['stock_id','customer_id','employee_id'];
    
    public function stock(){
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }
    
     public function customer(){
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
    
     public function employee(){
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
    
    public function saleProducts(){
        return $this->hasMany('App\Models\SalesProducts','sale_id');
    }
}
