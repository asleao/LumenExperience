<?php 

namespace App\Models;

final class Employee extends Person{
    protected $table = 'employees';
    protected $fillable = ['name', 'cpf', 'birth_date', 'phone', 'address','type'];
    public $type;
}
