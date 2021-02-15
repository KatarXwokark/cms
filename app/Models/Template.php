<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'Template';
    public $timestamps = false;
    protected $guarded = [];
}
