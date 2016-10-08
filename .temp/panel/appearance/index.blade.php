@extends('layouts.main')

@section('title')
    {{lang('Appearance')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h3><i class="fa fa-pencil"></i> {{lang('Appearance')}}</h3>
            {!!Form::open(['url' => 'admin/appearance'])!!}
            <strong>{{lang('Theme')}}</strong>
            <select name="theme" class="form-control">
                <option value="" {{option('panel_theme') == "default" ? "selected":""}}>{{lang('Default')}}</option>
                <option value="blue" {{option('panel_theme') == "blue" ? "selected":""}}>{{lang('Blue')}}</option>
                <option value="black"{{option('panel_theme') == "black" ? "selected":""}}>{{lang('Black')}}</option>
                <option value="cafe" {{option('panel_theme') == "cafe" ? "selected":""}}>{{lang('Cafe')}}</option>
                <option value="green" {{option('panel_theme') == "green" ? "selected":""}}>{{lang('Green')}}</option>
                <option value="purple" {{option('panel_theme') == "purple" ? "selected":""}}>{{lang('Purple')}}</option>
                <option value="red" {{option('panel_theme') == "red" ? "selected":""}}>{{lang('Red')}}</option>
                <option value="white" {{option('panel_theme') == "white" ? "selected":""}}>{{lang('White')}}</option>
                <option value="yellow" {{option('panel_theme') == "yellow" ? "selected":""}}>{{lang('Yellow')}}</option>
            </select>
            <br/>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{lang('Update')}}</button>
            {!!Form::close()!!}
        </div>
    </div>
@stop