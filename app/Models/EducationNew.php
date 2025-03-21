<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationNew extends Model
{
    protected $table = 'education_news';
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_at',
        'updated_at',
    ];
}
