<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class SupplierProducts extends Model{
    protected $table = 'supplier_products';    
    protected $fillable = ['supplier_id', 'product_id'];
    
    public function supplier(){
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
    
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
