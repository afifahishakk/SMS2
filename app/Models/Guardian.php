<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $table = 'guardians';
    protected $fillable = [
        'username',
        'name',
        'gender_id',
        'phone_no',
        'email',
        'photo',
        'address',
        'occupation',
        'salary',
        'relationship_id',
        'ic_attachment',
    ];

    public function user(){
        return $this->hasOne(Login::class, 'UserID', 'username');
    }
}
