<?php

namespace App\Http\Controllers\Admin;

use App\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuestionOptionsRequest;
use App\Http\Requests\Admin\UpdateQuestionOptionsRequest;

class QuestionOptionsController extends Controller
{
    /**
     * Display a listing of QuestionOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('question_option_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('question_option_delete')) {
                return abort(401);
            }
            $question_options = QuestionOption::onlyTrashed()->get();
        } else {
            $question_options = QuestionOption::all();
        }

        return view('admin.question_options.index', compact('question_options'));
    }

    /**
     * Show the form for creating new QuestionOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('question_option_create')) {
            return abort(401);
        }
        
        $questions = \App\Question::get()->pluck('question', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.question_options.create', compact('questions'));
    }

    /**
     * Store a newly created QuestionOption in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionOptionsRequest $request)
    {
        if (! Gate::allows('question_option_create')) {
            return abort(401);
        }
        $question_option = QuestionOption::create($request->all());



        return redirect()->route('admin.question_options.index');
    }


    /**
     * Show the form for editing QuestionOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('question_option_edit')) {
            return abort(401);
        }
        
        $questions = \App\Question::get()->pluck('question', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $question_option = QuestionOption::findOrFail($id);

        return view('admin.question_options.edit', compact('question_option', 'questions'));
    }

    /**
     * Update QuestionOption in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionOptionsRequest $request, $id)
    {
        if (! Gate::allows('question_option_edit')) {
            return abort(401);
        }
        $question_option = QuestionOption::findOrFail($id);
        $question_option->update($request->all());



        return redirect()->route('admin.question_options.index');
    }


    /**
     * Display QuestionOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('question_option_view')) {
            return abort(401);
        }
        $question_option = QuestionOption::findOrFail($id);

        return view('admin.question_options.show', compact('question_option'));
    }


    /**
     * Remove QuestionOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('question_option_delete')) {
            return abort(401);
        }
        $question_option = QuestionOption::findOrFail($id);
        $question_option->delete();

        return redirect()->route('admin.question_options.index');
    }

    /**
     * Delete all selected QuestionOption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('question_option_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = QuestionOption::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore QuestionOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('question_option_delete')) {
            return abort(401);
        }
        $question_option = QuestionOption::onlyTrashed()->findOrFail($id);
        $question_option->restore();

        return redirect()->route('admin.question_options.index');
    }

    /**
     * Permanently delete QuestionOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('question_option_delete')) {
            return abort(401);
        }
        $question_option = QuestionOption::onlyTrashed()->findOrFail($id);
        $question_option->forceDelete();

        return redirect()->route('admin.question_options.index');
    }
}
