<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamsResult extends Model
{
    protected $fillable = ['exam_id', 'user_id', 'exam_result'];

    public function answers()
    {
        return $this->hasMany('App\ExamsResultsAnswer');
    }
}
