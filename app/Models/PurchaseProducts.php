<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PurchaseProducts extends Model{
    protected $table = 'purchase_product';
    public $amount;
    protected $fillable = ['ammount', 'purchase_id', 'product_id'];
    
    public function purchase(){
        return $this->hasOne('App\Models\Purchase','id');
    }
    
    public function product(){
        return $this->hasOne('App\Models\Product', 'id');
    }
}
