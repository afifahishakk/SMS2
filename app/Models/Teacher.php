<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'username',
        'name',
        'email',
        'phone',
        'gender_id',
        'photo',
        'nationality_id',
        'type',
        'address',
        'marriage_status',
        'salary',
        'ic_no',
        'ic_attachment',
        'spouse_name',
        'spouse_occupation',
        'spouse_phone',
        'spouse_workplace'
    ];

    public function user(){
        return $this->hasOne(Login::class, 'UserID', 'username');
    }
}
