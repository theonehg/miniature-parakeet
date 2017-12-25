<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'statuses';

    const NEW = 1;
    const IN_PROGRESS = 2;
    const RESOLVED = 3;
    const FEEDBACK = 4;
    const CLOSED = 5;
    const CANCELLED = 6;
}
