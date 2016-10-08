@extends('layouts.main')

@section('title')
    {{lang('Edit Menu')}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('panel/assets/js/switchery/switchery.css')}}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/menu/'.$menu->id, 'method' => 'PUT']) !!}
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" placeholder="Menu Name" value="{{$menu->name}}"
                   id="new_menu_name"/>
            <br/>
            <label>
                <input type="checkbox" name="is_primary"
                       class="js-switch" {{$menu->is_primary?"checked":""}}/> {{lang('Primary')}}
            </label>
            <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{lang('Save')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/switchery/switchery.js')}}"></script>
    <script>
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem);
    </script>
@stop