<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $table = 'user_status';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}
