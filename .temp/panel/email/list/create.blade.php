@extends('layouts.main')

@section('title')
    {{lang('New E-mail List')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center"><i class="fa fa-envelope-o"></i> {{lang('New Email List')}}</h3>
            {!!Form::open(['url' => 'admin/campaign/list'])!!}
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" value="{{\Request::old('name')}}"/>
            <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-mail-forward"></i> {{lang('Continue with adding e-mails')}}</button>
            {!!Form::close()!!}
        </div>
    </div>
@stop

