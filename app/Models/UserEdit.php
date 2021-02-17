<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserEdit extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $guarded = [];
}
