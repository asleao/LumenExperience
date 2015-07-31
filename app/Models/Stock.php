<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Stock extends Model{
    protected $table = 'stocks';
    protected $fillable = ['name', 'type','employee_id'];
    
    public function stocker(){
        return $this->hasOne('App\Models\Employee','id');
    }
}
