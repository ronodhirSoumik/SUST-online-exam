<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class Student extends Model
{

	use SoftDeletes;
	protected $fillable = ['name', 'registration_no','department','session','semester','user_id'];
    protected $hidden = [];
    //
}
