@extends('layouts.main')

@section('title')
    {{$values?lang('Edit'):lang('New Category')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => $form_url, 'method' => $method]) !!}
            <strong>{{lang('Name')}}</strong>
            <input type="text" name="name" class="form-control" value="{{$values?$category->name:""}}"/>
            <strong>{{lang('Description')}}</strong>
            <textarea name="description" class="form-control" rows="4">{{$values?$category->description:""}}</textarea>
            <br/>
            <input type="submit" class="btn btn-primary" value="{{$values?"Update":"Create"}}"/>
            {!! Form::close() !!}
        </div>
    </div>
@stop