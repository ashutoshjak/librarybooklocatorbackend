<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   //remove this for soft delete

class Map extends Model
{
    //
    use SoftDeletes;             //remove this for soft delete
    public $timestamps = false;
}
