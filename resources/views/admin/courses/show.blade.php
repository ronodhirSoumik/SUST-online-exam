@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.courses.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.courses.fields.teachers')</th>
                            <td field-key='teachers'>
                                @foreach ($course->teachers as $singleTeachers)
                                    <span class="label label-info label-many">{{ $singleTeachers->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.courses.fields.course-name')</th>
                            <td field-key='course_name'>{{ $course->course_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.courses.fields.course-code')</th>
                            <td field-key='course_code'>{{ $course->course_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.courses.fields.department')</th>
                            <td field-key='department'>{{ $course->department }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.courses.fields.description')</th>
                            <td field-key='description'>{{ $course->description }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">Lessons</a></li>
<li role="presentation" class=""><a href="#exam" aria-controls="exam" role="tab" data-toggle="tab">Exam</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="lessons">
<table class="table table-bordered table-striped {{ count($lessons) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.lessons.fields.course')</th>
                        <th>@lang('quickadmin.lessons.fields.title')</th>
                        <th>@lang('quickadmin.lessons.fields.description')</th>
                        <th>@lang('quickadmin.lessons.fields.position')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($lessons) > 0)
            @foreach ($lessons as $lesson)
                <tr data-entry-id="{{ $lesson->id }}">
                    <td field-key='course'>{{ $lesson->course->course_code ?? '' }}</td>
                                <td field-key='title'>{{ $lesson->title }}</td>
                                <td field-key='description'>{{ $lesson->description }}</td>
                                <td field-key='position'>{{ $lesson->position }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('lesson_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.lessons.restore', $lesson->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('lesson_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.lessons.perma_del', $lesson->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('lesson_view')
                                    <a href="{{ route('admin.lessons.show',[$lesson->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('lesson_edit')
                                    <a href="{{ route('admin.lessons.edit',[$lesson->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('lesson_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.lessons.destroy', $lesson->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="exam">
<table class="table table-bordered table-striped {{ count($exams) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.exam.fields.course')</th>
                        <th>@lang('quickadmin.exam.fields.lesson')</th>
                        <th>@lang('quickadmin.exam.fields.title')</th>
                        <th>@lang('quickadmin.exam.fields.start-time')</th>
                        <th>@lang('quickadmin.exam.fields.duration')</th>
                        <th>@lang('quickadmin.exam.fields.description')</th>
                        <th>@lang('quickadmin.exam.fields.questions')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($exams) > 0)
            @foreach ($exams as $exam)
                <tr data-entry-id="{{ $exam->id }}">
                    <td field-key='course'>{{ $exam->course->course_code ?? '' }}</td>
                                <td field-key='lesson'>{{ $exam->lesson->title ?? '' }}</td>
                                <td field-key='title'>{{ $exam->title }}</td>
                                <td field-key='start_time'>{{ $exam->start_time }}</td>
                                <td field-key='duration'>{{ $exam->duration }}</td>
                                <td field-key='description'>{{ $exam->description }}</td>
                                <td field-key='questions'>
                                    @foreach ($exam->questions as $singleQuestions)
                                        <span class="label label-info label-many">{{ $singleQuestions->question }}</span>
                                    @endforeach
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('exam_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.exams.restore', $exam->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('exam_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.exams.perma_del', $exam->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('exam_view')
                                    <a href="{{ route('admin.exams.show',[$exam->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('exam_edit')
                                    <a href="{{ route('admin.exams.edit',[$exam->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('exam_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.exams.destroy', $exam->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.courses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


