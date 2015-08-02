<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

abstract class Person extends Model{
    protected $name;
    protected $cpf;
    protected $birth_date;
    protected $phone;
    protected $address;
}
