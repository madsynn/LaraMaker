@extends('layouts.main')

@section('title')
    Google Analytics
@stop

@section('content')
    <h3><i class="fa fa-eye"></i> Google Analytics</h3>
    {!!Form::open(['url' => 'admin/analytics'])!!}
    <strong>{{lang('Tracking Code')}}</strong>
    <textarea name="code" rows="10" class="form-control">{{option('google_analytics_code')}}</textarea>
    <br/>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
    {!!Form::close()!!}
@stop