<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model{
    protected $table = 'products';
    protected $fillable = ['name','unit_price','total','stock_id'];
    
    public function purchaseProducts(){
        return $this->hasMany('App\Models\PurchaseProducts','product_id');
    }
    
    public function stock(){
        return $this->hasOne('App\Models\Stock','id');
    }
}
