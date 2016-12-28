<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = ['id', '_token', 'files', 'active'];
    public $timestamps = true;
}
