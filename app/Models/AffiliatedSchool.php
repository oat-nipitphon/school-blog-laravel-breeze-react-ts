<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatedSchool extends Model
{
    protected $table = 'affiliated_schools';
    protected $fillable = [
        'id',
        'name',
        'link_address',
        'created_at',
        'updated_at'
    ];
}
