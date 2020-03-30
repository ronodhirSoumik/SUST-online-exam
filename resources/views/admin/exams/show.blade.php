@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.exam.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.exam.fields.course')</th>
                            <td field-key='course'>{{ $exam->course->course_code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.lesson')</th>
                            <td field-key='lesson'>{{ $exam->lesson->title ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.title')</th>
                            <td field-key='title'>{{ $exam->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.start-time')</th>
                            <td field-key='start_time'>{{ $exam->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.duration')</th>
                            <td field-key='duration'>{{ $exam->duration }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.description')</th>
                            <td field-key='description'>{{ $exam->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam.fields.questions')</th>
                            <td field-key='questions'>
                                @foreach ($exam->questions as $singleQuestions)
                                    <span class="label label-info label-many">{{ $singleQuestions->question }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.exams.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
