<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lesson;
use App\Question;
use App\QuestionOption;
use App\ExamsResult;
class LessonController extends Controller
{
    //
    public function show($lesson_title)
    {
    	//dd($course_name);
    	$lesson = Lesson::where('title', $lesson_title)->firstOrFail();
        //$purchased_course = \Auth::check() && $course->students()->where('user_id', \A//uth::id())->count() > 0;
        $exam_result = NULL;
        if ($lesson->exam) {
            $exam_result = ExamsResult::where('exam_id', $lesson->exam->id)
                ->where('user_id', \Auth::id())
                ->first();
        }
        return view('lesson', compact('lesson','exam_result'));
    }
    public function exam($lesson_title, Request $request)
    {
        $lesson = Lesson::where('title', $lesson_title)->firstOrFail();
        $answers = [];
        $exam_score = 0;
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = QuestionOption::where('question_id', $question_id)
                ->where('id', $answer_id)
                ->where('correct', 1)->count() > 0;
            $answers[] = [
                'question_id' => $question_id,
                'option_id' => $answer_id,
                'correct' => $correct
            ];
            if ($correct) {
                $exam_score += $question->score;
            }
            /*
             * Save the answer
             * Check if it is correct and then add points
             * Save all exam result and show the points
             */
        }
        $exam_result = ExamsResult::create([
            'exam_id' => $lesson->exam->id,
            'user_id' => \Auth::id(),
            'exam_result' => $exam_score
        ]);
        $exam_result->answers()->createMany($answers);

        return redirect()->route('lessons.show', [$lesson_title])->with('message', 'You Exam score: ' . $exam_score);
    }

}




