<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class StockProducts extends Model{
    protected $table = 'stock_products';
    public $amount;
    protected $fillable = ['ammount', 'stock_id', 'product_id'];
    
    public function stock(){
        return $this->belongsTo('App\Models\Stock','stock_id');
    }
    
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
