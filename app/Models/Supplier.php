<?php 
namespace App\Models;

final class Supplier extends Person{
    protected $table = 'suppliers';
    protected $fillable = ['name', 'cnpj','phone', 'address'];
}
