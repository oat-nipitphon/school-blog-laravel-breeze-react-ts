<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $table = 'user_images';
    protected $fillable = [
        'id',
        'user_id',
        'image_data',
        'created_at',
        'updated_at',
    ];
}
