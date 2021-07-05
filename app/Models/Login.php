<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Parent_;

class Login extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->hasOne(Teacher::class, 'username', 'UserID');
    }
    public function parent(){
        return $this->hasOne(Guardian::class, 'username', 'UserID');
    }

}
