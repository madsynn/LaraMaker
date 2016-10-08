@extends('layouts.main')

@section('title')
    {{lang('Comments')}} - {{lang('Edit')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/comment/'.$comment->id,'method' => 'PUT']) !!}
            <strong>{{lang('Comment')}}</strong>
            <textarea name="comment" class="form-control" cols="30" rows="10">{{$comment->comment}}</textarea>
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop