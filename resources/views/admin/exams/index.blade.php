@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.exam.title')</h3>
    @can('exam_create')
    <p>
        <a href="{{ route('admin.exams.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('exam_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.exams.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.exams.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($exams) > 0 ? 'datatable' : '' }} @can('exam_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('exam_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('exam_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('exam_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.exams.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection