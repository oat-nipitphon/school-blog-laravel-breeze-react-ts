<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'class_rooms';
    protected $fillable = [
        'id',
        'class',
        'class_str',
        'number',
        'number_str',
        'created_at',
        'updated_at',
    ];
}
