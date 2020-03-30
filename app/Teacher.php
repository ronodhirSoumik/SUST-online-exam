<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class Teacher extends Model
{
	use SoftDeletes;
    protected $fillable = ['name', 'department', 'designation','user_id'];
    protected $hidden = [];
}
