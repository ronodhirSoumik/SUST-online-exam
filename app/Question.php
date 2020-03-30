<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @package App
 * @property string $question
 * @property integer $score
*/
class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['question', 'score'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setScoreAttribute($input)
    {
        $this->attributes['score'] = $input ? $input : null;
    }
     public function options()
    {
        return $this->hasMany('App\QuestionOption');
    }

    public function exams()
    {
        return $this->belongsToMany(Test::class, 'question_test');
    }
    
}
