<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id', '_token', 'files', 'active'];
    public $timestamps = true;
}
