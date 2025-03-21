<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestingLink extends Model
{
    protected $table = 'interesting_links';
    protected $fillable = [
        'id',
        'image_data',
        'link_address',
        'created_at',
        'updated_at',
    ];
}
