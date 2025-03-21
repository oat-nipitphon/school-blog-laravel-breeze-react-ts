<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationNewImage extends Model
{
    protected $table = 'education_images';
    protected $fillable = [
        'id',
        'education_new_id',
        'image_data',
        'created_at',
        'updated_at',
    ];
}
