@extends('layouts.main')

@section('title')
    {{$group->name}}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {!! Form::open(['url' => 'admin/group/'.$group->id,'method' => 'PUT']) !!}
            <strong>{{lang('Name')}}</strong>
            <input class="form-control" type="text" name="name" value="{{$group->name}}"/>
            <strong>{{lang('Permissions')}}</strong>
            <select name="permissions[]" multiple id="perms">
                @foreach(\Config::get('permissions') as $key => $permission)
                    <option value="{{$key}}" {{in_array($key, $perms)?"selected":""}}>{{$permission}}</option>
                @endforeach
            </select>
            <label>
                <input type="checkbox" name="is_default" {{$group->is_default?"checked":""}}/>
                {{lang('Is default')}}
            </label>
            <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{lang('Save')}}</button>
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