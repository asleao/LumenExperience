<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PurchaseProducts extends Model{
    protected $table = 'purchase_product';
    public $amount;
    protected $fillable = ['ammount', 'purchase_id', 'stock_product_id'];
    
    public function purchase(){
        return $this->belongsTo('App\Models\Purchase','purchase_id');
    }
    
    public function stockProduct(){
        return $this->belongsTo('App\Models\StockProducts', 'stock_product_id');
    }
}
