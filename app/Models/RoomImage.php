<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    protected $guarded = ['id', '_token', 'files'];
    public $timestamps = true;
}
