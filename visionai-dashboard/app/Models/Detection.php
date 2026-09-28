<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    protected $fillable = ['camera_id', 'gender', 'age_bucket', 'emotion', 'detected_at'];
}
