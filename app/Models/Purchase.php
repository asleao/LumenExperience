<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Purchase extends Model{
    protected $table = 'purchases';
    protected $fillable = ['stock_id'];
    
    public function stock(){
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }
    
    public function purchaseProducts(){
        return $this->hasMany('App\Models\PurchaseProducts','purchase_id');
    }
}
