@extends('layouts.main')

@section('title')
    {{lang('Upload')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/theme/install', 'files' => true]) !!}
            <strong>{{lang('Plugin')}} [{{lang('Only ZIP files are allowed')}}]</strong>
            <input type="file" name="theme"/><br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{lang('Upload')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop