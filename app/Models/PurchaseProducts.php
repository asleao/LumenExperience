<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PurchaseProducts extends Model{
    protected $table = 'purchase_product';
    public $amount;
    protected $fillable = ['ammount', 'purchase_id', 'product_id'];
    
    public function purchase(){
        return $this->belongsTo('App\Models\Purchase','purchase_id');
    }
    
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
