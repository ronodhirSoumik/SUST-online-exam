<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamsResultsAnswer extends Model
{
    //
    protected $fillable = ['exams_result_id', 'question_id', 'option_id', 'correct'];
}
