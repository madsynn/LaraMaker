@extends('layouts.main')

@section('title')
    {{$user->username}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('panel/assets/js/switchery/switchery.css')}}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            {!! Form::open(['url' => 'admin/user/'.$user->id, 'method' => 'put', 'files' => true]) !!}
            <strong>{{lang('Username')}}</strong>
            <input class="form-control" type="text" name="username" value="{{$user->username}}"/>
            <strong>{{lang('Group')}}</strong>
            <select class="form-control" name="group">
                @foreach(\App\Models\Group::get() as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            <br/>
            <strong>{{lang('Administrator')}}</strong><br/>
            <input type="checkbox" name="administrator" {{$user->role==3?"checked":""}} class="js-switch"/><br>
            <strong>{{lang('Avatar')}}</strong><br/>
            <input type="file" style="display: none;" name="avatar" id="avatar" onchange="loadFile(event)"/>
            <img src="{{$user->avatar?asset('media/profile/'.$user->id.'/'.$user->avatar):asset('media/profile/profile.png')}}"
                 onclick="$('#avatar').click()"
                 class="img-rounded" height="100" width="100" id="preview" style="border:1px solid #000;"/>
            <br/>
            <button type="submit" class="btn btn-success" style="margin-top:20px;"><i
                        class="fa fa-save"></i> {{lang('Update')}}</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('panel/assets/js/switchery/switchery.js')}}"></script>
     <script>
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem);
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@stop