<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Academic_Type extends Authenticatable
{
    use Notifiable;
    protected $table = 'academic_types';
    public $incrementing = FALSE;
}
