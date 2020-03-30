<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamsRequest;
use App\Http\Requests\Admin\UpdateExamsRequest;

class ExamsController extends Controller
{
    /**
     * Display a listing of Exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('exam_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('exam_delete')) {
                return abort(401);
            }
            $exams = Exam::onlyTrashed()->get();
        } else {
            $exams = Exam::all();
        }

        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating new Exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('exam_create')) {
            return abort(401);
        }

        $courses = \App\Course::ofTeacher()->get();
        $courses_ids=$courses->pluck('id');
        $courses=$courses->pluck('course_code', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $lessons = \App\Lesson::whereIn('course_id',$courses_ids)->get()->pluck('course_code', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $questions = \App\Question::get()->pluck('question', 'id');


        return view('admin.exams.create', compact('courses', 'lessons', 'questions'));
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param  \App\Http\Requests\StoreExamsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamsRequest $request)
    {
        if (! Gate::allows('exam_create')) {
            return abort(401);
        }
        $exam = Exam::create($request->all());
        $exam->questions()->sync(array_filter((array)$request->input('questions')));



        return redirect()->route('admin.exams.index');
    }


    /**
     * Show the form for editing Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('exam_edit')) {
            return abort(401);
        }

        $courses = \App\Course::ofTeacher()->get();
        $courses_ids=$courses->pluck('id');
        $courses=$courses->pluck('course_code', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $lessons = \App\Lesson::whereIn('course_id',$courses_ids)->get()->pluck('course_code', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $questions = \App\Question::get()->pluck('question', 'id');


        $exam = Exam::findOrFail($id);

        return view('admin.exams.edit', compact('exam', 'courses', 'lessons', 'questions'));
    }

    /**
     * Update Exam in storage.
     *
     * @param  \App\Http\Requests\UpdateExamsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamsRequest $request, $id)
    {
        if (! Gate::allows('exam_edit')) {
            return abort(401);
        }
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        $exam->questions()->sync(array_filter((array)$request->input('questions')));



        return redirect()->route('admin.exams.index');
    }


    /**
     * Display Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('exam_view')) {
            return abort(401);
        }
        $exam = Exam::findOrFail($id);

        return view('admin.exams.show', compact('exam'));
    }


    /**
     * Remove Exam from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('exam_delete')) {
            return abort(401);
        }
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('admin.exams.index');
    }

    /**
     * Delete all selected Exam at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('exam_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Exam::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Exam from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('exam_delete')) {
            return abort(401);
        }
        $exam = Exam::onlyTrashed()->findOrFail($id);
        $exam->restore();

        return redirect()->route('admin.exams.index');
    }

    /**
     * Permanently delete Exam from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('exam_delete')) {
            return abort(401);
        }
        $exam = Exam::onlyTrashed()->findOrFail($id);
        $exam->forceDelete();

        return redirect()->route('admin.exams.index');
    }
}
