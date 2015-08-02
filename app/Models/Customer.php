<?php 
namespace App\Models;

final class Customer extends Person{
    protected $table = 'customers';
    protected $fillable = ['name', 'cpf', 'birth_date', 'phone', 'address'];
}
