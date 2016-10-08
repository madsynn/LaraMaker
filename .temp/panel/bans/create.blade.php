@extends('layouts.main')

@section('title')
    {{lang('Create a ban')}}
@stop

@section('content')
    <h3 align="center"><i class="fa fa-ban"></i> {{lang('Create a ban')}}</h3>
    {!!Form::open(['url' => 'admin/ban/create'])!!}
    <center>
        <strong>{{lang("Type")}}</strong>
        <br/>
        <select id="type" name="type">
            <option value="ip">IP</option>
            @if(App\Models\User::count()>1)
                <option value="user">{{lang('User')}}</option>
            @endif
        </select>
    </center>
    <div id="ip_block">
        <strong>IP:</strong>
        <input type="text" class="form-control" name="ip"/>
    </div>
    <div id="user_block" style="display:none">
        <strong>{{lang('User')}}</strong>
        <select name="user" class="form-control">
            <option value="">{{lang('Select user')}}</option>
            @foreach(App\Models\User::where('id','<>',\Auth::user()->id)->get() as $user)
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select>
    </div>
    <label>
        <input type="checkbox" name="is_forever" id="forever"/> {{lang('Forever')}}
    </label>
    <br/>
    <div id="from_to">
        <strong>{{lang('From')}}</strong>
        <input type="text" class="form-control" name="from"/>
        <strong>{{lang('To')}}</strong>
        <input type="text" class="form-control" name="to"/>
    </div>
    <br/>
    <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i> {{lang('Ban')}}</button>
    {!!Form::close()!!}
@stop

@section('js')
    <script>
        $("#type").change(function () {
            var val = $(this).val();
            if (val == "ip") {
                $("#user_block").hide();
                $("#ip_block").show();
            } else {
                $("#ip_block").hide();
                $("#user_block").show();
            }
        });
        $("#forever").click(function(){
            if($(this).is(':checked')){
                $("#from_to").hide();
            }else{
                $("#from_to").show();
            }
        });
    </script>
@stop