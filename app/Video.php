<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'vid';
    protected $table = 'video';
    public $timestamps = false;
}
