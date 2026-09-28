<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinuteStat extends Model
{
    public $timestamps = false;

    protected $fillable = ['camera_id', 'minute', 'count'];
}
