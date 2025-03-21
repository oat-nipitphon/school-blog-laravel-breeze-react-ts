<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProfileImage extends Model
{

    use HasFactory;

    protected $table = 'profile_images';
    protected $fillable = [
        'id',
        'user_id',
        'image_name',
        'image_data',
        'created_at',
        'updated_at',
    ];

    /**

     * Get the user's first name.

     *

     * @return \Illuminate\Database\Eloquent\Casts\Attribute

     */

     protected function name(): Attribute

     {

         return Attribute::make(

             get: fn ($value) => url('uploads/'.$value),

         );

     }

}
