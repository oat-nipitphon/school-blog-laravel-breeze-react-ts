<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activitys';
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];
}
