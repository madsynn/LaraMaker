@extends('layouts.main')

@section('title')
    {{lang('Add New')}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {!! Form::open(['url' => 'admin/group']) !!}
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" value="{{\Request::old('name')}}"/>
            <strong>{{lang('Permissions')}}</strong>
            <select name="permissions[]" multiple id="perms">
                @foreach(\Config::get('permissions') as $key => $permission)
                    <option value="{{$key}}">{{$permission}}</option>
                @endforeach
            </select>

            <label>
                <input type="checkbox" name="is_default"/>
                {{lang('Is default')}}
            </label>
            <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{lang('Create')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/jquery.multi-select.js')}}"></script>
    <script>
        $('#perms').multiSelect();
    </script>
@stop