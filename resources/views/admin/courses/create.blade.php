@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.courses.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.courses.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            @if (Auth::user()->isAdmin())
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('teachers', trans('quickadmin.courses.fields.teachers').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-teachers">
                        {{ trans('quickadmin.qa_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-teachers">
                        {{ trans('quickadmin.qa_deselect_all') }}
                    </button>
                    {!! Form::select('teachers[]', $teachers, old('teachers'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-teachers' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('teachers'))
                        <p class="help-block">
                            {{ $errors->first('teachers') }}
                        </p>
                    @endif
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_name', trans('quickadmin.courses.fields.course-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('course_name', old('course_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_name'))
                        <p class="help-block">
                            {{ $errors->first('course_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_code', trans('quickadmin.courses.fields.course-code').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('course_code', old('course_code'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_code'))
                        <p class="help-block">
                            {{ $errors->first('course_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department', trans('quickadmin.courses.fields.department').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('department', old('department'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department'))
                        <p class="help-block">
                            {{ $errors->first('department') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.courses.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script>
        $("#selectbtn-teachers").click(function(){
            $("#selectall-teachers > option").prop("selected","selected");
            $("#selectall-teachers").trigger("change");
        });
        $("#deselectbtn-teachers").click(function(){
            $("#selectall-teachers > option").prop("selected","");
            $("#selectall-teachers").trigger("change");
        });
    </script>
@stop
