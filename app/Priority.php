<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public $timestamps = false;
    protected $table = 'priorities';

    const LOW = 1;
    const NORMAL = 2;
    const HIGH = 3;
    const CRITICAL = 4;
}
