<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code', 'first_name', 'last_name', 'gender', 'date_of_birth',
        'id_card_number', 'email', 'phone_number', 'address', 'district',
        'province', 'postal_code', 'department', 'position', 'salary',
        'hire_date', 'emergency_contact_name', 'emergency_contact_phone'
    ];
}
