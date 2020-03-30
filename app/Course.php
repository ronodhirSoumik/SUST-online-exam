<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Course
 *
 * @package App
 * @property string $course_name
 * @property string $course_code
 * @property string $department
 * @property string $description
*/
class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['course_name', 'course_code', 'department', 'description'];
    protected $hidden = [];
    
    
    
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }
    public function scopeOfTeacher($query)
    {
        if(!Auth::user()->isAdmin()){
            return $query->whereHas('teachers',function ($q){
                $q->where('user_id',Auth::user()->id);
            });
        }
        return $query;
    }
    
}
