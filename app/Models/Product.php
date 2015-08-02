<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model{
    protected $table = 'products';
    protected $fillable = ['name','unit_price','stock_id'];
    
    public function stockProducts(){
        return $this->hasMany('App\Models\StockProducts','product_id');
    }
    
    public function supplierProducts(){
        return $this->hasMany('App\Models\SupplierProducts','product_id');
    }
    
    public function stock(){
        return $this->belongsTo('App\Models\Stock','stock_id');
    }
}
