<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'student_id',
        'payment_date',
        'student_ic',
        'p_type_id',
        'month',
        'year',
        'payment_option',
        'amount',
        'paid_amount',
        'balance',
        'payment_status',
        'parent',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
