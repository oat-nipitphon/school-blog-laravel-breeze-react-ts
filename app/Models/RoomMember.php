<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMember extends Model
{
    protected $table = 'room_members';
    protected $fillable = [
        'id',
        'class_room_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
