<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Sales extends Model{
    protected $table = 'sales';
    protected $fillable = ['stock_id','customer_id','employee_id'];
    
    public function stock(){
        return $this->belongsTo('App\Models\Stock', 'id');
    }
    
     public function customer(){
        return $this->belongsTo('App\Models\Customer', 'id');
    }
    
     public function employee(){
        return $this->belongsTo('App\Models\Employee', 'id');
    }
    
    public function saleProducts(){
        return $this->hasMany('App\Models\SaleProducts','sale_id');
    }
}
