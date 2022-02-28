<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
      'employee_id', 'classification', 'fullname', 'date_of_birth', 'gender', 'phone_number', 'id_card', 'email', 'address'

    ];
}
