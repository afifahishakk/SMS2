<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Academic extends Authenticatable
{
    use Notifiable;
    protected $table = 'academics';
    public $incrementing = FALSE;

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function academic_type(){
        return $this->belongsTo(Academic_Type::class, 'a_type_id', 'id');
    }
}
