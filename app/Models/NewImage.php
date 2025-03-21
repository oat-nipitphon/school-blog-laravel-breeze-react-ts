<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewImage extends Model
{
    protected $table = 'new_images';
    protected $fillable = [
        'id',
        'new_id',
        'image_data',
        'created_at',
        'updated_at',
    ];
}
