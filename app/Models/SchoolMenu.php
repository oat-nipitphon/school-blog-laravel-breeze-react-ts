<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolMenu extends Model
{
    protected $table = 'school_menus';
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_at',
        'updated_at',
    ];
}
