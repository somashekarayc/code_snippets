<?php
// ========================== by som ===========================

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityGuardAdvanceSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emp_no',
        'adv_salary_date',
        'salary',
        'advance',
        'salary_payable',
        'balance',
    ];

    public function staffs()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
