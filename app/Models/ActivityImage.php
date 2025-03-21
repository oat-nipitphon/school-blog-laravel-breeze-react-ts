<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    protected $table = 'activity_images';
    protected $fillable = [
        'id',
        'activity_id',
        'image_data',
        'created_at',
        'updated_at'
    ];
}
