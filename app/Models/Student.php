<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function hafazan(){
        return $this->hasMany(Hafazan::class, 'student_id', 'id');
    }

    public function academic(){
        return $this->hasMany(Academic::class, 'student_id', 'id');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'student_id', 'id');
    }
}
