<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class SalesProducts extends Model{
    protected $table = 'sale_products';
    public $amount;
    protected $fillable = ['ammount', 'sale_id', 'stock_product_id'];
    
    public function sale(){
        return $this->belongsTo('App\Models\Sale','sale_id');
    }
    
    public function stockProduct(){
        return $this->belongsTo('App\Models\StockProducts', 'stock_product_id');
    }
}
